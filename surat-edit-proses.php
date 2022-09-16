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
            $sql = "SELECT * FROM tb_surat WHERE id=$id";
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
									        file_surat = '$file_surat',
									        waktu_pengarsipan = now()
									        where id = $id";

									$hasil = mysqli_query($conn, $sql);

									if ($hasil) {
										echo '<script type="text/javascript"> alert(Perubahan Data Berhasil Disimpan"); </script>';
										echo "<script>document.location='surat.php'</script>";
									} else {
										echo '<script type="text/javascript"> alert("Perubahan Data Gagal Disimpan"); </script>';
										echo "<script>document.location='surat.php'</script>";
									}
								}
?>