<?php
include("admin/data/vt.php");
include("data/navbar.php");
?>
<div class="banner-wrapper bg-light">
    <div id="index_banner" class="banner-vertical-center-index container-fluid pt-5">

        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">

            <div class="carousel-inner">
                <div class="carousel-item active">

                    <div class="py-5 row d-flex align-items-center">
                        <div class="banner-content col-lg-8 col-8 offset-2 m-lg-auto text-left py-5 pb-5">
                            <h1 class="banner-heading h1 text-secondary display-3 mb-0 pb-5 mx-0 px-0 light-300 typo-space-line">
                                Sitemize<strong> Hoş Geldin </strong>
                            </h1>
                            <p class="banner-body text-muted py-3 mx-0 px-0">
                                Şirket hakkında bütün duyurulardan haber almak istiyorsan sitemize kayıt olmayı unutmayın. Eğer hesabınız varsa giriş yap butonuna tıklayınız.
                            </p>
                            <a class="banner-button btn rounded-pill btn-outline-primary btn-lg px-4" href="girisyap.php" role="button">Giriş Yap</a>
                            <a class="banner-button btn rounded-pill btn-outline-primary btn-lg px-4" href="kayitol.php" role="button">Kayıt Ol</a>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

<section class="service-wrapper py-3">
    <div class="container-fluid pb-3">
        <div class="row">
            <div class="service-header col-2 col-lg-3 text-end light-300">
                <i class='bx bx-gift h3 mt-1'></i>
            </div>
            <div class="service-heading col-10 col-lg-9 text-start float-end light-300">
                <h2 class="h3 pb-4 typo-space-line">Sitemizde Neler Var?</h2>
            </div>
        </div>
        <p class="service-footer col-10 offset-2 col-lg-9 offset-lg-3 text-start pb-3 text-muted px-2">
            Sitemize kayıt olarak duyuru ekleme,silme güncelleme işlemi yapabilirsiniz. Ayrıca kayıt olduktan sonra bilgilerinize
            ulaşabilir ve güncelleme işlemi gerçekleştirebilirsiniz. İletişim sayfasından bizimle her an iletişimde kalabilirsiniz.
            Duyur.io ekibi olarak şirketimiz hakkında duyurulardan haberdar olmanız için sizi de aramızda görmek isteriz.
        </p>
    </div>

    <div class="service-tag py-5 bg-secondary">
        <div class="col-md-12">
            <ul class="nav d-flex justify-content-center">
                <li class="nav-item ">
                    <a class="filter-btn nav-link btn-outline-primary active shadow rounded-pill text-light px-4 light-300" href="#" data-filter=".project">Duyurular</a>
                </li>

            </ul>
        </div>
    </div>

</section>

<section class="container overflow-hidden py-5">

    <div class="row gx-5 gx-sm-3 gx-lg-5 gy-lg-5 gy-3 pb-3 projects">
        <?php

        $sorgu = $conn->query("SELECT * FROM announcement ORDER BY ID ASC");
        while ($sonuc = $sorgu->fetch_assoc()) {
            $id = $sonuc['ID'];
            $announcementTitle = $sonuc['announcementTitle'];
            $announcementDetails = $sonuc['announcementDetails'];
            $announcementDate = $sonuc['announcementDate'];
            $announcementImage = $sonuc['announcementImage'];
        ?>
            <div style="float:left;" class=" col-md-4 col-sm-6 project ui branding h-200">
                <a href="duyuru.php?id=<?php echo $id;?>" class="service-work card border-0 text-white shadow-sm overflow-hidden mx-5 m-sm-0">
                    <img class="service card-img" src="admin/image/<?php echo $announcementImage; ?>" width="200px" alt="Card image">
                    <div class="service-work-vertical card-img-overlay d-flex align-items-end">
                        <div class="service-work-content text-left text-light">
                            <span class="btn btn-outline-light rounded-pill mb-lg-3 px-lg-4 light-300"><?php echo $announcementTitle; ?></span>
                            <p class="card-text"><?php echo $announcementDetails; ?>
                            </p>
                        </div>

                    </div>
                </a>

            </div>
        <?php } ?>

    </div>

</section>

<?php include("data/footer.php"); ?>