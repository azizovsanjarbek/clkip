<!doctype html>
<html lang="ru">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> <?php echo "Отчет об остатках склада"?> </title>
  <link rel="shortcut icon" type="image/png" href="src/assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="src/assets/css/styles.min.css" />
</head>

<body>

  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <h3 class="text-nowrap logo-img"><?php echo "ЦЛ КИП" ?></h3>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Отчеты</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./index.html" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Склады</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="#" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Проекты</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="#" aria-expanded="false">
                <span>
                  <i class="ti ti-cards"></i>
                </span>
                <span class="hide-menu">Карты</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="#" aria-expanded="false">
                <span>
                  <i class="ti ti-alert-circle"></i>
                </span>
                <span class="hide-menu">Внимание</span>
              </a>
            </li>
          </ul>
          <div class="unlimited-access hide-menu bg-light-primary position-relative mb-7 mt-5 rounded">
            <div class="d-flex">
              <div class="unlimited-access-img">
                <img src="src/assets/images/logos/logo.png" alt="" class="img-fluid">
              </div>
            </div>
          </div>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                <i class="ti ti-bell-ringing"></i>
                <div class="notification bg-primary rounded-circle"></div>
              </a>
            </li>
          </ul>
           <div class="navbar-collapse justify-content-center px-0" id="navbarNav">
            <h1>Отчет по движению и остаткам на складах ЦЛ КИП</h1>
          </div>
        </nav>
      </header>
      <!--  Header End -->
      <div class="container-fluid">
        <!--  Row 1 -->
        <?php 
  include 'pass.php';
  $conn = new mysqli("localhost","root","",$database);
  // Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}           
  ?>
        <div class="row">
          <!--  coloum 1 -->
          <div class="col-lg-4">
            <div class="row">
              <div class="col-lg-12">
                <!-- Yearly Breakup -->
                <div class="card overflow-hidden">
                  <div class="card-body p-4">
                    <h5 class="card-title mb-9 fw-semibold">Общий остаток </h5>
                    <div class="row align-items-center">
                      <div class="col-8">
                      <?php 
                        $allsum= "SELECT summa FROM main_table";
                        $allsumresult = $conn->query($allsum);
                        $allsumvalue = 0;
                        if ($allsumresult->num_rows > 0) {
                          // output data of each row
                          while($allsumrow = $allsumresult->fetch_assoc()) {
                          $allsumvalue=$allsumvalue+$allsumrow["summa"];
                          }
                        } else {
                          echo "0 results";
                        }
                        ?>
                        <h4 class="fw-semibold mb-3"><?php echo $allsumvalue ?></h4>
                        <div class="d-flex align-items-center mb-3">
                          <span
                            class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                            <i class="ti ti-arrow-up-left text-success"></i>
                          </span>
                          <p class="text-dark me-1 fs-3 mb-0">+9%</p>
                          <p class="fs-3 mb-0">прошлый год</p>
                        </div>
                        <div class="d-flex align-items-center">
                          <div class="me-4">
                            <span class="round-8 bg-primary rounded-circle me-2 d-inline-block"></span>
                            <span class="fs-2">2023</span>
                          </div>
                          <div>
                            <span class="round-8 bg-light-primary rounded-circle me-2 d-inline-block"></span>
                            <span class="fs-2">2023</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="d-flex justify-content-center">
                          <div id="breakup"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>           
            </div>
          </div>
          <!--  end coloum 1 -->
          <!--  coloum 2 -->
          <div class="col-lg-4">
            <div class="row">
              <div class="col-lg-12">
                <!-- Yearly Breakup -->
                <div class="card overflow-hidden">
                  <div class="card-body p-4">
                    <h5 class="card-title mb-9 fw-semibold">Остаток на складе 3308</h5>
                    <div class="row align-items-center">
                      <div class="col-8">  
                      <?php 
                        $allsum3308= "SELECT summa FROM main_table WHERE sklad='3308'";
                        $allsumresult3308 = $conn->query($allsum3308);
                        $allsumvalue3308 = 0;
                        if ($allsumresult3308->num_rows > 0) {
                          // output data of each row
                          while($allsumrow3308 = $allsumresult3308->fetch_assoc()) {
                          $allsumvalue3308=$allsumvalue3308+$allsumrow3308["summa"];
                          }
                        } 
                        ?>                     
                        <h4 class="fw-semibold mb-3"><?php echo $allsumvalue3308 ?></h4>
                        <div class="d-flex align-items-center mb-3">
                          <span
                            class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                            <i class="ti ti-arrow-up-left text-success"></i>
                          </span>
                          <p class="text-dark me-1 fs-3 mb-0">+9%</p>
                          <p class="fs-3 mb-0">прошлый год</p>
                        </div>
                        <div class="d-flex align-items-center">
                          <div class="me-4">
                            <span class="round-8 bg-primary rounded-circle me-2 d-inline-block"></span>
                            <span class="fs-2">2023</span>
                          </div>
                          <div>
                            <span class="round-8 bg-light-primary rounded-circle me-2 d-inline-block"></span>
                            <span class="fs-2">2023</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="d-flex justify-content-center">
                          <div id="breakup"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>           
            </div>
          </div>
          <!--  end coloum 2 -->
          <!--  coloum 3 -->
          <div class="col-lg-4">
                      <div class="row">
                        <div class="col-lg-12">
                          <!-- Yearly Breakup -->
                          <div class="card overflow-hidden">
                            <div class="card-body p-4">
                              <h5 class="card-title mb-9 fw-semibold">Остаток на складе 3318</h5>
                              <div class="row align-items-center">
                                <div class="col-8">
                                <?php 
                        $allsum3318= "SELECT summa FROM main_table WHERE sklad='3318'";
                        $allsumresult3318 = $conn->query($allsum3318);
                        $allsumvalue3318 = 0;
                        if ($allsumresult3318->num_rows > 0) {
                          // output data of each row
                          while($allsumrow3318 = $allsumresult3318->fetch_assoc()) {
                          $allsumvalue3318=$allsumvalue3318+$allsumrow3318["summa"];
                          }
                        } 
                        ?> 
                                  <h4 class="fw-semibold mb-3"><?php echo $allsumvalue3318 ?></h4>
                                  <div class="d-flex align-items-center mb-3">
                                    <span
                                      class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                                      <i class="ti ti-arrow-up-left text-success"></i>
                                    </span>
                                    <p class="text-dark me-1 fs-3 mb-0">+9%</p>
                                    <p class="fs-3 mb-0">прошлый год</p>
                                  </div>
                                  <div class="d-flex align-items-center">
                                    <div class="me-4">
                                      <span class="round-8 bg-primary rounded-circle me-2 d-inline-block"></span>
                                      <span class="fs-2">2023</span>
                                    </div>
                                    <div>
                                      <span class="round-8 bg-light-primary rounded-circle me-2 d-inline-block"></span>
                                      <span class="fs-2">2023</span>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-4">
                                  <div class="d-flex justify-content-center">
                                    <div id="breakup"></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>           
                      </div>
          </div>
          <!--  end coloum 3 -->
        </div>
        <div class="row">
          <div class="col-lg-8 d-flex align-items-strech">
            <div class="card w-100">
              <div class="card-body">
                <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                  <div class="mb-3 mb-sm-0">
                    <h5 class="card-title fw-semibold">Ежедневный отчет прихода и расхода</h5>
                  </div>
                  <div>
                    <select class="form-select">
                      <option value="1">Март 2023</option>
                      <option value="2">Апрель 2023</option>
                      <option value="3">Май 2023</option>
                      <option value="4">Июнь 2023</option>
                    </select>
                  </div>
                </div>
                <div id="chart"></div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="row">
              <div class="col-lg-12">
                <!-- Yearly Breakup -->
                <div class="card overflow-hidden">
                  <div class="card-body p-4">
                    <h5 class="card-title mb-9 fw-semibold">Остаток в работе</h5>
                    <div class="row align-items-center">
                      <div class="col-8">
                        <h4 class="fw-semibold mb-3">$36,358</h4>
                        <div class="d-flex align-items-center mb-3">
                          <span
                            class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                            <i class="ti ti-arrow-up-left text-success"></i>
                          </span>
                          <p class="text-dark me-1 fs-3 mb-0">+9%</p>
                          <p class="fs-3 mb-0">прошлый год</p>
                        </div>
                        <div class="d-flex align-items-center">
                          <div class="me-4">
                            <span class="round-8 bg-primary rounded-circle me-2 d-inline-block"></span>
                            <span class="fs-2">2023</span>
                          </div>
                          <div>
                            <span class="round-8 bg-light-primary rounded-circle me-2 d-inline-block"></span>
                            <span class="fs-2">2023</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="d-flex justify-content-center">
                          <div id="breakup"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <!-- Monthly Earnings -->
                <div class="card">
                  <div class="card-body">
                    <div class="row alig n-items-start">
                      <div class="col-8">
                        <h5 class="card-title mb-9 fw-semibold">Ежемесяцный приход</h5>
                        <h4 class="fw-semibold mb-3">$6,820</h4>
                        <div class="d-flex align-items-center pb-1">
                          <span
                            class="me-2 rounded-circle bg-light-danger round-20 d-flex align-items-center justify-content-center">
                            <i class="ti ti-arrow-down-right text-danger"></i>
                          </span>
                          <p class="text-dark me-1 fs-3 mb-0">+9%</p>
                          <p class="fs-3 mb-0">прошлый месяц</p>
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="d-flex justify-content-end">
                          <div
                            class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                            <i class="ti ti-currency-dollar fs-6"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div id="earning"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Расход  на <?php echo date("d/m/y")?></h5>
                <div class="table-responsive">
                  <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Номер</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Наименование</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Количество</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Ед.изм.</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Цена</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Сумма</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Склад</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Дата прихода</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                     
                      <!-- ######################################## -->
                      
                     <?php 
                     $sql = "SELECT * FROM main_table";
                     if($result = $conn->query($sql)){
    $rowsCount = $result->num_rows; // количество полученных строк

    foreach($result as $row){
        echo "<tr>";
        echo "<td class=\"border-bottom-0\"><h6 class=\"fw-semibold mb-0\">". $row["nomer"] ."</h6></td>";
        echo "<td class=\"border-bottom-0\" >";
        echo "<h6 class=\"fw-semibold mb-1\"> ".$row["name"]."</h6>";
        echo "<span class=\"fw-normal\">".$row["kod_material"]."</span>";                         
        echo "</td>";
        echo "<td class=\"border-bottom-0\"><p class=\"mb-0 fw-normal\">". $row["kolichestvo"]."</p></td>";
        if($row["ed.izm"]=="ШТ"){
          $mesuare_mark="bg-primary";
        }
        elseif($row["ed.izm"]=="ЛИТР"){
          $mesuare_mark="bg-secondary";
        }
        elseif($row["ed.izm"]=="КГ"){
          $mesuare_mark="bg-success";
        }
        else{
          $mesuare_mark="bg-danger";
        }
        echo "<td class=\"border-bottom-0\"><div class=\"d-flex align-items-center gap-2\"><span class=\"badge ".$mesuare_mark." rounded-3 fw-semibold\">".$row["ed.izm"]."</span></div></td>";
        echo "<td class=\"border-bottom-0\"><h6 class=\"fw-semibold mb-0 fs-4\">".$row["cena"]."</h6></td>";
        echo "<td class=\"border-bottom-0\"><h6 class=\"fw-semibold mb-0 fs-4\">".$row["summa"]."</h6></td>";
        echo "<td class=\"border-bottom-0\"><h6 class=\"fw-semibold mb-0 fs-4\">".$row["sklad"]."</h6></td>";
        echo "<td class=\"border-bottom-0\"><h6 class=\"fw-semibold mb-0 fs-4\">".$row["data_prohoda"]."</h6></td>";
        echo "</tr>";
    } 
    $result->free();
} else{
    echo "Ошибка: " . $conn->error;
}?>
<!-- ######################################## -->
                      
                      
                                
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Приход  на <?php echo date("d/m/y")?></h5>
                <div class="table-responsive">
                  <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Номер</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Наименование</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Количество</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Ед.изм.</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Цена</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Сумма</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Склад</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <!-- ######################################## -->
                      
                     <?php 
                     $prixodsql = "SELECT * FROM main_table";
                     if($prixodresult = $conn->query($prixodsql)){
    $prixodrowsCount = $prixodresult->num_rows; // количество полученных строк

    foreach($prixodresult as $prixodrow){
        echo "<tr>";
        echo "<td class=\"border-bottom-0\"><h6 class=\"fw-semibold mb-0\">". $prixodrow["nomer"] ."</h6></td>";
        echo "<td class=\"border-bottom-0\" >";
        echo "<h6 class=\"fw-semibold mb-1\"> ".$prixodrow["name"]."</h6>";
        echo "<span class=\"fw-normal\">".$prixodrow["kod_material"]."</span>";                         
        echo "</td>";
        echo "<td class=\"border-bottom-0\"><p class=\"mb-0 fw-normal\">". $prixodrow["kolichestvo"]."</p></td>";
        if($prixodrow["ed.izm"]=="ШТ"){
          $mesuare_mark="bg-primary";
        }
        elseif($prixodrow["ed.izm"]=="ЛИТР"){
          $mesuare_mark="bg-secondary";
        }
        elseif($prixodrow["ed.izm"]=="КГ"){
          $mesuare_mark="bg-success";
        }
        else{
          $mesuare_mark="bg-danger";
        }
        echo "<td class=\"border-bottom-0\"><div class=\"d-flex align-items-center gap-2\"><span class=\"badge ".$mesuare_mark." rounded-3 fw-semibold\">".$prixodrow["ed.izm"]."</span></div></td>";
        echo "<td class=\"border-bottom-0\"><h6 class=\"fw-semibold mb-0 fs-4\">".$prixodrow["cena"]."</h6></td>";
        echo "<td class=\"border-bottom-0\"><h6 class=\"fw-semibold mb-0 fs-4\">".$prixodrow["summa"]."</h6></td>";
        echo "<td class=\"border-bottom-0\"><h6 class=\"fw-semibold mb-0 fs-4\">".$prixodrow["sklad"]."</h6></td>";
        echo "</tr>";
    } 
    $prixodresult->free();
} else{
    echo "Ошибка: " . $conn->error;
}?>
                      <tr>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">1417169</h6></td>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1">СВЕТИЛЬНИК УКАЗАТЕЛЯ "ВЫХОД"</h6>
                            <span class="fw-normal">11734-18</span>                          
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">6</p>
                        </td>
                        <td class="border-bottom-0">
                          <div class="d-flex align-items-center gap-2">
                            <span class="badge bg-primary rounded-3 fw-semibold">ШТ</span>
                          </div>
                        </td>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0 fs-4">81495,65</h6>
                        </td>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0 fs-4">488973,9</h6>
                        </td>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0 fs-4">3318</h6>
                        </td>
                      </tr> 
                      <tr>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">1171151</h6></td>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1">МАСЛО FAMILY SYNCON R&O 46</h6>
                            <span class="fw-normal">449391-18</span>                          
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">48</p>
                        </td>
                        <td class="border-bottom-0">
                          <div class="d-flex align-items-center gap-2">
                            <span class="badge bg-secondary rounded-3 fw-semibold">ЛИТР</span>
                          </div>
                        </td>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0 fs-4">13515,24</h6>
                        </td>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0 fs-4">648731,52</h6>
                        </td>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0 fs-4">3308</h6>
                        </td>
                      </tr> 
                      <tr>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">0514144</h6></td>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1">ПРОВОЛОКА СТАЛЬНАЯ СВАРОЧ ОМЕДНЕННАЯ</h6>
                            <span class="fw-normal">435807-18</span>                          
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">97</p>
                        </td>
                        <td class="border-bottom-0">
                          <div class="d-flex align-items-center gap-2">
                            <span class="badge bg-danger rounded-3 fw-semibold">КГ</span>
                          </div>
                        </td>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0 fs-4">17380</h6>
                        </td>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0 fs-4">1685860</h6>
                        </td>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0 fs-4">3308</h6>
                        </td>
                      </tr>      
                      <tr>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">4828135</h6></td>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1">КАБЕЛЬНЫЕ НАКОНЕЧНИКИ</h6>
                            <span class="fw-normal">299716-18</span>                          
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">1325</p>
                        </td>
                        <td class="border-bottom-0">
                          <div class="d-flex align-items-center gap-2">
                            <span class="badge bg-success rounded-3 fw-semibold">КОМПЛЕКТ</span>
                          </div>
                        </td>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0 fs-4">0,1</h6>
                        </td>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0 fs-4">13,25 </h6>
                        </td>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0 fs-4">3318</h6>
                        </td>
                      </tr>                       
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--
        <div class="row">
          <div class="col-sm-6 col-xl-3">
            <div class="card overflow-hidden rounded-2">
              <div class="position-relative">
                <a href="javascript:void(0)"><img src="src/assets/images/products/s4.jpg" class="card-img-top rounded-0" alt="..."></a>
                <a href="javascript:void(0)" class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i class="ti ti-basket fs-4"></i></a>                      </div>
              <div class="card-body pt-3 p-4">
                <h6 class="fw-semibold fs-4">Boat Headphone</h6>
                <div class="d-flex align-items-center justify-content-between">
                  <h6 class="fw-semibold fs-4 mb-0">$50 <span class="ms-2 fw-normal text-muted fs-3"><del>$65</del></span></h6>
                  <ul class="list-unstyled d-flex align-items-center mb-0">
                    <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                    <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                    <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                    <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                    <li><a class="" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-xl-3">
            <div class="card overflow-hidden rounded-2">
              <div class="position-relative">
                <a href="javascript:void(0)"><img src="src/assets/images/products/s5.jpg" class="card-img-top rounded-0" alt="..."></a>
                <a href="javascript:void(0)" class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i class="ti ti-basket fs-4"></i></a>                      </div>
              <div class="card-body pt-3 p-4">
                <h6 class="fw-semibold fs-4">MacBook Air Pro</h6>
                <div class="d-flex align-items-center justify-content-between">
                  <h6 class="fw-semibold fs-4 mb-0">$650 <span class="ms-2 fw-normal text-muted fs-3"><del>$900</del></span></h6>
                  <ul class="list-unstyled d-flex align-items-center mb-0">
                    <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                    <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                    <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                    <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                    <li><a class="" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-xl-3">
            <div class="card overflow-hidden rounded-2">
              <div class="position-relative">
                <a href="javascript:void(0)"><img src="src/assets/images/products/s7.jpg" class="card-img-top rounded-0" alt="..."></a>
                <a href="javascript:void(0)" class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i class="ti ti-basket fs-4"></i></a>                      </div>
              <div class="card-body pt-3 p-4">
                <h6 class="fw-semibold fs-4">Red Valvet Dress</h6>
                <div class="d-flex align-items-center justify-content-between">
                  <h6 class="fw-semibold fs-4 mb-0">$150 <span class="ms-2 fw-normal text-muted fs-3"><del>$200</del></span></h6>
                  <ul class="list-unstyled d-flex align-items-center mb-0">
                    <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                    <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                    <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                    <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                    <li><a class="" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-xl-3">
            <div class="card overflow-hidden rounded-2">
              <div class="position-relative">
                <a href="javascript:void(0)"><img src="src/assets/images/products/s11.jpg" class="card-img-top rounded-0" alt="..."></a>
                <a href="javascript:void(0)" class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i class="ti ti-basket fs-4"></i></a>                      </div>
              <div class="card-body pt-3 p-4">
                <h6 class="fw-semibold fs-4">Cute Soft Teddybear</h6>
                <div class="d-flex align-items-center justify-content-between">
                  <h6 class="fw-semibold fs-4 mb-0">$285 <span class="ms-2 fw-normal text-muted fs-3"><del>$345</del></span></h6>
                  <ul class="list-unstyled d-flex align-items-center mb-0">
                    <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                    <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                    <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                    <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                    <li><a class="" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>-->
        <div class="py-6 px-6 text-center">
          <p class="mb-0 fs-4">Разработал <span class="pe-1 text-primary text-decoration-underline">Азизов Санжарбек</span>. 2023г.</p>
        </div>
      </div>
    </div>
  </div>
  <script src="src/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="src/assets/js/sidebarmenu.js"></script>
  <script src="src/assets/js/app.min.js"></script>
  <script src="src/assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="src/assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="src/assets/js/dashboard.js"></script>
</body>
<?php $conn->close();?>
</html>