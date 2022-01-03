<?php
include("data/vt.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .error {
            color: #FF0000;
        }
    </style>
</head>

<body>

    <?php
    include("data/sidebar.php");
    ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Yeni Kullanıcı Ekleme Sayfası</h1>
                        <p style="color:red">* zorunlu alan</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <form role="form" id="quickForm" method="post" action="#">
                                <?php
                                $userNameErr = $fullNameErr = $emailErr = $passwordErr = "";
                                $userName = $fullName = $email = $password = "";

                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                    if (empty($_POST["userName"])) {
                                        $userNameErr = "Kullanıcı Adı Zorunlu Alandır";
                                    } else {
                                        $userName = test_input($_POST["userName"]);
                                    }

                                    if (empty($_POST["fullName"])) {
                                        $fullNameErr =  "İsim Soyisim  Zorunlu Alandır";
                                    } else {
                                        $fullName = test_input($_POST["fullName"]);
                                    }

                                    if (empty($_POST["email"])) {
                                        $emailErr = "Email Zorunlu Alandır";
                                    } else {
                                        $email = test_input($_POST["email"]);
                                    }
                                    if (empty($_POST["password"])) {
                                        $passwordErr = "Şifre Zorunlu Alandır";
                                    } else {
                                        $password = test_input($_POST["password"]);
                                    }
                                }
                                $createDate = date("Y-m-d");

                                ?>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Kullanıcı Adı</label>
                                        <input type="text" name="userName" class="form-control" id="exampleInputEmail1" placeholder="Kullanıcı Adınızı Giriniz...">
                                        <span class="error">* <?php echo $userNameErr; ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">İsim Soyisim</label>
                                        <input type="text" name="fullName" class="form-control" id="exampleInputPassword1" placeholder="İsim Soyisminizi Giriniz...">
                                        <span class="error">* <?php echo $fullNameErr; ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email </label>
                                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email Adresinizi Giriniz...">
                                        <span class="error">* <?php echo $emailErr; ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Şifre</label>
                                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Şifrenizi Giriniz...">
                                        <span class="error">* <?php echo $passwordErr; ?></span>
                                    </div>

                                    <div class="card-footer col-12">
                                        <button type="submit" class="btn btn-outline-success col-12" id="ekleBtn">Kullanıcı Ekle</button>
                                    </div>
                            </form>
                            <?php

                            if ($_POST) {




                                if ($userName <> "" && $fullName <> ""  && $email <> "" && $password <> "") {
                                    if ($conn->query("INSERT INTO users(userName,fullName, email,password,  createDate) VALUES ('$userName','$fullName','$email','$password','$createDate')")) {
                                        echo '
                        <div class="alert alert-success" role="alert">
                          Kullanıcı başarılı bir şekilde eklendi.
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </div>
                        ';
                                    } else {
                                        echo '
                    <div class="alert alert-danger" role="alert">
                      Kullanıcı eklenirken bir hatayla karşılaşıldı. Tekrar deneyiniz.
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </div>
                    ';
                                    }
                                }
                            }

                            function test_input($data)
                            {
                                $data = trim($data);
                                $data = stripslashes($data);
                                $data = htmlspecialchars($data);
                                return $data;
                            }

                            ?>


                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    </section>
    <?php
    include("data/footer.php");
    ?>

</body>

</html>