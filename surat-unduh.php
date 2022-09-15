<?php
include('config.php');
if (isset($_GET['id'])) {
	$id = $_GET['id'];

	$sql = mysqli_query($conn, "SELECT * FROM tb_surat WHERE id = '$id'");
	$data = mysqli_fetch_assoc($sql);
	$file_surat = 'arsip_surat/' . $data['file_surat'];
	if (file_exists($file_surat)) {
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename="' . basename($file_surat) . '"');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: ' . filesize('filarsip_surate/' . $data['file_surat']));
		readfile('arsip_surat/' . $data['file_surat']);
		exit;
	}
}