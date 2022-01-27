<?php
include("data/vt.php");
?>


<!doctype html>
<html lang="en">

<head>
    <title>Login 09</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="plugins/loginform/css/style.css">

</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Admin Paneli</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap py-5">
                        <div class="img d-flex align-items-center justify-content-center" style="background-image: url(plugins/loginform/images/bg.jpg);"></div>
                        <h3 class="text-center mb-0">Tekrar Hoş Geldin</h3>

                        <form action="index.php" class="POST" id="login-form">
                            
                            <div class="form-group">
                                <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-user"></span></div>
                                <input type="email" class="form-control" name="adminMail" placeholder="Mail adresinizi giriniz" required>
                            </div>
                            <div class="form-group">
                                <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-lock"></span></div>
                                <input type="password" class="form-control" name="adminPassword" placeholder="Şifrenizi giriniz" required>
                            </div>
                            <div class="form-group d-md-flex">
                                <div class="w-100 text-md-right">
                                </div>
                            </div>
                            <div class="form-group">

                                <button type="submit" class="btn form-control btn-primary rounded submit px-3">Giriş Yap</button>
                                
                            </div>
                        </form>
                        <div class="w-100 text-center mt-4 text">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="plugins/loginform/js/jquery.min.js"></script>
    <script src="plugins/loginform/js/popper.js"></script>
    <script src="plugins/loginform/js/bootstrap.min.js"></script>
    <script src="plugins/loginform/js/main.js"></script>


</body>

</html>