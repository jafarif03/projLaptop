<?php
session_start();
require_once ('config.php');
if(isset($_POST['email'])){
	$email = $_POST['email'];
	$password = $_POST['password'];
	$firstname = $_POST['firstName'];
	$lastname = $_POST['lastName'];
	$address = $_POST['address'];
	$registerTime = date("Y-m-d H:i:s");

	$selectEmail = "SELECT * FROM `user` WHERE `email`='$email'";

	$exist = mysqli_query($conn,$selectEmail);
	if(mysqli_num_rows($exist) > 0){
		header("location: register.php?error=1");
		return;
	}

	$query = "INSERT INTO user(email,password,firstname,lastname,address,registerTime) VALUES ('$email','$password','$firstname','$lastname','$address','$registerTime')";

	if(mysqli_query($conn,$query)){
		$_SESSION['email'] = $email;
		$_SESSION['name'] = $firstname;
		header("location: index.php");
	}else {
		header("location: register.php?error=1");
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>ثبت نام</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap-rtl.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/fontawesome.css">
</head>
<body style="background: url(images/bac2.jpg) center center/cover no-repeat; background-size: initial">
<div class="container">

	<div class="row">
		<div class="offset-2 col-md-8 order-md-1">
			<div class="card mt-5">
				<div class="card-body">
					<h3 class="text-center mb-4"> ثبت نام</h3>
					<?php if(isset($_GET['error'])){ ?>
						<h6 class="text-center mb-4 p-1 bg-warning text-white">ایمیل شما از قبل ثبت نام شده است لطفا <a href="login.php">وارد</a> شوید .</h6>
					<?php } ?>

					<form method="post" action="" class="needs-validation" novalidate>
						<div class="row">
							<div class="col-md-6 mb-3">
								<label for="firstName">نام</label>
								<input type="text" class="form-control" id="firstName" name="firstName" placeholder="" value="" required>
								<div class="invalid-feedback">
									لطفا نام را وارد کنید.
								</div>
							</div>
							<div class="col-md-6 mb-3">
								<label for="lastName">نام خانوادگی</label>
								<input type="text" class="form-control" id="lastName" name="lastName" placeholder="" value="">
								<div class="invalid-feedback">
									لطفا نام خانوادگی را وارد کنید.
								</div>
							</div>
						</div>

						<div class="mb-3">
							<label for="email">ایمیل</label>
							<input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" required>
							<div class="invalid-feedback">
								 ایمیل :
							</div>
						</div>

						<div class="mb-3">
							<label for="email">رمز عبور</label>
							<input type="password" class="form-control" id="password" name="password" placeholder="رمز عبور" required minlength="8">
							<div class="invalid-feedback">
								 رمز عبور :
							</div>
						</div>

						<div class="mb-3">
							<label for="address">آدرس</label>
							<input type="text" class="form-control" id="address" name="address" placeholder="خراسان رضوی, مشهد">
							<div class="invalid-feedback">
								 آدرس :
							</div>
						</div>

						<hr class="mb-4">
						<div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" id="same-address" required>
							<label class="custom-control-label" for="same-address">قوانین و شرایط را قبول دارم .</label>
						</div>

						<hr class="mb-4">
						<button class="btn btn-primary btn-lg btn-block" type="submit">تکمیل فرایند ثبت نام</button>
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