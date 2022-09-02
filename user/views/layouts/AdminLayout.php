<?php
$refs = allDownlines($username);
$reg_bonus = $app->reg_bonus;
CheckWallet($id,$reg_bonus);
if($user_role == 'user')

// Prevent None Admins
{
  header("Location: ../user/");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $page_title . " | " . $app->site_name;?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../user/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../user/assets/dist/css/adminlte.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../user/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../user/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../user/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../user/assets/plugins/toastr/toastr.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <?php if($user_role === "admin")
      {
        ?>
        <li class="nav-item d-none d-sm-inline-block btn-secondary text-white">
        <a href="../user/" class="nav-link">User Area</a>
      </li>
      <?php
      }?>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" title="Logout" data-widget="tooltip">
          <i class="fas fa-power-off"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
  <?php
  if ($status != 1) {
    ?>
    <div class="alert alert-danger alert-dismissible text-center">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      Account is not active. Activate to start earning. <a href="./account-activation" class="alert-link">Activate now</a>
    </div>
    <?php
  }
  ?>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../user/assets/dist//img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><?php echo $app->site_name;?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php if ($avatar!=null) { echo $avatar;}else { echo '../user/assets/dist/img/avatar.png';} ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $name;?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="./dashboard" class="nav-link <?php if($page ==="dashboard"){echo'active';} ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link <?php if($page ==="user" || $page ==="admins" || $page ==="active_users" || $page ==="inactive_users" ){echo'active';} ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                User Mannagement
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item ">
                <a href="active-users" class="nav-link  <?php if($page ==="active_users" ){echo'active';} ?>">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Active Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="admins" class="nav-link  <?php if($page ==="admins" ){echo'active';} ?>">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Admins</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="inactive-users" class="nav-link  <?php if($page ==="inactive_users" ){echo'active';} ?>">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Inactive Users</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="./withdrawals" class="nav-link <?php if($page ==="withdraw"){echo'active';} ?>">
              <i class="nav-icon fa fa-money-bill"></i>
              <p>
                Withdrawals
                <span class="right badge badge-danger"><?php echo pendingWitdrawals();?></span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./ads" class="nav-link <?php if($page ==="ads"){echo'active';} ?>">
              <i class="nav-icon fa fa-bullhorn"></i>
              <p>
                Ads Management
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link <?php if($page ==="general" || $page ==="email" || $page ==="frontend"){echo'active';} ?>">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Settings
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="general-settings" class="nav-link <?php if($page ==="general"){echo'active';} ?>">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>General settings</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="email-settings" class="nav-link <?php if($page ==="email"){echo'active';} ?>">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Email settings</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="front-settings" class="nav-link <?php if($page ==="frontend"){echo'active';} ?>">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Frontend settings</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="./logout" class="nav-link">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?php echo $page_title;?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="./">Admin</a></li>
              <li class="breadcrumb-item active"><?php echo $page_title;?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <?php include "../user/views/admin/".$page.".php";?>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      1.0
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; <?php echo date('Y') . ' <a href="/">'. $app->site_name.'</a>.</strong> All rights reserved.';?>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../user/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../user/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../user/assets/dist/js/adminlte.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../user/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../user/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../user/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../user/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../user/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../user/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../user/assets/plugins/jszip/jszip.min.js"></script>
<script src="../user/assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../user/assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../user/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../user/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../user/assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Toastr -->
<script src="../user/assets/plugins/toastr/toastr.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<?php
if (isset($_COOKIE['notify'])) {
  $type = $_COOKIE['notify_type'];
  $msg = $_COOKIE['notify'];
  ?>
<script>
  toastr.<?php echo $type;?>('<?php echo $msg;?>')
</script>
  <?php
}
?>
</body>
</html>