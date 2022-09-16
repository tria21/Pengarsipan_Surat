<?php 
    session_start();
    include'config.php';
?> 

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> User Profile</title>
  <!-- Tell the browser to be responsive to screen width -->

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
 <?php include 'template/header.php';?>
<?php include 'template/sidebar.php';?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profil</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Detail Profil</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
         
          <!-- /.col -->
          <div class="col-md-12">
            <!-- About Me Box -->
            <div class="card card-primary">
              <!-- /.card-header -->
              <div class="card-body">
                <div class="card-body">

                <img class="img-fluid px-3" style="width: 15rem; float:left;" src="img/tria.jpg" alt="...">
                <p>Aplikasi ini dibuat oleh : </p>
              
			          <table class="table table-striper" style="width: 15rem; float:left;">
                  <tbody>
                    <tr>
                      <td>Nama</td>
                      <td>Siti Amalia Fitriani</td>
                    </tr>
                    <tr>
                      <td>NIM</td>
                      <td>1931710005</td>
                    </tr>
                    <tr>
                      <td>Tanggal</td>
                      <td>13 September 2022</td>
                    </tr>
                  </tbody>
                </table>
                  </div>
                      <a href="dashboard.php" class="btn btn-success float-right">Kembali</a>
                  </div>
              <!-- /.card-body -->
              </div>
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>