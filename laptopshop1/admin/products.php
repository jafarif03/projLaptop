<?php
require_once ("header.php");

if(isset($_GET['p_id_delete'])){
	$qur = "DELETE FROM products WHERE product_id=".$_GET['p_id_delete'];
	mysqli_query($conn,$qur);
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
						<h6 class="mb-4 d-inline-block">افزودن جدید </h6>
						<a href="insert-product.php">
							<i class="fal fa-plus align-middle"></i>
						</a>
					</div>
					<div class="col-4">
						<h5 class="mb-4 text-center">همه ی محصولات</h5>
					</div>
				</div>


				<div class="table-responsive">
					<table class="table table-striped ">
						<thead>
						<tr>
							<th>#</th>
							<th>عنوان</th>
							<th>توضیحات</th>
							<th>دسته بندی</th>
							<th>قیمت</th>
							<th>تخفیف</th>
							<th>مدیریت</th>
						</tr>
						</thead>
						<tbody>
						<?php
						$q = "SELECT * FROM products ORDER BY product_id DESC";
						$data = mysqli_query($conn,$q);
						$cnt = 0;
						while($row = mysqli_fetch_assoc($data)){
							$cnt ++;
						?>
						<tr>
							<td><?php  echo $cnt ?></td>
							<td><?php  echo $row['title'] ?></td>
							<td><p class="ellipse-text"><?php  echo $row['description'] ?></p></td>
							<td>
								<?php
								$q2 = "SELECT * FROM category WHERE category_id=".$row['category_id'];
								$res = mysqli_query($conn,$q2);
								$r = mysqli_fetch_assoc($res);
								echo $r['name'];
								?>
							</td>
							<td><?php  echo number_format($row['price']) ?></td>
							<td><?php  echo $row['discount'] ?> %</td>
							<td>
								<div class="text-center">
									<a href="insert-product.php?p_id_edit=<?php  echo $row['product_id'] ?>" style="color: green"><i class="fal fa-edit"></i></a>
									<a href="?p_id_delete=<?php  echo $row['product_id'] ?>" style="color: red"><i class="fal fa-trash-alt"></i></a>
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