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
        <div class="row">
          <div class="col-sm-12"><br>
            <h1 class="m-0 text-dark"><b>Arsip Surat</b></h1>
            <p>
            Berikut ini adalah surat-surat yang telah diterbitkan dan diarsipkan. <br>
            Klik "Lihat" pada kolom aksi untuk melihat isi surat.
            </p>
          </div><!-- /.col -->
          <div class="form-inline"> 
            <!-- <div align="right"> 
            <div class="form-inline">  -->
            <div class="col-sm-12"> 
                <form method=POST> 
                    <input type="text" name="pencarian" placeholder="Search">
                        <button class="btn" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                </form> 
            </div> 
        <!-- </div> -->
            <!-- </div>  -->
        </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
    <br>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nomor Surat</th>
                    <th>Kategori</th>
                    <th>Judul</th>
                    <th>Waktu Pengarsipan</th>
                    <th>Aksi</th>
                </tr>
                </thead>

                <tbody> 
            <?php 
                $batas = 10;
                extract($_GET); 
                if(empty($hal)) { 
                    $posisi = 0; 
                    $hal = 1; 
                    $nomor = 1; 
                }else { 
                    $posisi = ($hal - 1) * $batas; 
                    $nomor = $posisi+1; 
                }

                if($_SERVER['REQUEST_METHOD'] == "POST") { 
                    $pencarian = trim(mysqli_real_escape_string($conn, $_POST['pencarian'])); 
                    if($pencarian != "") { 
                        $sql = "SELECT * FROM tb_surat WHERE id LIKE '%$pencarian%' 
                                OR id LIKE '%$pencarian%' 
                                OR nomor_surat LIKE '%$pencarian%' 
                                OR kategori_surat LIKE '%$pencarian%'
                                OR judul_surat LIKE '%$pencarian%'"; 

                        $query = $sql; 
                        $queryJml = $sql; 

                    } else { 
                        $query = "SELECT * FROM tb_surat LIMIT $posisi, $batas"; 
                        $queryJml = "SELECT * FROM tb_surat"; 
                        $no = $posisi * 1; 
                    }
                }
                else { 
                    $query = "SELECT * FROM tb_surat LIMIT $posisi, $batas"; 
                    $queryJml = "SELECT * FROM tb_surat"; 
                    $no = $posisi * 1; 
                }

                //$sql="SELECT * FROM tbsurat ORDER BY idsurat DESC"; 
                $q_tampil_surat = mysqli_query($conn, $query); 

                /* Pengecekan apakah terdapat data di database, jika ada, tampilkan*/ 
                if(mysqli_num_rows($q_tampil_surat) > 0) { 

                    /* looping data surat sesuai yang ada di database */
                    while($r_tampil_surat=mysqli_fetch_array($q_tampil_surat)) {
            ?>
            <tr>
                <td><?php echo $nomor; ?></td>
                <td><?php echo $r_tampil_surat['nomor_surat']; ?></td>
                <td><?php echo $r_tampil_surat['kategori_surat']; ?></td>
                <td><?php echo $r_tampil_surat['judul_surat']; ?></td>
                <td><?php echo $r_tampil_surat['waktu_pengarsipan']; ?></td>
                <td>
					<a href="surat-delete.php?id=<?php echo $r_tampil_surat['id'];?>" onclick = "return confirm ('Apakah Anda Yakin Akan Menghapus Data Ini?')" class="btn btn-danger" style="color:#ef8157; font-weight:bold"><i class="nav-icon fas fa-trash" title="Delete"></i></a>
                    <a href="surat-unduh.php?id=<?php echo ($r_tampil_surat['id']) ?>" class="btn btn-success"><i class="nav-icon fas fa-download" title="Unduh"></i></a>
                    <a href="surat-detail.php?id=<?php echo $r_tampil_surat['id'];?>" class="btn btn-primary"><i class="nav-icon fas fa-eye" title="Detail"></i></a>
                </td>
            </tr>
            <?php 
                        $nomor++;  
                    }   // selesai looping while 
                } 
                else { 
                    echo "<tr><td colspan=6>Data Tidak Ditemukan</td></tr>"; 
                }
            ?> 
        </tbody>
    </table>
    </div> 
    </div>

    <div class="col-sm-6">
        <a href="surat-input.php" class="btn btn-success">Arsipkan</a>
	</div>
    <!-- End Content -->
 <!-- fotter -->
 </section>
    <!-- /.content -->
 <!-- fotter -->
</body>
</html>