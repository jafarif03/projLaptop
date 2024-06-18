<?php
require_once ("header.php");
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
						<a href="insert-user.php">
							<i class="fal fa-plus align-middle"></i>
						</a>
					</div>
					<div class="col-4">
						<h5 class="mb-4 text-center">همه ی کاربران</h5>
					</div>
				</div>
				<div class="table-responsive">
					<table class="table table-striped ">
						<thead>
						<tr>
							<th>#</th>
							<th>نام</th>
							<th>نام خانوادگی</th>
							<th>ایمیل</th>
							<th>آدرس</th>
							<th>مدیریت</th>
						</tr>
						</thead>
						<tbody>
						<?php
						$q = "SELECT * FROM user ORDER BY user_id DESC";
						$data = mysqli_query($conn,$q);
						$cnt = 0;
						while($row = mysqli_fetch_assoc($data)){
							$cnt ++;
							?>
						<tr>
							<td><?php  echo $cnt ?></td>
							<td><?php  echo $row['firstname'] ?></td>
							<td><?php  echo $row['lastname'] ?></td>
							<td><?php  echo $row['email'] ?></td>
							<td><?php  echo $row['address'] ?></td>
							<td>
								<div class="text-center">
									<a href="#" style="color: red"><i class="fal fa-trash-alt"></i></a>
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