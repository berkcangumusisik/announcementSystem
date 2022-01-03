<?php include("admin/data/vt.php");
include("data/navbar.php");
?>

<section class="container py-5">

    <h1 style="text-align:center;" class="col-12 col-xl-8 h2 text-left text-primary pt-3"> Kullanıcı Kayıt Sayfası<h1>
            <h2 class="col-12 col-xl-8 h4 text-left regular-400"> </h2>
            <p class="col-12 col-xl-8 text-left text-muted pb-5 light-300">

            </p>

            <div class="row pb-4">
                
                <div class="col-lg-8 mx-auto">
                    <form class="contact-form row" method="post" action="#" role="form">
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
                        <div class="col-lg-6 mb-4">
                            <div class="form-floating">
                                <input type="text" name="userName" class="form-control form-control-lg light-300" id="floatingname" name="inputname" placeholder="Name">
                                <label for="floatingname light-300">Kullanıcı Adı</label>
                                <span class="error">* <?php echo $userNameErr; ?></span>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <div class="form-floating">
                                <input type="text" name="fullName" class="form-control form-control-lg light-300" id="floatingphoneNumber" name="inputphoneNumber" placeholder="phoneNumber">
                                <label for="floatingphoneNumber light-300">İsim Soyisim</label>
                                <span class="error">* <?php echo $fullNameErr; ?></span>

                            </div>
                        </div>

                        <div class="col-12 mb-4">
                            <div class="form-floating">
                                <input type="email" name="email" class="form-control form-control-lg light-300" id="floatingphone" name="inputphone" placeholder="Phone">
                                <label for="floatingphone light-300">Email</label>
                                <span class="error">* <?php echo $emailErr; ?></span>
                            </div>
                        </div>



                        <div class="col-12">
                            <div class="form-floating mb-4">
                                <input type="text" name="password" class="form-control form-control-lg light-300" id="floatingsubject" name="inputsubject" placeholder="Subject">
                                <label for="floatingsubject light-300">Şifre</label>
                                <span class="error">* <?php echo $passwordErr; ?></span>

                            </div>
                        </div>

                        <?php

                        if ($_POST) {
                            if ($userName <> "" && $fullName <> ""  && $email <> "" && $password <> "") {
                                if ($conn->query("INSERT INTO users(userName,fullName, email,password,  createDate) VALUES ('$userName','$fullName','$email','$password','$createDate')")) {
                                    echo '
                                                <div class="alert alert-success" role="alert">
                                                  Kayıt Başarılı.Giriş Yapabilirsiniz.
                                                  
                                                </div>
                                                ';
                                } else {
                                    echo '
                                            <div class="alert alert-danger" role="alert">
                                              Kayıt Başarısız. Tekrar Deneyiniz.
                                            
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

                        <div class="col-md-12 col-12 m-auto text-end">
                            <button type="submit" class="btn btn-secondary rounded-pill px-md-5 px-4 py-2 radius-0 text-light light-300">Kayıt Ol</button>
                        </div>

                    </form>
                </div>


            </div>
</section>
<?php include("data/footer.php"); ?>