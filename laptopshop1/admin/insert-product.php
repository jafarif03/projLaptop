<?php
require_once ("header.php");

if(isset($_POST['title'])){
	$title = $_POST['title'];
	$description = $_POST['description'];
	$price = $_POST['price'];
	$discount = $_POST['discount'];
	$category_id = $_POST['category_id'];
	$creationTime = date("Y-m-d H:i:s");

	$img_name = $_FILES['pic']['name'];
	$target_dir = "upload/$img_name";
	$target_file = $target_dir . basename($_FILES["pic"]["name"]);

	// Select file type
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	// Valid file extensions
	$extensions_arr = array("jpg","jpeg","png","gif");

	// Check extension
	if( in_array($imageFileType,$extensions_arr) ){

		// Upload file
		move_uploaded_file($_FILES['pic']['tmp_name'],$target_dir);

		// Insert record
		if(!isset($_GET['p_id_edit'])){
			$query = "INSERT INTO products(category_id,title,description,price,discount,creationTime,pic) VALUES ('$category_id','$title','$description','$price','$discount','$creationTime','$target_dir')";
		}else{
			$query = "UPDATE products SET category_id='$category_id',title='$title',description='$description',price='$price',discount='$discount',creationTime='$creationTime',pic='$target_dir' WHERE product_id=".$_GET['p_id_edit'];
		}

		$res_insert = mysqli_query($conn,$query);

		if($res_insert){
			header("location: index.php");
		}else {
			header("location: ../register.php?error=1");
		}

	}

}

//edit var

$e_title = "";
$e_description = "";
$e_price = "";
$e_discount = "";
$e_category_id = "";
$e_pic = "";
if(isset($_GET['p_id_edit'])){
	$select_product = "SELECT * FROM products WHERE product_id=".$_GET['p_id_edit'];
	$res_fetch = mysqli_query($conn,$select_product);
	$row_fetch = mysqli_fetch_assoc($res_fetch);

	$e_title = $row_fetch['title'];
	$e_description = $row_fetch['description'];
	$e_price = $row_fetch['price'];
	$e_discount = $row_fetch['discount'];
	$e_category_id = $row_fetch['category_id'];
	$e_pic = $row_fetch['pic'];
}

?>

	<div class="container-fluid">
		<div class="row">

			<main role="main" class="col-md-9 mr-sm-auto col-lg-10 pt-3 px-4">
				<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
					<h1 class="h2">افزودن محصول جدید</h1>
					<div class="btn-toolbar mb-2 mb-md-0">
					</div>
				</div>
			</main>

			<div class="container">

				<div class="row">
					<div class="offset-2 col-md-10">
						<div class="card mt-5">
							<div class="card-body">

								<form method="post" action="" class="needs-validation" enctype="multipart/form-data" novalidate>
									<div class="row">
										<div class="col-md-6 mb-3">
											<label for="title">نام محصول</label>
											<input type="text" class="form-control" id="title" name="title" value="<?php echo $e_title ?>" required>
											<div class="invalid-feedback">
												لطفا نام محصول را وارد کنید.
											</div>
										</div>
									</div>

									<div class="mb-3">
										<label for="description">توضیحات</label>
										<textarea class="form-control" id="description" name="description" rows="6" required><?php echo $e_description ?></textarea>
										<div class="invalid-feedback">
											لطفا توضیحات محصول خود را واد کنید
										</div>
									</div>

									<div class="row">
										<div class="col-md-6 mb-3">
											<label for="price">قیمت</label>
											<input type="number" class="form-control" id="price" name="price" value="<?php echo $e_price ?>" required>
											<div class="invalid-feedback">
												لطفا قیمت را واد کنید
											</div>
										</div>

										<div class="col-md-6 mb-3">
											<label for="discount">تخفیف</label>
											<input type="number" class="form-control" id="discount" value="<?php echo $e_discount ?>" placeholder="میزان تخفیف به درصد مثلا: 20" name="discount">
											<div class="invalid-feedback">
												لطفا تخفیف را واد کنید
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-6 mb-3">

											<label for="category_id">دسته بندی</label>
											<select class="custom-select" id="category_id" name="category_id" required>

												<?php
												$q = "SELECT * FROM category";
												$data = mysqli_query($conn,$q);

												while($row = mysqli_fetch_assoc($data)){
													if($row['category_id'] == $e_category_id){
														$row_id = 'value="'.$row['category_id'] . '" selected';
													}else{
														$row_id = 'value="'.$row['category_id'] . '"';
													}

												?>

													<option <?php  echo $row_id ?>><?php  echo $row['name'] ?></option>
												<?php } ?>
											</select>
											<div class="invalid-feedback">
												لطفا دسته بندی را انتخاب کنید
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-6 mb-3">
											<label>تصویر محصول</label><br>
											<label for="pic" class="btn btn-secondary"> انتخاب تصویر محصول <i class="fal fa-file-upload"></i></label>
											<input type="file" class="d-none" id="pic" name="pic" required>
											<div class="invalid-feedback">
												لطفا تصویر را واد کنید
											</div>
											<?php if(isset($_GET['p_id_edit'])){ ?>
											<img src="<?php echo $e_pic ?>" class="img-thumbnail" style="width: 100px;height: 100px">
											<?php } ?>
										</div>
									</div>

									<hr class="mb-4">
									<?php if(!isset($_GET['p_id_edit'])){ ?>
									<button class="btn btn-primary btn-lg btn-block" type="submit">ثبت محصول</button>
									<?php }else{ ?>
										<button class="btn btn-primary btn-lg btn-block" type="submit">ویرایش محصول</button>
									<?php } ?>
								</form>

							</div>
						</div>
					</div>
				</div>

			</div>

		</div>
	</div>

<?php
require_once ("footer.php");
?>