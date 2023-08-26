<!DOCTYPE html>
<html lang="en">
    <style>
body{
    background-image: url("img/background.jpg");
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: 100% 100%;
}
    </style>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/register.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <title>Đăng kí</title>
</head>
<body>
    <div id="wrapper">
        <form action="" id="form-login">
            <h1 class="form-heading">Đăng kí</h1>
            <div class="form-group">
                <i class="far fa-user"></i>
                <input type="text" class="form-input" placeholder="Tên đăng nhập">
            </div>
            <div class="form-group">
                <i class="fas fa-key"></i>
                <input type="password" class="form-input" placeholder="Mật khẩu">
                <div id="eye">
                    <i class="far fa-eye"></i>
                </div>
            </div>
            <div class="form-group">
                <i class="fas fa-comment"></i>
                <input type="abcd@gmail.com" class="form-input" placeholder="Email">
            </div>
            <input type="submit" value="Đăng nhập" class="form-submit">
        </form>
    </div>
    <div class="box">
        <font color="white" size="4.5">
        <p><strong><a href="fe_home.php">Trở về</a></strong></p>
        </font>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="js/app.js"></script>

</html>