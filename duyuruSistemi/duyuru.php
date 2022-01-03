<?php
include("admin/data/vt.php");
include("data/navbar.php");
?>

<section class="bg-light">
    <div class="container py-4">
        <form role="form" id="quickForm" method="POST" action="#">

            <?php
            $sorgu = $conn->query("SELECT * FROM announcement WHERE ID =" . (int)$_GET['id']);
            $sonuc = $sorgu->fetch_assoc();

            ?>
            <div class="row align-items-center justify-content-between">
                <div class="contact-header col-lg-4">
                    <h1 class="h2 pb-3 text-primary"><?php echo $sonuc['announcementTitle']?></h1>
                    <p class="light-300">
                        <?php echo $sonuc['announcementDetails']?>
                    </p>

                    <h3 class="h4 regular-400">                        
                        <?php echo $sonuc['announcementDate']?>
                    </h3>

                </div>
                    <img src="admin/image/<?php echo  $sonuc['announcementImage'];?>"  height="800px">
            </div>
        </form>
    </div>
</section>

<?php include("data/footer.php"); ?>