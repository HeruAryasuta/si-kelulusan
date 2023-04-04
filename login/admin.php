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
        <title>Tables - Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-primary">
            <a class="navbar-brand" href="index2.php">SMA 01 Konoha</a>
            <!-- <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button> -->
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-primary" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading"></div>
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
                                    <a class="nav-link active" href="admin.php">Admin</a>
                                    <a class="nav-link" href="siswa.php">    Siswa</a>
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
<?php
		
	$qUser = mysqli_query($db_conn,"SELECT * FROM admin ORDER BY username");

	echo '<div class="row">';
	echo '<div class="col-md-6">';
	echo '<table class="table table-bordered">';
	echo '<thead><tr><th>#</th><th>Username</th><th><a href="admin_add.php" class="btn btn-dark btn-sm"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah</a></th></tr></thead>';
	echo '<tbody>';
	
	$no = 1;
	while($data = mysqli_fetch_array($qUser)){
		echo '<tr>';
		echo '<td>'.$no.'</td>';
		echo '<td>'.$data['username'].'</td>';
		echo '<td><a href="admin_edit.php?uid='.$data['UID'].'" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit</a> ';
		echo '<a href="admin_del.php?uid='.$data['UID'].'" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin akan menghapus user ini?\')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</a></td>';
		echo '</tr>';
		$no++;
	}
	
	echo '</tbody></table></div></div>';
?>
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
    </body>
</html>