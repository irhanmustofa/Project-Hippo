<?php 
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Affan - PWA Mobile HTML Template">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="theme-color" content="#0134d4">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <!-- Title -->
  <title>Affan - PWA Mobile HTML Template</title>
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
    rel="stylesheet">
  <!-- Favicon -->
  <link rel="icon" href="img/core-img/favicon.ico">
  <link rel="apple-touch-icon" href="img/icons/icon-96x96.png">
  <link rel="apple-touch-icon" sizes="152x152" href="img/icons/icon-152x152.png">
  <link rel="apple-touch-icon" sizes="167x167" href="img/icons/icon-167x167.png">
  <link rel="apple-touch-icon" sizes="180x180" href="img/icons/icon-180x180.png">
  <!-- CSS Libraries -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap-icons.css">
  <link rel="stylesheet" href="css/tiny-slider.css">
  <link rel="stylesheet" href="css/baguetteBox.min.css">
  <link rel="stylesheet" href="css/rangeslider.css">
  <link rel="stylesheet" href="css/vanilla-dataTables.min.css">
  <link rel="stylesheet" href="css/apexcharts.css">
  <!-- Core Stylesheet -->
  <link rel="stylesheet" href="style.css">
  <!-- Web App Manifest -->
  <link rel="manifest" href="manifest.json">
</head>

<body>
  <!-- Preloader -->
  <div id="preloader">
    <div class="spinner-grow text-primary" role="status"><span class="visually-hidden">Loading...</span></div>
  </div>
  <!-- Internet Connection Status -->
  <!-- # This code for showing internet connection status -->
  <div class="internet-connection-status" id="internetStatus"></div>
  <!-- Back Button -->
  <div class="login-back-button"><a href="page-login.html">
      <svg class="bi bi-arrow-left-short" width="32" height="32" viewBox="0 0 16 16" fill="currentColor"
        xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z">
        </path>
      </svg></a></div>
  <!-- Login Wrapper Area -->
  <div class="login-wrapper d-flex align-items-center justify-content-center">
    <div class="custom-container">
      <div class="text-center px-4"><img class="login-intro-img" src="img/bg-img/SIGN-UP.png" alt=""></div>
      <!-- Register Form -->
      <div class="register-form mt-4">
        <h6 class="mb-3 text-center">Register to continue</h6>
        <form method="post">

          <div class="mb-3">
            <label class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" name="nama_user" required="required">
          </div>
          <div class="mb-3">
                <label class="form-label">Status</label>
                <select class="form-control" name="level_user" required="required">
                  <option value="">--Pilih Status--</option>
                    <option value="investor">Investor</option>
                    <option value="usahawan">Usahawan</option>
                </select>
              </div>
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="text" class="form-control" name="email_user" required="required">
          </div>
			
          <div class="form-group text-start mb-3 position-relative">
            <label class="form-label">Password</label>
            <input class="form-control" id="psw-input" type="password" name="password_user" >
            <div class="position-absolute" id="password-visibility"><i class="bi bi-eye"></i><i
                class="bi bi-eye-slash"></i></div>
          </div>
          <div class="form-group text-start mb-3 position-relative">
            <label class="form-label">Masukkan captcha sesuai dengan gambar</label>

          </div>

          <input type="button" class="btn btn-info" onclick="CreateCaptcha()" value="Generate Captcha">
          <div id="CaptchaImageCode" class="pt-2">
            <canvas id="CapCode" class="capcode" width="300" height="80"></canvas>
          </div>
          <input class="form-control" id="" type="text" name="captcha" placeholder="Masukkan Captcha">

          <div class="mb-3" id="pswmeter"></div><br>
          <button class="btn w-100 text-white" type="submit" name="simpan" style="background-color: #f7645a;">Sign Up</button>
        </form>
      </div>
      <!-- Login Meta -->
      <div class="login-meta-data text-center">
        <p class="mt-3 mb-0">Already have an account? <a class="stretched-link" href="page-login.php">Login</a></p>
      </div>
    </div>
  </div>
  <!-- All JavaScript Files -->
  <script src="js/captcha.js"></script>
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/internet-status.js"></script>
  <script src="js/dark-rtl.js"></script>
  <!-- Password Strenght -->
  <script src="js/pswmeter.js"></script>
  <script src="js/active.js"></script>
  <!-- PWA -->
  <script src="js/pwa.js"></script>
</body>

</html>

<?php 
if (isset($_POST["simpan"])) {
  $level = $_POST["level_user"];
	$nama = $_POST["nama_user"];
	$email = $_POST["email_user"];
	$password = $_POST["password_user"];
	$captcha = $_POST["captcha"];

	$koneksi -> query("INSERT INTO user (level_user,nama_user,email_user,password_user,captcha) VALUES('$level','$nama','$email','$password','$captcha')");

	echo "<script>alert ('Registrasi Berhasil')</script>";
	echo "<script>location = 'page-login.php'</script>";
}
?>