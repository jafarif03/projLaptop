<?php
session_start();
require_once("config.php");

if(isset($_GET['deleteId'])) {
	unset($_SESSION['products'][$_GET['deleteId']]);
	$_SESSION['count_cart'] -=1;
}

if(isset($_GET['emptyCart'])) {
	unset($_SESSION['products']);
	$_SESSION['count_cart'] = 0;
}

?>
<?php
include_once "header.php";
?>

<main role="main">
	<h1 class="text-center mt-5 pb-5">سبد خرید</h1>
	<div class="album py-5 bg-light">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-12">
					<?php
					$counter = 0;
					$totalPrice = 0;
					$discount = 0;
					if (isset($_SESSION['products'])){

						foreach ($_SESSION['products'] as $id2 => $key) {
							$query = "SELECT * FROM products WHERE product_id=$id2";
							$result = mysqli_query($conn , $query);
							$row = mysqli_fetch_assoc($result);

							$counter++;
							$discount += $row['discount'];
					?>
					<div class="card mb-4 box-shadow">
						<div class="row">
							<div class="col-md-2 text-center">
								<span class="badge badge-info"><?php  echo $counter ?></span>
								<img class="card-img-top img-thumbnail" src="admin/<?php  echo $row['pic'] ?>" style="width: 100px;height: 100px" alt="Card image cap">
							</div>
							<div class="col-md-10 border-bottom">
								<h6 class="card-text mt-2 pb-2"><?php  echo $row['title'] ?></h6>
								<div class="row">
									<div class="col-lg-7">
										<p class="card-text mt-2 ellipse-text-500 d-inline-block"><?php  echo $row['description'] ?></p>
									</div>

									<div class="col-lg-3">
										<p class="card-text bg-secondary text-center text-bold d-inline-block p-2 text-white">قیمت:
											<span style="color: white;">
												<?php
												//محاصبه میزان تخفیف
												$dis = $row['price'] - ($row['price'] * $row['discount'] / 100);
												//جدا کردن سه رقم سه رقم اعداد
												echo number_format($dis);
												$totalPrice += $dis;
												?>
										</span>
											تومان
										</p>
									</div>

									<div class="col-lg-1">
										<a href="?deleteId=<?php  echo $row['product_id'] ?>" style="color: red">
											<i class="fal fa-trash-alt"></i>
										</a>
									</div>
								</div>

							</div>
						</div>
					</div>
					<?php }} ?>
					<?php if($counter == 0 ){ ?>

					<div class="col-md-12 text-center">
						<h2 class="card-text mt-2 p-5  text-center">سبد خرید شما خالی میباشد <i class="fal fa-frown"></i> </h2>
					</div>

					<?php } ?>

					<?php if($counter > 0 ){ ?>
					<div class="card mb-4 box-shadow">
						<div class="row">
							<div class="col-md-3">
								<p class="mr-3  mt-3 mb-3 d-inline-block">مجموع سبد خرید : </p>
								<p class="mt-3 mb-3 d-inline-block"><?php echo number_format($totalPrice) ?></p>
							</div>

							<div class="col-md-3 text-center">
								<p class="mt-3 mb-3 d-inline-block">میزان تخفیف : </p>
								<p class="mt-3 mb-3 d-inline-block"><?php echo $discount ." %" ?></p>
							</div>

							<div class="col-md-2 text-center">
								<span class="badge badge-info mt-3 mb-3">تعداد: <?php echo $counter; ?></span>
							</div>

							<div class="col-md-4 text-center">
								<button class="btn btn-outline-success mt-3 mb-3">نهایی سازی سبد خرید</button>
								<a href="?emptyCart" class="btn btn-outline-danger mt-3 mb-3">خالی کردن سبد خرید</a>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>

			</div>

		</div>
	</div>

</main>

<footer class="text-muted">
	<div class="container text-center">
        <p>کليه حقوق محصولات و محتوای اين سایت متعلق به فروشگاه لپ تاپ جعفری می باشد</p>
	</div>
</footer>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/script.js"></script>
</body>
</html>
