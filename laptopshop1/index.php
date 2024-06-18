<?php
include_once "header.php";
?>
<main role="main">

	<section class="jumbotron text-center" style="background-color: #c0a2d5">
		<div class="container">
			<h1 class="jumbotron-heading ">خدمات پس از فروش و گارانتی</h1>
			<p class="lead text-muted" >در فروشگاه جعفری می توانید تمامی اجناس را با تضمین کیفیت و گارانتی پس از فروش داشته باشید
            </p>
			<p>
				<a href="#" class="btn btn-info my-2">تماس با ما</a>
				<a href="about.php" class="btn btn-secondary my-2">درباره ما</a>
			</p>
		</div>
	</section>

	<div class="container">
		<div class="row mb-2">
			<div class="col-md-6">
				<div class="card flex-md-row mb-4 box-shadow h-md-250">
					<div class="card-body d-flex flex-column align-items-start">
						<h3 class="mb-0">
							<a class="text-dark" href="#">تخفیف ویژه لپ تاپ</a>
						</h3>
						<div class="mb-1 text-muted">از 20 اسفند ماه</div>
						<p class="card-text mb-auto">تا %40 درصد تخفیف به مناسبت فرارسیدن سال جدید</p>
						<a href="#">جزئیات</a>
					</div>
					<img class="card-img-right flex-auto d-none d-md-block" src="images/darsad.jpg" alt="Card image cap" style="height: 200px; width: 200px">
				</div>
			</div>
			<div class="col-md-6">
				<div class="card flex-md-row mb-4 box-shadow h-md-250">
					<div class="card-body d-flex flex-column align-items-start">
						<h3 class="mb-0">
							<a class="text-dark" href="#">ارسال رایگان</a>
						</h3>
						<div class="mb-1 text-muted"></div>
						<p class="card-text mb-auto">ارسال تمامی محصولات به صورت رایگان به تمامی نقاط ایران</p>
						<a href="#">ادامه مطلب</a>
					</div>
					<img class="card-img-right flex-auto d-none d-md-block" src="images/truck.png" alt="Card image cap">
				</div>
			</div>
		</div>
	</div>

	<div class="album py-5 bg-light">
		<div class="container">

			<h4 class="pb-3 mb-4 border-bottom">
				محصولات اخیر
			</h4>
			<div class="row">

				<?php
				if(isset($_GET['cat_id'])){
					$cat_id = $_GET['cat_id'];
					$q = "SELECT * FROM products WHERE category_id = $cat_id ORDER BY product_id DESC LIMIT 20";
				}else{
					$q = "SELECT * FROM products ORDER BY product_id DESC LIMIT 4";
				}
				$data = mysqli_query($conn,$q);

				while($row = mysqli_fetch_assoc($data)){

				?>

				<div class="col-12 col-md-3">
					<div class="card mb-4 box-shadow">
						<img class="card-img-top" src="admin/<?php  echo $row['pic'] ?>" alt="Card image cap">
						<div class="card-body">
							<p class="card-text"><?php  echo $row['title'] ?></p>

							<p class="card-text">قیمت:
								<span style="color: green;">
									<?php
									$dis = $row['price'] - ($row['price'] * $row['discount'] / 100);
									echo number_format($dis);
									?>
								</span> تومان</p>
							<?php
							if ($row['discount'] > 0){
							?>
							<p class="card-text text-muted small">قیمت اصلی: <del style="color: red;"><?php  echo number_format($row['price']) ?></del> تومان</p>
							<?php } ?>
							<div class="d-flex justify-content-between align-items-center">
								<div class="btn-group">
									<a href="single.php?p_id=<?php  echo $row['product_id'] ?>" class="btn btn-sm btn-outline-secondary">نمایش <i class="fal fa-eye"></i></a>
									<a href="index.php?id_cart=<?php  echo $row['product_id'] ?>" class="btn btn-sm btn-outline-success">افزودن به سبد خرید <i class="fal fa-cart-plus"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<?php } ?>

			</div>


		</div>
	</div>
    <?php
    if(!isset($_GET['cat_id'])){
        ?>
        <div class="album py-5 bg-light">
            <div class="container">

                <h4 class="pb-3 mb-4 border-bottom">
                    جدید ترین محصولات
                </h4>
                <div class="row">

                    <?php
                    $q = "SELECT * FROM products ORDER BY product_id DESC LIMIT 4 ";
                    $data = mysqli_query($conn,$q);

                    while($row = mysqli_fetch_assoc($data)){

                        ?>

                        <div class="col-12 col-md-3">
                            <div class="card mb-4 box-shadow">
                                <img class="card-img-top" src="admin/<?php  echo $row['pic'] ?>" alt="Card image cap">
                                <div class="card-body">
                                    <p class="card-text"><?php  echo $row['title'] ?></p>

                                    <p class="card-text">قیمت:
                                        <span style="color: green;">
									<?php
                                    $dis = $row['price'] - ($row['price'] * $row['discount'] / 100);
                                    echo number_format($dis);
                                    ?>
								</span> تومان</p>
                                    <?php
                                    if ($row['discount'] > 0){
                                        ?>
                                        <p class="card-text text-muted small">قیمت اصلی: <del style="color: red;"><?php  echo number_format($row['price']) ?></del> تومان</p>
                                    <?php } ?>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="single.php?p_id=<?php  echo $row['product_id'] ?>" class="btn btn-sm btn-outline-secondary">نمایش <i class="fal fa-eye"></i></a>
                                            <a href="index.php?id_cart=<?php  echo $row['product_id'] ?>" class="btn btn-sm btn-outline-success">افزودن به سبد خرید <i class="fal fa-cart-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php } ?>

                </div>


            </div>
        </div>
    <?Php
    }
    ?>


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