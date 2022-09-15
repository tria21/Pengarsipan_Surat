<?php
session_start();// menjalankan sesion PHP 
include'config.php';
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
          <div class="col-sm-12"><br>
            <h1 class="m-0 text-dark"><b>Arsip Surat >> Unggah</b></h1>
            <p>Unggah surat yang telah terbit untuk diarsipkan.<br>
            <b>Catatan : Gunakan file berformat PDF</b></p>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
    <!-- Main content -->
    <form action="surat-input-proses.php" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="row">
                  <div class="col-md-12">
                  <!-- Kolom Satu -->
                  <div class="form-group row">
                    <label class="col-sm-2">Nomor surat</label>
                    <div class="col-sm-5">
                      <input type="text" name="nomor_surat" placeholder="Masukkan Nomor Surat" class="form-control">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2">Kategori</label>
                    <div class="col-sm-7">
                      <select name="kategori_surat" class="form-control">
                      <option value="">--- Pilih Kategori Surat ---</option>
                      <option value="Undangan">Undangan</option>
                      <option value="Pengumuman">Pengumuman</option>
                      <option value="Nota Dinas">Nota Dinas</option>
                      <option value="Pemberitahuan">Pemberitahuan</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2">Judul</label>
                    <div class="col-sm-10">
                      <input type="text" name="judul_surat" placeholder="Masukkan Judul" class="form-control">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="file" class="col-sm-2 col-form-label">Unggah Surat (PDF)</label>
                    <div class="col-sm-10">
                      <input type="hidden" name="file_surat" value="<?php echo $query['file_surat']; ?>">
                      <div class="form-group">
                        <div class="custom-file">
                          <input type="file" style="height:auto" class="form-control-file form-control height-auto" id="customFile" name="file_surat" accept="application/pdf" required>
                        </div>
                      </div>
                    </div>
                  </div>

                  <ul class="list-inline">
                    <li class="list-inline-item mb-0">
                      <a href="surat.php">
                        <button type="button" class="btn btn-secondary">Kembali</button>
                      </a>
                    </li>
                    <li class="list-inline-item mb-0">
                      <a href="surat.php">
                        <button type="submit" value="Simpan" name="simpan" class="btn btn-primary">Simpan</button>
                      </a>
                    </li>
                  </ul>
                </div>
              </form>

    <!-- End Content -->
</body>
</html>