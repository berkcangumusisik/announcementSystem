<?php
include("admin/data/vt.php");
include("data/navbar.php");
?>

<head>
    <style>
        .error {
            color: #7A7DED;
        }
    </style>
</head>
<section class="bg-light">
    <div class="container py-4">
        <div class="row align-items-center justify-content-between">
            <div class="contact-header col-lg-4">
                <h1 class="h2 pb-3 text-primary">İletişim</h1>
                <h3 class="h4 regular-400">Biz iletişime her zaman açık bir ekibiz</h3>
                <p class="light-300">
                    Sorunlarınıza çözüm bulmak için iletişim formunu doldurarak bizimle her zaman iletişim içerisinde olabilirsiniz.
                </p>
            </div>
            <div class="contact-img col-lg-5 align-items-end col-md-4">
                <img src="./assets/img/banner-img-01.svg">
            </div>
        </div>
    </div>
</section>
<section class="container py-5">

    <h1 class="col-12 col-xl-8 h2 text-left text-primary pt-3">Hep Birlikte En İyiye<h1>
            <h2 class="col-12 col-xl-8 h4 text-left regular-400"> </h2>
            <p class="col-12 col-xl-8 text-left text-muted pb-5 light-300">

            </p>

            <div class="row pb-4">
                <div class="col-lg-4">

                    <div class="contact row mb-4">
                        <div class="contact-icon col-lg-3 col-3">
                            <div class="py-3 mb-2 text-center border rounded text-secondary">
                                <i class='display-6 bx bx-news'></i>
                            </div>
                        </div>
                        <ul class="contact-info list-unstyled col-lg-9 col-9  light-300">
                            <li class="h5 mb-0">Siteyi Hazırlayan</li>
                            <li class="text-muted">Berkcan Gümüşışık</li>
                            <li class="text-muted">0541 1234 56 36</li>
                        </ul>
                    </div>


                </div>

                <div class="col-lg-8 ">
                    <form class="contact-form row" method="post" action="#" role="form">
                        <?php
                        $nameErr = $surnameErr = $phoneNumberErr = $subjectErr = $messageErr = "";
                        $name = $surname = $phoneNumber = $subject = $message = "";

                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            if (empty($_POST["name"])) {
                                $nameErr = "İsim Zorunlu Alandır";
                            } else {
                                $name = test_input($_POST["name"]);
                            }

                            if (empty($_POST["surname"])) {
                                $surnameErr =  "Soyisim  Zorunlu Alandır";
                            } else {
                                $surname = test_input($_POST["surname"]);
                            }

                            if (empty($_POST["phoneNumber"])) {
                                $phoneNumberErr = "Telefon Numarası Zorunlu Alandır";
                            } else {
                                $phoneNumber = test_input($_POST["phoneNumber"]);
                            }
                            if (empty($_POST["subject"])) {
                                $subjectErr = "Konu Zorunlu Alandır";
                            } else {
                                $subject = test_input($_POST["subject"]);
                            }
                            if (empty($_POST["message"])) {
                                $messageErr = "Mesaj Zorunlu Alandır";
                            } else {
                                $message = test_input($_POST["message"]);
                            }
                        }
                        $createDate = date("Y-m-d");
                        ?>
                        <div class="col-lg-6 mb-4">
                            <div class="form-floating">
                                <input type="text" name="name" class="form-control form-control-lg light-300" id="floatingname" name="inputname" placeholder="Name">
                                <label for="floatingname light-300">İsim</label>
                                <span class="error">* <?php echo $nameErr; ?></span>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <div class="form-floating">
                                <input type="text" name="surname" class="form-control form-control-lg light-300" id="floatingphoneNumber" name="inputphoneNumber" placeholder="phoneNumber">
                                <label for="floatingphoneNumber light-300">Soyisim</label>
                                <span class="error">* <?php echo $surnameErr; ?></span>

                            </div>
                        </div>

                        <div class="col-12 mb-4">
                            <div class="form-floating">
                                <input type="text" name="phoneNumber" class="form-control form-control-lg light-300" id="floatingphone" name="inputphone" placeholder="Phone">
                                <label for="floatingphone light-300">Telefon</label>
                                <span class="error">* <?php echo $phoneNumberErr; ?></span>
                            </div>
                        </div>



                        <div class="col-12">
                            <div class="form-floating mb-4">
                                <input type="text" name="subject" class="form-control form-control-lg light-300" id="floatingsubject" name="inputsubject" placeholder="Subject">
                                <label for="floatingsubject light-300">Konu</label>
                                <span class="error">* <?php echo $subjectErr; ?></span>

                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-floating mb-3">
                                <textarea class="form-control light-300" name="message" rows="8" placeholder="Message" id="floatingtextarea"></textarea>
                                <label for="floatingtextarea light-300">Mesaj</label>
                                <span class="error">* <?php echo $messageErr; ?></span>

                            </div>
                        </div>
                        <?php

                        if ($_POST) {




                            if ($name <> "" && $surname <> ""  && $phoneNumber <> "" && $subject <> "" && $message <> "") {
                                if ($conn->query("INSERT INTO contacts(name, surname, phoneNumber, subject, message, createDate) VALUES ('$name','$surname','$phoneNumber','$subject','$message','$createDate')")) {
                                    echo '
                                    <div class="alert alert-success" role="alert">
                                    Mesajınız başarılı bir şekilde gönderildi.</div>
                                    ';
                                } else {
                                    echo '
                                    <div class="alert alert-danger" role="alert">
                                    Mesajınızı eklenirken bir hatayla karşılaşıldı. Tekrar deneyiniz.
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
                            <button type="submit" class="btn btn-secondary rounded-pill px-md-5 px-4 py-2 radius-0 text-light light-300">Gönder</button>
                        </div>

                    </form>
                </div>


            </div>
</section>
<?php include("data/footer.php"); ?>