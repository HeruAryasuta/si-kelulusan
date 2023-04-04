<?php
include "config.php";
$que = mysqli_query($db_conn, "SELECT * FROM sekolah");
$hsl = mysqli_fetch_array($que);


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sistem Informasi Kelulusan</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="style.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  </head>
  <body>
    <nav
      class="navbar navbar-expand-lg bg-transparent text-dark shadow-sm fixed-top"
    >
      <div class="container">
        <a class="navbar-brand" href="#home">Pengumuman Kelulusan</a>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link"  href="#about"
                >About</a>
            </li>
            <li class="nav-item"> 
              <a class="nav-link" href="#contact">Contact us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login/login.php"
                >Login</a
              >
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!--Main-->
    <section class="jumbotron" id="home">
      <h1 class="text-center fw-bold">Pengumuman Kelulusan</h1>
      <h2 class="text-center">SMA Negeri 01 Konoha</h2>
      <h3 class="text-center">Tahun <?=$hsl['tahun']?></h3>
		
		<div id="xpengumuman">
		<?php
		if(isset($_REQUEST['submit'])){
			//tampilkan hasil queri jika ada
			$no_ujian = $_REQUEST['no_ujian'];
			
			$hasil = mysqli_query($db_conn,"SELECT * FROM siswa WHERE no_ujian='$no_ujian'");
			if(mysqli_num_rows($hasil) > 0){
				$data = mysqli_fetch_array($hasil);

				
		?>
    <a href="index.php"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M10.78 19.03a.75.75 0 0 1-1.06 0l-6.25-6.25a.75.75 0 0 1 0-1.06l6.25-6.25a.749.749 0 0 1 1.275.326.749.749 0 0 1-.215.734L5.81 11.5h14.44a.75.75 0 0 1 0 1.5H5.81l4.97 4.97a.75.75 0 0 1 0 1.06Z"></path></svg></a>
			<table class="table table-bordered">
        
				<tr><td>No Ujian</td><td><?php echo $data['no_ujian']; ?></td></tr>
        <tr><td>Nama Siswa</td><td><?php echo $data['nama']; ?></td></tr>
				<tr><td>Nilai Rata-rata</td><td><?php echo $data['status']; ?></td></tr>
				<tr><td>Kelas</td><td><?php echo $data['kelas']; ?></td></tr>
			</table>
      
			<?php
			if( $data['status'] > 85 ){
				echo '<div class="alert alert-success text-center" role="alert"><strong>SELAMAT !</strong> Anda dinyatakan LULUS.</div>';
			} else {
				echo '<div class="alert alert-danger text-center" role="alert"><strong>MAAF !</strong> Anda dinyatakan TIDAK LULUS.</div>';
			}	
			?>
			
			
			
		<?php
			} else {
				echo '<div class="text-center"> <strong> no ujian yang anda inputkan tidak lengkap atau tidak sesuai! periksa kembali no ujian anda.</strong></div>';
				//tampilkan pop-up dan kembali tampilkan form
			}
		} else {
			//tampilkan form input nomor ujian
		?>

      <hr class="garis1 mx-auto" style="width: 20%" />
      <form method="post">
                <input type="text" name="no_ujian" class="form-control mx-auto m-4" style="width: 50%;" placeholder="Masukan Nomor Ujian disini" required>
                <span class="vstack col-md-2 mx-auto pb-5 pt-3 mb-5">
                    <button class="btn btn-primary" type="submit" name="submit">Periksa!</button>
                </span>
        </form>
    <?php
		}
		?>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffffff" fill-opacity="1" d="M0,96L60,85.3C120,75,240,53,360,90.7C480,128,600,224,720,261.3C840,299,960,277,1080,245.3C1200,213,1320,171,1380,149.3L1440,128L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg>
    </section>
    <!--About-->
    <section class="about" id="about">
      <h1 class="text-center" data-aos="fade-up">Tentang Website Kami!</h1>
      <!-- <hr class="garis2" /> -->
      <p class="text-center pt-3" data-aos="fade-down">
        website ini adalah sistem informasi pengumuman kelulusan ujian nasional
        online yang <br />
        memudahkan para murid tidak perlu datang ke sekolah lagi. Dan menghemat
        anggaran sekolah.
      </p>
      <div class="vstack col-xl-3 mx-auto pb-5 pt-3">
        <button
          type="button"
          class="btn btn-primary"
          onclick="location.href='#contact'"
          data-aos="fade-right"
        >
          Hubugi Kami
        </button>
      </div>
    </section>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#e2edff" fill-opacity="1" d="M0,192L48,202.7C96,213,192,235,288,213.3C384,192,480,128,576,117.3C672,107,768,149,864,154.7C960,160,1056,128,1152,133.3C1248,139,1344,181,1392,202.7L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
    <!--contact us-->
    <section class="kontak" id="contact">
      <div class="container">
        <div class="row text-center pt-5">
          <div class="col">
            <h2 data-aos="zoom-in">Mari Berkomunikasi</h2>
          </div>
        </div>
        <div class="row justify-content-center" data-aos="fade-up-right">
          <div class="col-md-6">
            <form>
              <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input
                  type="text"
                  class="form-control"
                  id="nama"
                  aria-describedby="nama"
                />
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email </label>
                <input
                  type="email"
                  class="form-control"
                  id="email"
                  aria-describedby="email"
                />
              </div>
              <div class="mb-3">
                <label for="pesan" class="form-label">Pesan</label>
                <textarea class="form-control" id="pesan" rows="3"></textarea>
              </div>
              <button type="submit" class="btn btn-primary mb-5">Kirim</button>
            </form>
          </div>
        </div>
      </div>
      
    </section>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
  </body>
</html>