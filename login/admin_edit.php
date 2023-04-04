<?php
session_start();
if(isset($_SESSION['logged']) && !empty($_SESSION['logged'])){
include "../config.php";
?>
<div class="container">
<h2>Manajemen Admin <small>Edit</small></h2><hr>

<?php
$uid = $_REQUEST['uid'];

if(isset($_REQUEST['submit'])){
	//proses simpan data
	$username = $_REQUEST['username'];
	if(isset($_REQUEST['password'])){
		$password = $_REQUEST['password'];
		$sql = "UPDATE un_user SET username='$username', password=md5('$password') WHERE UID='$uid'";
	} else {
		$sql = "UPDATE un_user SET username='$username' WHERE UID='$uid'";
	}
	
	$simpan = mysqli_query($db_conn,$sql);
	if($simpan){
		header('Location: admin.php');
	} else {
		echo 'Ada error dengan query';
	}
} else {
	//form edit user
	$qUser = mysqli_query($db_conn,"SELECT * FROM un_user WHERE UID='$uid'");
	$data = mysqli_fetch_array($qUser);
?>
<html>
<head>
  <meta charset="utf-8">
  <title>Edit</title>
  <link rel="stylesheet" type="text/css" href="add.css">
</head>

<body>
  <div class="login-root">
    <div class="box-root flex-flex flex-direction--column" style="min-height: 100vh;flex-grow: 1;">
      <div class="loginbackground box-background--white padding-top--64">
        <div class="loginbackground-gridContainer">
          <div class="box-root flex-flex" style="grid-area: top / start / 8 / end;">
            <div class="box-root" style="background-image: linear-gradient(white 0%, rgb(247, 250, 252) 33%); flex-grow: 1;">
            </div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 4 / 2 / auto / 5;">
            <div class="box-root box-divider--light-all-2 animationLeftRight tans3s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 6 / start / auto / 2;">
            <div class="box-root box-background--blue800" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 7 / start / auto / 4;">
            <div class="box-root box-background--blue animationLeftRight" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 8 / 4 / auto / 6;">
            <div class="box-root box-background--gray100 animationLeftRight tans3s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 2 / 15 / auto / end;">
            <div class="box-root box-background--cyan200 animationRightLeft tans4s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 3 / 14 / auto / end;">
            <div class="box-root box-background--blue animationRightLeft" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 4 / 17 / auto / 20;">
            <div class="box-root box-background--gray100 animationRightLeft tans4s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 5 / 14 / auto / 17;">
            <div class="box-root box-divider--light-all-2 animationRightLeft tans3s" style="flex-grow: 1;"></div>
          </div>
        </div>
      </div>
      <div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow: 1; z-index: 9;">
        <div class="box-root padding-top--48 padding-bottom--24 flex-flex flex-justifyContent--center">
          <h1><a href="admin.php" rel="dofollow">EDIT ADMIN</a></h1>
        </div>
        <div class="formbg-outer">
          <div class="formbg">
            <div class="formbg-inner padding-horizontal--48">
              <form id="stripe-login" method="post">
                <div class="field padding-bottom--24">
                  <label for="username">Username</label>
                  <input type="text" name="username" value="<?php echo $data['username']; ?>" required autofocus>
                </div>
                <div class="field padding-bottom--24">
                  <div class="grid--50-50">
                    <label for="password">Password</label>
                  </div>
                  <input type="password" name="password">
                </div>
                <div class="field padding-bottom--24">
                  <input type="submit" name="submit" value="Continue">
				  <a href="admin.php" class="btn btn-primary">Batal</a>
                </div>
              </form>
            </div>
          </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
<?php
}
?>

</div>
<?php
} else {
	header('Location: ./login.php');
}
?>