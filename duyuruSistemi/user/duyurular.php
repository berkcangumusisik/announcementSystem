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
                        <h1>Duyurular</h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <table id="duyuru" class="table table-striped table-bordered">
                            <colgroup>
                                <col width="10%">
                                <col width="20%">
                                <col width="20%">
                                <col width="30%">

                            </colgroup>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Duyuru Başlığı</th>
                                    <th>Duyuru İçeriği</th>
                                    <th>Duyuru Tarihi</th>
                                    <th>Duyuru Fotoğrafı</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php

                                $sorgu = $conn->query("SELECT * FROM announcement ORDER BY ID ASC");
                                while ($sonuc = $sorgu->fetch_assoc()) {
                                    $id = $sonuc['ID'];
                                    $announcementTitle = $sonuc['announcementTitle'];
                                    $announcementDetails = $sonuc['announcementDetails'];
                                    $announcementDate = $sonuc['announcementDate'];
                                    $announcementImage = $sonuc['announcementImage'];
                                ?>
                                    <tr>
                                        <td><?php echo $id;
                                            ?></td>
                                        <td><?php echo $announcementTitle; ?></td>
                                        <td><?php
                                            if (strlen($announcementDetails)) {
                                                echo substr($announcementDetails, 0, 20) . "...";
                                            } else {
                                                echo $announcementDetails;
                                            } ?></td>
                                        <td><?php echo date("Y-m-d") ?></td>
                                            <td><img src="../admin/image/<?php echo $announcementImage;?>" width="70px"></td>
                                        <td><a href="duzenle.php?id=<?php echo $id; ?>" class="btn btn-outline-warning">Düzenle</a></td>
                                        <td><a href="sil.php?id=<?php echo $id; ?>" class="btn btn-outline-danger" id="deleteBtn">Sil</a></td>
                                    </tr>
                                    <?php }?>
                            </tbody>
                          </table>
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
    <script>
        $(function() {
            $('#duyuru').DataTable({
                "aLengthMenu": [[4, 8, 12, -1], [4, 8, 12, "Hepsi"]],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Turkish.json"
                }
            });
        });
    </script>
</body>

</html>