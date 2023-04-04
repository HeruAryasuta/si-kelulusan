<?php
session_start();
if(isset($_SESSION['logged']) && !empty($_SESSION['logged'])){
include "../config.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Siswa</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="css/jasny-bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-primary">
            <a class="navbar-brand" href="index2.php">SMA 01 Konoha</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar-->
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-primary" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index2.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Data</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Data Admin dan Siswa
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="admin.php">Admin</a>
                                    <a class="nav-link active" href="siswa.php">Siswa</a>
                                </nav>
                            </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Admin</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index2.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Admin</li>
                        </ol>
                        <div class="card mb-4">
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Admin
                            </div>
                        </div>
                        <div class="container">
                        <div class="container">
	<h2>Data Kelulusan</h2><hr>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Tambah Data Siswa
    </button>
</div>
<br>

<div class="row">
	<div class="container">
		<table class="table table-bordered" cellspacing="0">
			<thead>
				<tr>
					<th rowspan="2">No. Ujian</th>
					<th rowspan="2">Nama Siswa</th>
					<th rowspan="2">Kelas</th>
					<th colspan="4">Nilai UN</th>
					<th rowspan="4 ">Status</th>
				</tr>
				<tr>
					<th>Bahasa Indonesia</th>
					<th>Bahasa Inggris</th>
					<th>Matematika</th>
					<th>Biologi</th>
				</tr>
			</thead>
			<tbody>
			<?php
			$qsiswa = mysqli_query($db_conn,"SELECT * FROM siswa");
				while($data = mysqli_fetch_array($qsiswa)){
                    $noujian = $data['no_ujian'];
                    $namasiswa = $data['nama'];
                    $kelas = $data['kelas'];
                    $bi =   $data['n_bin'];
                    $mtk = $data['n_mat'];
                    $bing = $data['n_big'];
                    $bio = $data['n_bio'];
                    $lulus = $data['status'];
				
            $lulus - mysqli_query($db_conn,"UPDATE siswa SET status=((n_bin)+(n_mat)+(n_big)+(n_bio))/4;");
                

			?>

            <tr>
                <td><?=$noujian;?></td>
                <td><?=$namasiswa;?></td>
                <td><?=$kelas;?></td>
                <td><?=$bi;?></td>
                <td><?=$bing;?></td>
                <td><?=$mtk;?></td>
                <td><?=$bio;?></td>
                <td><?=($lulus > 85) ? 'Lulus' : 'Tidak Lulus';?></td>
                
            <?php
            };
            ?>

			</tbody>
		</table>
	</div>
</div>
<?php
} else {
	header('Location: ./login.php');
}
?>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; 2022</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>
        
    </body>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="action.php">
    <div class="modal-body">
    <input type="text" id="no_ujian" name="no_ujian" placeholder="Nomor Ujian" class="form-control mb" required>
    <br>
    <input type="text" id="nama" name="nama" placeholder="Nama" class="form-control" required>
    <br>
    <input type="text" id="kelas" name="kelas" placeholder="Kelas" class="form-control" required>
    <br>
    <input type="text" id="n_bin" name="n_bin" placeholder="Nilai Bahasa Indonsia" class="form-control" required>
    <br>
    <input type="text" id="n_mat" name="n_mat" placeholder="Nilai Matematika" class="form-control" required>
    <br>
    <input type="text" id="n_bing" name="n_bing" placeholder="Nilai Bahasa Inggris" class="form-control" required>
    <br>
    <input type="text" id="n_bio" name="n_bio" placeholder="Nilai Biologi" class="form-control" required>
    <br>
    <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
    </div>
        </form>
      </div>
    </div>
  </div>
</div>
</html>