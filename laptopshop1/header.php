<?php
if (!isset($_SESSION)){
    session_start();
}

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

// insert to session for cart shop


if(isset($_GET['id_cart'])){
    $id = $_GET['id_cart'];
    if(isset($_SESSION['products'][$id])) {
        $_SESSION['products'][$id] +=1;
    }
    else {
        $_SESSION['products'][$id] = 1;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>فروشگاه لپ تاپ جعفری</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-rtl.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/fontawesome.css">
</head>
<body>
<div class="container">
    <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4 text-center">
                <a class="h1 blog-header-logo text-dark" href="index.php">فروشگاه لپ تاپ</a>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
                <div class="btn-group">
                    <?php
                    if(isset($_SESSION['email'])){ ?>
                        <a class="btn btn-sm btn-outline-info" href="admin/index.php">پنل مدیریت</a>
                        <a class="btn btn-sm btn-outline-info" href="logout.php">خروج</a>
                    <?php }else{ ?>
                        <a class="btn btn-sm btn-outline-info" href="register.php">عضویت</a>
                        <button class="btn btn-sm btn-outline-info" data-toggle="modal" data-target="#login-modal">ورود</button>
                    <?php } ?>
                </div>
            </div>
        </div>
    </header>

    <!-- login modal	-->
    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ورود به حساب کاربری</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin: -1rem">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">ایمیل :</label>
                            <input type="text" name="email" class="form-control" id="recipient-name" placeholder="ایمیل خود را وارد کنید">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">رمز عبور :</label>
                            <input type="password" name="password" class="form-control" id="recipient-name" placeholder="رمز عبور خود را وارد کنید">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="btn-group">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>
                            <button type="submit" class="btn btn-primary">ورود</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- end login modal	-->
    <div class="row mt-3 mb-2 py-1">
        <div class="col-11">
            <div class="nav-scroller" >
                <nav class="nav d-flex">

                    <a class="p-2 text-muted hov-nav" href="index.php"> <i class="fal fa-home-lg"></i> صفحه اصلی</a>
                    <?php
                    $q = "SELECT * FROM category ORDER BY category_id DESC LIMIT 8";
                    $data = mysqli_query($conn,$q);

                    while($row_cat = mysqli_fetch_assoc($data)){
                        ?>
                        <a class="p-2 text-muted hov-nav" href="index.php?cat_id=<?php echo $row_cat['category_id'] ?>"> <?php echo $row_cat['name'] ?></a>
                    <?php } ?>

                </nav>
            </div>
        </div>
        <div class="col-1 pt-1">
            <?php
            if(str_replace('.php','',ltrim($_SERVER["SCRIPT_NAME"],'/')) !== 'mobl-shop/cart'){
            ?>
              <a href="cart.php" class="btn btn-info">سبد خرید <i class="badge badge-light"><?php echo isset($_SESSION['products']) ? count($_SESSION['products']) :0 ?></i> </a>
            <?php
            }
            ?>

        </div>
    </div>



</div>

