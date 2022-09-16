<?php
	include 'config.php';

	function input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		  return $data;
	}

	if (isset($_GET['id'])) {
	  $id = input($_GET["id"]);
    $sql = "SELECT * FROM tb_surat WHERE id = $id";
		$hasil = mysqli_query($conn, $sql);
		$data = mysqli_fetch_assoc($hasil);
	}

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$id = htmlspecialchars($_POST["id"]);
		$nomor_surat = input($_POST["nomor_surat"]);
		$kategori_surat = input($_POST["kategori_surat"]);
		$judul_surat = input($_POST["judul_surat"]);
    $file_lama = input($_POST['file_lama']);
	  
    if ($_FILES['file_surat']['name'] != "") {
			$ekstensi_diperbolehkan = array('pdf');
			$nama = $_FILES['file_surat']['name'];
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			$ukuran    = $_FILES['file_surat']['size'];
			$file_tmp = $_FILES['file_surat']['tmp_name'];
				if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
					if ($ukuran < 5242880) {
						move_uploaded_file($file_tmp, 'arsip_surat/' . $nama);
							} else {
								echo '<script type="text/javascript"> alert("Ukuran File Terlalu Besar"); </script>';
								echo "<script>document.location='surat.php'</script>";
							}
							} else {
								echo '<script type="text/javascript"> alert("File Harus PDF"); </script>';
								echo "<script>document.location='surat.php'</script>";
							}
								$file_surat = $nama;
							} else {
								$file_surat = $file_lama;
							}

						  $sql = "UPDATE tb_surat SET
							        nomor_surat = '$nomor_surat', 
									    kategori_surat = '$kategori_surat', 
									    judul_surat = '$judul_surat', 
									    file_surat='$file_surat',
									    waktu_pengarsipan=now()
									    WHERE id = $id";

							$hasil = mysqli_query($conn, $sql);

							if ($hasil) {
								echo '<script type="text/javascript"> alert("Perubahan Data Berhasil Disimpan!"); </script>';
								echo "<script>document.location='surat.php'</script>";
							} else {
								echo '<script type="text/javascript"> alert("Perubahan Data Gagal Disimpan!"); </script>';
								echo "<script>document.location='surat.php'</script>";
							}
						}
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
    <form action="surat-edit.php" method="POST" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                <div class="card-body">
                  <div class="row">
                  <div class="col-md-12">
                  
                  <div class="form-group row">
                    <label class="col-sm-2">Nomor surat</label>
                    <div class="col-sm-5">
                      <input type="text" name="nomor_surat" placeholder="Masukkan Nomor Surat" class="form-control" value="<?php echo $data['nomor_surat']; ?>">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2">Kategori</label>
                    <div class="col-sm-7">
                      <select name="kategori_surat" class="form-control" value="<?php echo $query['kategori_surat']; ?>">
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
                      <input type="text" name="judul_surat" placeholder="Masukkan Judul" class="form-control" value="<?php echo $data['judul_surat']; ?>">
                    </div>
                  </div>

                  <div class="form-group row">
										<label for="file" class="col-sm-2 col-form-label">Unggah Surat (PDF)</label>
										<div class="col-sm-10">
											<div class="form-group">
												<div class="custom-file">
													<input type="hidden" id="file_lama" name="file_lama" value="<?= $query['file_surat'] ?>">
													<input type="file" style="height:auto" accept="application/pdf" class="form-control-file form-control height-auto" id="customFile" name="file_surat">
                          <a href= "<?php echo 'arsip_surat/'.$data['file_surat'].''?>"><b>Lihat File Sebelumnya</b></a>
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
                </div>
              </form>

    <!-- End Content -->
</body>
</html>