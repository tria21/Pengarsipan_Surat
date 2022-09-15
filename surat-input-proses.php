<?php

include('config.php');

if (isset($_POST['simpan'])) {
	$nomor_surat = $_POST['nomor_surat'];
	$kategori_surat = $_POST['kategori_surat'];
	$judul_surat = $_POST['judul_surat'];
	if ($_FILES['file_surat']['name'] != "") {
		$ekstensi_diperbolehkan    = array('pdf');
		$nama_file       = $_FILES['file_surat']['name'];
		$x          = explode('.', $nama_file);
		$ekstensi   = strtolower(end($x));
		$ukuran     = $_FILES['file_surat']['size'];
		$file_tmp   = $_FILES['file_surat']['tmp_name'];

		if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
			if ($ukuran < 5242880) {
				move_uploaded_file($file_tmp, 'arsip_surat/' . $nama_file);
				$sql = "INSERT INTO tb_surat (nomor_surat, kategori_surat, judul_surat, file_surat) VALUES ('$nomor_surat', '$kategori_surat', '$judul_surat', '$nama_file');";

				$query = mysqli_query($conn, $sql);
				if ($query) {
					echo '<script type="text/javascript"> alert("Surat Berhasil Diarsipkan"); </script>';
					echo "<script>document.location='surat.php'</script>";
				} else {
					echo '<script type="text/javascript"> alert("Surat Gagal Diarsipkan"); </script>';
					echo "<script>document.location='surat.php'</script>";
				}
			} else {
				echo '<script type="text/javascript"> alert("Ukuran File Surat Terlalu Besar"); </script>';
				echo "<script>document.location='surat.php'</script>";
			}
		} else {
			echo '<script type="text/javascript"> alert("Ekstensi File Harus PDF"); </script>';
			echo "<script>document.location='surat.php'</script>";
		}
	}
} else {
	echo 'Silahkan Coba lagi';
}