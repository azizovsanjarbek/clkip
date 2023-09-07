<!doctype html>
<html lang="ru">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> <?php echo "Отчет об остатках склада"?> </title>
  <link rel="shortcut icon" type="image/png" href="src/assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="src/assets/css/styles.min.css" />
</head>
<?php include_once 'func_library.php'; ?>
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
  include_once 'pass.php';
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
                        <h4 class="fw-semibold mb-3" id="min">
                        <script>
                        var num = <?php echo $allsumvalue ?>;
                        var result = num.toLocaleString();
                        document.getElementById("min").innerHTML=result 
                        </script>
                        </h4>
                        <div class="d-flex align-items-center mb-3">
                          <span
                            class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                            <i class="ti ti-arrow-up-left text-success"></i>
                          </span>
                          <p class="text-dark me-1 fs-3 mb-0">+9%</p>
                          <p class="fs-3 mb-0">прошлый месяц</p>
                        </div>
                        <div class="d-flex align-items-center">
                          <div class="me-4">
                            <span class="round-8 bg-success rounded-circle me-2 d-inline-block"></span>
                            <span class="fs-2">3308</span>
                          </div>
                          <div>
                            <span class="round-8 bg-primary rounded-circle me-2 d-inline-block"></span>
                            <span class="fs-2">3318</span>
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
                    <h5 class="card-title mb-9 fw-semibold">Общий расход</h5>
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
                        <h4 class="fw-semibold mb-3" id="minTwo">
                        <script>
                        var numTwo = <?php echo $allsumvalue3308 ?>;
                        var resultTwo = numTwo.toLocaleString();
                        document.getElementById("minTwo").innerHTML=resultTwo 
                        </script>
                        </h4>                 
                        
                        <div class="d-flex align-items-center mb-3">
                          <span
                            class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                            <i class="ti ti-arrow-up-left text-success"></i>
                          </span>
                          <p class="text-dark me-1 fs-3 mb-0">+9%</p>
                          <p class="fs-3 mb-0">прошлый месяц</p>
                        </div>
                        <div class="d-flex align-items-center">
                          <div class="me-4">
                            <span class="round-8 bg-success rounded-circle me-2 d-inline-block"></span>
                            <span class="fs-2">3308</span>
                          </div>
                          <div>
                            <span class="round-8 bg-primary rounded-circle me-2 d-inline-block"></span>
                            <span class="fs-2">3318</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="d-flex justify-content-center">
                          <div id="breakupTwo"></div>
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
                              <h5 class="card-title mb-9 fw-semibold">Общий приход</h5>
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
                        <h4 class="fw-semibold mb-3" id="minThree">
                        <script>
                        var numThree = <?php echo $allsumvalue3318 ?>;
                        var resultThree = numThree.toLocaleString();
                        document.getElementById("minThree").innerHTML=resultThree
                        </script>
                        </h4>    
                        <div class="d-flex align-items-center mb-3">
                                    <span
                                      class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                                      <i class="ti ti-arrow-up-left text-success"></i>
                                    </span>
                                    <p class="text-dark me-1 fs-3 mb-0">+9%</p>
                                    <p class="fs-3 mb-0">прошлый месяц</p>
                                  </div>
                                  <div class="d-flex align-items-center">
                                    <div class="me-4">
                                      <span class="round-8 bg-success rounded-circle me-2 d-inline-block"></span>
                                      <span class="fs-2">3308</span>
                                    </div>
                                    <div>
                                      <span class="round-8 bg-primary rounded-circle me-2 d-inline-block"></span>
                                      <span class="fs-2">3318</span>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-4">
                                  <div class="d-flex justify-content-center">                                    
                                    <div id="breakupThree"></div>
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
          <div class="col-lg-12 d-flex align-items-strech">
            <div class="card w-100">
              <div class="card-body">
                <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                  <div class="mb-3 mb-sm-0">
                    <h5 class="card-title fw-semibold">Ежедневный отчет о расходе в течение месяца</h5>
                  </div>
                  <div>
                    <select class="form-select">
                      <option value="1"><?php month(date('n'))?> 2023</option>
                      <option value="2"><?php month(date('n')-1)?> 2023 </option>
                      <option value="3"><?php month(date('n')-2)?> 2023 </option>
                      <option value="4"><?php month(date('n')-3)?> 2023 </option>
                    </select>
                  </div>
                </div>
                <div id="chart"></div>
              </div>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="row">
              <div class="col-lg-4">
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
                          <p class="fs-3 mb-0">прошлый месяц</p>
                        </div>
                        <div class="d-flex align-items-center">
                          <div class="me-4">
                            <span class="round-8 bg-primary rounded-circle me-2 d-inline-block"></span>
                            <span class="fs-2"><? month(date("n")) ?></span>
                          </div>
                          <div>
                            <span class="round-8 bg-success rounded-circle me-2 d-inline-block"></span>
                            <span class="fs-2"><? month(date("n")-1) ?></span>
                          </div>
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="d-flex justify-content-center">
                          <div id="breakupFour"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-8">
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
                  <!-- Тут график из файл dashboard.js-->
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
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Дата расхода</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                     
                      <!-- ######################################## -->
                      
                     <?php 
                     $sql = "SELECT * FROM rashod WHERE upload_date>='2023-08-24'";
                     if($result = $conn->query($sql)){
    $rowsCount = $result->num_rows; // количество полученных строк
    foreach($result as $row){
        echo "<tr>";
        echo "<td class=\"border-bottom-0\"><h6 class=\"fw-semibold mb-0\">". $row["nomer"] ."</h6></td>";
        echo "<td class=\"border-bottom-0\" >";
        echo "<h6 class=\"fw-semibold mb-1\"style=\"white-space:normal !important\"> ".$row["name"]."</h6>";
        echo "<span class=\"fw-normal\">".$row["kod_material"]."</span>";                         
        echo "</td>";
        echo "<td class=\"border-bottom-0\"><p class=\"mb-0 fw-normal\">". $row["kolichestvo"]."</p></td>";
        if($row["ed_izm"]=="ШТ"){
          $mesuare_mark="bg-primary";
        }
        elseif($row["ed_izm"]=="ЛИТР"){
          $mesuare_mark="bg-secondary";
        }
        elseif($row["ed_izm"]=="КГ"){
          $mesuare_mark="bg-success";
        }
        else{
          $mesuare_mark="bg-danger";
        }
        echo "<td class=\"border-bottom-0\"><div class=\"d-flex align-items-center gap-2\"><span class=\"badge ".$mesuare_mark." rounded-3 fw-semibold\">".$row["ed_izm"]."</span></div></td>";
        echo "<td class=\"border-bottom-0\"><h6 class=\"fw-semibold mb-0 fs-4\">".$row["cena"]."</h6></td>";
        echo "<td class=\"border-bottom-0\"><h6 class=\"fw-semibold mb-0 fs-4\">".$row["summa"]."</h6></td>";
        echo "<td class=\"border-bottom-0\"><h6 class=\"fw-semibold mb-0 fs-4\">".$row["sklad"]."</h6></td>";
        echo "<td class=\"border-bottom-0\"><h6 class=\"fw-semibold mb-0 fs-4\">".$row["data_prihoda"]."</h6></td>";
        echo "<td class=\"border-bottom-0\"><h6 class=\"fw-semibold mb-0 fs-4\">".$row["upload_date"]."</h6></td>";
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
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Дата прихода</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <!-- ######################################## -->                      
                     <?php 
                     $prixodsql = "SELECT * FROM main_table  WHERE data_prohoda>='2023-08-24' ORDER BY data_prohoda ASC";
                     if($prixodresult = $conn->query($prixodsql)){
    $prixodrowsCount = $prixodresult->num_rows; // количество полученных строк

    foreach($prixodresult as $prixodrow){
        echo "<tr>";
        echo "<td class=\"border-bottom-0\"><h6 class=\"fw-semibold mb-0\">". $prixodrow["nomer"] ."</h6></td>";
        echo "<td class=\"border-bottom-0\" >";
        echo "<h6 class=\"fw-semibold mb-1\" style=\"white-space:normal !important\"> ".$prixodrow["name"]."</h6>";
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
        echo "<td class=\"border-bottom-0\"><h6 class=\"fw-semibold mb-0 fs-4\">".$prixodrow["data_prohoda"]."</h6></td>";
        echo "</tr>";
    } 
    $prixodresult->free();
} else{
    echo "Ошибка: " . $conn->error;
}?>                     
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
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
  <script src="src/assets/libs/apexcharts/dist/apexcharts.min.js"></script>
</body>
<?php $conn->close();?>
</html>