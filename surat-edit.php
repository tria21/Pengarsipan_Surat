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
            <h1 class="m-0 text-dark"><b>Arsip Surat >> Unggah</b></h1>
            <p>Unggah surat yang telah terbit untuk diarsipkan.<br>
            <b>Catatan : Gunakan file berformat PDF</b></p>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
    <!-- Main content -->
    <form action="surat-edit-proses.php" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="row">
                  <div class="col-md-12">
                  <!-- Kolom Satu -->
                  
                  <div class="form-group">
                    <label>Nomor Surat</label>
                    <input type="text" name="nomor_surat" value="<?php echo $r_tampil_surat['nomor_surat']; ?>" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Kategori</label>
                    <select name="kategori_surat" class="form-control" value="<?php echo $r_tampil_surat['kategori_surat']; ?>">
					          <option value="">--- Pilih Kategori Surat ---</option>
					          <option value="Undangan">Undangan</option>
                    <option value="Pengumuman">Pengumuman</option>
					          <option value="Nota Dinas">Nota Dinas</option>
                    <option value="Pemberitahuan">Pemberitahuan</option>
				            </select>
                  </div>
                  <div class="form-group">
                    <label>Judul Surat</label>
                    <input type="text" name="judul_surat" value="<?php echo $r_tampil_surat['judul_surat']; ?>" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Unggah Surat (PDF)</label>
                    <input type="file" name="file_surat" value="<?php echo $r_tampil_surat['file_surat']; ?>" class="form-control" accept="application/pdf">
                  </div>

                  <div class="col-12">
                    <a href="surat.php" class="btn btn-danger float-left">Kembali</a>
                    <input type="submit" name="submit" value="Simpan" id="tombol-simpan" class="btn btn-primary float-left"> 
                  </div>
                  </div>
                </div>
              </form>

    <!-- End Content -->
</body>
</html>