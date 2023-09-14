<?php 
if(empty($_COOKIE['login'])){
  header('Location:/auth.php');
  die();
}
?>
<!doctype html>
<html lang="ru">
<?php 
  include_once 'pass.php';
  $conn_table = new mysqli($localhost,$username,$password,$database);
if ($conn_table->connect_error) {
  die("Connection failed: " . $conn_table->connect_error);
}           
  ?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Склад</title>
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
              <a class="sidebar-link" href="/" aria-expanded="false">
                <span>
                <i class="ti ti-layout-dashboard"></i>            
                </span>
                <span class="hide-menu">Отчеты</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/stock.php" aria-expanded="false">
                <span>
                <i class="ti ti-file-description"></i>
                </span>
                <span class="hide-menu">Склады</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/projects.php" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Проекты</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/cards.php" aria-expanded="false">
                <span>
                  <i class="ti ti-cards"></i>
                </span>
                <span class="hide-menu">Карты</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/attention.php" aria-expanded="false">
                <span>
                  <i class="ti ti-alert-circle"></i>
                </span>
                <span class="hide-menu">Внимание</span>
              </a>
            </li>
          </ul>
 
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
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="src/assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3">My Profile</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-mail fs-6"></i>
                      <p class="mb-0 fs-3">My Account</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-list-check fs-6"></i>
                      <p class="mb-0 fs-3">My Task</p>
                    </a>
                    <a href="./authentication-login.html" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->
      <div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
<!-- ######################################## -->
<!-- ############ конец таблицы ############# -->  
<!-- ######################################## -->
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
                     $sql_table = "SELECT * FROM rashod WHERE upload_date>='2023-08-24'";
                     if($result_table = $conn_table->query($sql_table)){
    $rowsCount = $result_table->num_rows; // количество полученных строк
    foreach($result_table as $row_table){
        echo "<tr>";
        echo "<td class=\"border-bottom-0\"><h6 class=\"fw-semibold mb-0\">". $row_table["nomer"] ."</h6></td>";
        echo "<td class=\"border-bottom-0\" >";
        echo "<h6 class=\"fw-semibold mb-1\"style=\"white-space:normal !important\"> ".$row_table["name"]."</h6>";
        echo "<span class=\"fw-normal\">".$row_table["kod_material"]."</span>";                         
        echo "</td>";
        echo "<td class=\"border-bottom-0\"><p class=\"mb-0 fw-normal\">". $row_table["kolichestvo"]."</p></td>";
        if($row_table["ed_izm"]=="ШТ"){
          $mesuare_mark="bg-primary";
        }
        elseif($row_table["ed_izm"]=="ЛИТР"){
          $mesuare_mark="bg-secondary";
        }
        elseif($row_table["ed_izm"]=="КГ"){
          $mesuare_mark="bg-success";
        }
        else{
          $mesuare_mark="bg-danger";
        }
        echo "<td class=\"border-bottom-0\"><div class=\"d-flex align-items-center gap-2\"><span class=\"badge ".$mesuare_mark." rounded-3 fw-semibold\">".$row_table["ed_izm"]."</span></div></td>";
        echo "<td class=\"border-bottom-0\"><h6 class=\"fw-semibold mb-0 fs-4\">".$row_table["cena"]."</h6></td>";
        echo "<td class=\"border-bottom-0\"><h6 class=\"fw-semibold mb-0 fs-4\">".$row_table["summa"]."</h6></td>";
        echo "<td class=\"border-bottom-0\"><h6 class=\"fw-semibold mb-0 fs-4\">".$row_table["sklad"]."</h6></td>";
        echo "<td class=\"border-bottom-0\"><h6 class=\"fw-semibold mb-0 fs-4\">".$row_table["data_prihoda"]."</h6></td>";
        echo "<td class=\"border-bottom-0\"><h6 class=\"fw-semibold mb-0 fs-4\">".$row_table["upload_date"]."</h6></td>";
        echo "</tr>";
    } 
    $result_table->free();
} else{
    echo "Ошибка: " . $conn_table->error;
}?>
<!-- ######################################## -->

                    </tbody>
                  </table>
                </div>
<!-- ######################################## -->
<!-- ############ конец таблицы ############# -->  
<!-- ######################################## -->          
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="src/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="src/assets/js/sidebarmenu.js"></script>
  <script src="src/assets/js/app.min.js"></script>
  <script src="src/assets/libs/simplebar/dist/simplebar.js"></script>
</body>

</html>