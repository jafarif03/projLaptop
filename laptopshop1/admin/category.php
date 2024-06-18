<?php
require_once ("header.php");

if(isset($_GET['p_id_delete'])){
	$qur = "DELETE FROM category WHERE category_id=".$_GET['p_id_delete'];
	mysqli_query($conn,$qur);
}

$e_cat_edit = "";
if(isset($_GET['p_id_edit'])){
	$q = "SELECT * FROM category WHERE category_id=".$_GET['p_id_edit'];
	$re = mysqli_query($conn,$q);
	$ro = mysqli_fetch_assoc($re);
	$e_cat_edit = $ro['name'];
}

if(isset($_POST['cat_name'])){
	$cat_name = $_POST['cat_name'];

	if(isset($_GET['p_id_edit'])){
		$sql = "UPDATE category SET name='$cat_name' WHERE category_id =".$_GET['p_id_edit'];
	}else{
		$sql = "INSERT INTO category(`name`) VALUES ('$cat_name')";
	}
	if(mysqli_query($conn,$sql)){
		header("location: category.php");
	}

}


?>

	<div class="container-fluid">
		<div class="row">

			<main role="main" class="col-md-9 mr-sm-auto col-lg-10 pt-3 px-4">
				<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
					<h1 class="h2">محصولات</h1>
					<div class="btn-toolbar mb-2 mb-md-0">
					</div>
				</div>

				<div class="row">
					<div class="col-4">
						<h6 class="mb-4 d-inline-block">افزودن دسته بندی جدید </h6>

						<form action="" method="post">
							<input type="text" name="cat_name" placeholder="نام دسته" value="<?php echo $e_cat_edit ?>" class="form-control d-inline-block w-65">
							<?php if(!isset($_GET['p_id_edit'])){ ?>
							<button type="submit" class="btn btn-secondary">افزودن <i class="fal fa-plus align-middle"></i></button>
							<?php }else{ ?>
							<button type="submit" class="btn btn-secondary">ویرایش <i class="fal fa-edit align-middle"></i></button>
							<?php } ?>
						</form>

					</div>
					<div class="col-4">
						<h5 class="mb-4 text-center">همه ی دسته بندی ها</h5>
					</div>
				</div>


				<div class="table-responsive">
					<table class="table table-striped ">
						<thead>
						<tr>
							<th>#</th>
							<th>عنوان دسته</th>
							<th>مدیریت</th>
						</tr>
						</thead>
						<tbody>
						<?php
						$q = "SELECT * FROM category ORDER BY category_id DESC";
						$data = mysqli_query($conn,$q);


						$cnt = 0;
						while($row = mysqli_fetch_assoc($data)){
							$cnt ++;
							?>
							<tr>
								<td><?php  echo $cnt ?></td>
								<td><?php  echo $row['name'] ?></td>
								<td>
									<div class="text-center">
										<a href="?p_id_edit=<?php  echo $row['category_id'] ?>" style="color: green"><i class="fal fa-edit"></i></a>
										<a href="?p_id_delete=<?php  echo $row['category_id'] ?>" style="color: red"><i class="fal fa-trash-alt"></i></a>
									</div>
								</td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
			</main>


		</div>
	</div>

<?php
require_once ("footer.php");
?>