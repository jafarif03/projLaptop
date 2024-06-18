<?php
session_start();
require_once ('../config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="نمایشport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Bootstrap 4</title>
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/bootstrap-rtl.css">
	<link rel="stylesheet" href="../assets/css/style.css">
	<link rel="stylesheet" href="../assets/css/fontawesome.css">
</head>
<body>
<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
	<a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">پنل مدیریت</a>
	<input class="form-control form-control-dark w-100" type="text" placeholder="جستجو" aria-label="Search">
	<ul class="navbar-nav px-3">
		<li class="nav-item text-nowrap">
			<a class="nav-link" href="../logout.php">خروج</a>
		</li>
	</ul>
</nav>
<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">
                            <i class="fal fa-tachometer-slowest"></i>
                            داشبورد
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="products.php">
                            <i class="fal fa-list-alt"></i>
                            محصولات
                        </a>

                        <ul class="nav flex-column">
                            <li class="nav-item small">
                                <a class="nav-link" href="insert-product.php">
                                    <i class="fal fa-plus"></i>
                                    افزودن محصول
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="users.php">
                            <i class="fal fa-users"></i>
                            کاربران
                        </a>

                        <ul class="nav flex-column">
                            <li class="nav-item small">
                                <a class="nav-link" href="insert-user.php">
                                    <i class="fal fa-plus"></i>
                                    افزودن کاربر
                                </a>
                            </li>
                        </ul>

                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="category.php">
                            <i class="fal fa-clipboard-list-check"></i>
                            دسته بندی ها
                        </a>
                    </li>
                </ul>
            </div>
        </nav>


