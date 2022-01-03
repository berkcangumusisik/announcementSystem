<?php
include("data/vt.php");

?>
<?php
include("data/sidebar.php");
?>
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Ana Sayfa</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div clas="col-lg-12">
      <?php include("calendar.php"); ?>
    </div>
    <br><br />
    <div>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1196.5677973533213!2d32.81935908696326!3d39.940978836318514!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14d34ec53ec73c8f%3A0x6de303cd001b4b42!2sGazi%20E%C4%9Fitim%20Fak%C3%BCltesi!5e0!3m2!1str!2str!4v1640614275302!5m2!1str!2str" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
  </section>

</div>