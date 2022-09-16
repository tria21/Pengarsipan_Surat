<?php 
    session_start();
    include'config.php';

    $id=$_GET['id'];
    $q_tampil_surat=mysqli_query($conn,"SELECT * FROM tb_surat WHERE id='$id'");
    $r_tampil_surat=mysqli_fetch_array($q_tampil_surat);
?> 

<!DOCTYPE html>
<html>
<head>

<?php include 'template/header.php';?>
<?php include 'template/sidebar.php';?>
 <!-- sidebar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><b>Arsip Surat >> Detail</b></h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
    <!-- Main content -->
    <form>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">

                      <div class="form-group ">
                        <p><b>Nomor :</b> <?php echo $r_tampil_surat['nomor_surat']; ?></p>
                      </div>

                      <div class="form-group ">
                        <p><b>Kategori :</b> <?php echo $r_tampil_surat['kategori_surat']; ?></p>
                      </div>
                  
                      <div class="form-group ">
                        <p><b>Judul :</b> <?php echo $r_tampil_surat['judul_surat']; ?></p>
                      </div>
                  
                      <div class="form-group ">
                        <p><b>Waktu Unggah :</b> <?php echo $r_tampil_surat['waktu_pengarsipan']; ?></p>
                      </div>

                      <div>
                      <embed src="arsip_surat/<?php echo $r_tampil_surat['file_surat'] ?>" height="600" width="200%"></embed>
                      </div>

                      <ul class="list-inline">
                      <li class="list-inline-item mb-0">
                        <a href="surat.php">
                          <button type="button" class="btn btn-secondary">Kembali</button>
                        </a>
                      </li>
                      <li class="list-inline-item mb-0">
                        <a href="surat-unduh.php?id=<?php echo ($r_tampil_surat['id']) ?>" class="btn btn-success">
														<span class="text">Unduh</span>
													</a>
                      </li>
                      <li class="list-inline-item mb-0">
                        <a href="surat-edit.php?id=<?php echo ($r_tampil_surat['id']) ?>" class="btn btn-primary">
														<span class="text">Edit/Ubah File</span>
													</a>
                      </li>
                    </ul>

                    </div>
                  </div>
                </div>
    </form>

    <!-- End Content -->
 <!-- fotter -->
</body>
</html>