<?php
include("data/vt.php");
?>

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
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="col-sm-6">
              <h1> Duyuru Düzenleme Sayfası</h1>
              <p style="color:red">* zorunlu alan</p>
            </div>
            <div class="card card-primary">
              <form role="form" enctype="multipart/form-data" id="quickForm" method="POST" action="#">
                <?php
                $sorgu = $conn->query("SELECT * FROM announcement WHERE ID =" . (int)$_GET['id']);
                $sonuc = $sorgu->fetch_assoc();
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
                    <input type="text" name="announcementTitle" class="form-control" value="<?php echo $sonuc['announcementTitle']; ?>">
                    <span class="error">* <?php echo $announcementTitleErr; ?></span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Duyuru Açıklaması</label>
                    <input name="announcementDetails" class="form-control" value="<?php echo $sonuc['announcementDetails']; ?>">
                    <span class="error">* <?php echo $announcementDetailsErr; ?></span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Dosya Yükleme alanı </label>
                    <input type="file" name="announcementImage" class="form-control" value="<?php echo $sonuc['announcementImage']; ?>">
                  </div>
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
                    $announcementImage = time() . '_' . rand(1000, 9999) . '.' . $imgExt;
                    move_uploaded_file($kaynak, "image/" . $announcementImage);
                    $announcementDate = date("Y-m-d");
                    if ($announcementTitle <> "" && $announcementDetails <> ""  && $announcementImage <> "") {
                      if ($conn->query("UPDATE announcement SET announcementTitle='$announcementTitle',announcementDetails='$announcementDetails',announcementImage='$announcementImage',announcementDate= '$announcementDate' WHERE ID =" . $_GET['id'])) {
                        echo '
                        <div class="alert alert-success" role="alert">
                          Duyuru başarılı bir şekilde güncellendi.
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </div>
                        ';
                      } else {
                        echo '
                    <div class="alert alert-danger" role="alert">
                      Duyuru güncellenirken bir hatayla karşılaşıldı. Tekrar deneyiniz.
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
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Güncelle</button>
                </div>
              </form>
            </div>
          </div>
          <div class="col-md-6">
          </div>
        </div>
      </div>
    </section>
  </div>
  </section>
  <?php
  include("data/footer.php");
  ?>
</body>

</html>