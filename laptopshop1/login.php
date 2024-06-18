<?php
session_start();
require_once("config.php");

if(isset($_POST['email'])){
	$email = $_POST['email'];
	$password = $_POST['password'];

	$query = "SELECT * FROM `user` WHERE `email`='$email' AND `password`='$password'";

	$result = mysqli_query($conn,$query);
	$row = mysqli_fetch_assoc($result);
	if(mysqli_num_rows($result) > 0){
		$_SESSION['email'] = $email;
		$_SESSION['name'] = $row['firstname'];
		header("location: index.php");
	}else{
		header("location: login.php?email=$email");
	}

}

$emilGet = '';
if(isset($_GET['email'])){
	$emilGet = $_GET['email'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>ورود به حساب کاربری</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap-rtl.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/fontawesome.css">
</head>
<body style="background: url(images/backg1.jpg) center center/cover no-repeat;">
<div class="container">

	<div class="row">
		<div class="offset-2 col-md-8 order-md-1">
			<div class="card mt-5">
				<div class="card-heading" style="background: url(images/header-login.jpg) center center/cover no-repeat;"></div>
				<div class="card-body">
					<h3 class="text-center mb-4">فرم ورود به حساب کاربری</h3>
					<?php if(isset($_GET['email'])){ ?>
						<h6 class="text-center mb-4 p-1 bg-danger text-white">نام کاربری و یا رمز عبور شما اشتباه است</h6>
					<?php } ?>
					<form method="post" action="" class="needs-validation" novalidate>

						<div class="mb-3">
							<label for="email">ایمیل</label>
							<input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" value="<?php echo $emilGet ?>" required>
							<div class="invalid-feedback">
								لطفا ایمیل خود را واد کنید برای ارسال جزئیات خرید الزامیست
							</div>
						</div>

						<div class="mb-3">
							<label for="email">رمز عبور</label>
							<input type="password" class="form-control" id="password" name="password" placeholder="رمز عبور" required>
							<div class="invalid-feedback">
								لطفا رمز عبور خود را واد کنید
							</div>
						</div>

						<hr class="mb-4">
						<button class="btn btn-primary btn-lg btn-block" type="submit">ورود</button>
					</form>

				</div>
			</div>
		</div>
	</div>

</div>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/script.js"></script>
</body>
</html>