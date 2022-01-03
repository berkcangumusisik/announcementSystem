<?php
include("data/vt.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Yeni Duyuru Ekle</title>
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="plugins/iziToast/iziToast.min.css">

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
            <h1>Yeni Duyuru Ekleme Sayfası</h1>
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
              <form role="form" enctype="multipart/form-data" id="quickForm" method="post" action="#">
                <?php
                error_reporting(0);
                $announcementTitleErr = $announcementDetailsErr = "";
                $announcementTitle = $announcementDetails = $announcementImage = "";

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                  if (empty($_POST["announcementTitle"])) {
                    $announcementTitleErr = "Başlık Zorunlu Alandır";
                  } else {
                    $announcementTitle = test_input($_POST["announcementTitle"]);
                  }

                  if (empty($_POST["announcementDetails"])) {
                    $announcementDetailsErr = "İçerik Zorunlu Alandır";
                  } else {
                    $announcementDetails = test_input($_POST["announcementDetails"]);
                  }

                  if (empty($_POST["announcementImage"])) {
                    $announcementImage = "";
                  } else {
                    $announcementImage = test_input($_POST["announcementImage"]);
                  }
                }


                ?>
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Duyurunun Başlığı</label>
                    <input type="text" name="announcementTitle" class="form-control" id="exampleInputEmail1" placeholder="Duyuru Başlığını Giriniz...">
                    <span class="error">* <?php echo $announcementTitleErr; ?></span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Duyuru Açıklaması</label>
                    <textarea type="password" name="announcementDetails" class="form-control" id="exampleInputPassword1" placeholder="Duyuru Açıklamasını Giriniz..."></textarea>
                    <span class="error">* <?php echo $announcementDetailsErr; ?></span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Dosya Yükleme alanı </label>
                    <input type="file" name="announcementImage" class="form-control" id="exampleInputEmail1" placeholder="Duyuru Başlığını Giriniz...">
                  </div>
                </div>
                <div class="card-footer col-12">
                  <button type="submit" class="btn btn-outline-success col-12" id="ekleBtn">Duyuru Ekle</button>
                </div>
              </form>
              <?php

              if ($_POST) {

                $announcementTitle = $_POST['announcementTitle'];
                $announcementDetails = $_POST['announcementDetails'];
                $kaynak = $_FILES["announcementImage"]["tmp_name"];
                $ad =  $_FILES["announcementImage"]["name"];
                $tip = $_FILES["announcementImage"]["type"];
                $boyut = $_FILES["announcementImage"]["size"];
                $imgExt = strtolower(pathinfo($ad, PATHINFO_EXTENSION));
			          $allowExt  = array('jpeg', 'jpg', 'png', 'gif');
			          $announcementImage = time().'_'.rand(1000,9999).'.'.$imgExt;
                move_uploaded_file($kaynak,"../admin/image/".$announcementImage);
                $announcementDate = date("Y-m-d");

                if ($announcementTitle <> "" && $announcementDetails <> ""  && $announcementImage <> "") {
                  if ($conn->query("INSERT INTO announcement(announcementTitle, announcementDetails, announcementImage, announcementDate ) VALUES ('$announcementTitle','$announcementDetails','$announcementImage','$announcementDate')")) {
                    echo '
                        <div class="alert alert-success" role="alert">
                          Duyuru başarılı bir şekilde eklendi.
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </div>
                        ';
                  } else {
                    echo '
                    <div class="alert alert-danger" role="alert">
                      Duyuru eklenirken bir hatayla karşılaşıldı. Tekrar deneyiniz.
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