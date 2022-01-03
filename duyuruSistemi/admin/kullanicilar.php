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
                        <h1>Kullanıcılar</h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <table id="duyuru" class="table table-striped table-bordered">

                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kullanıcı Adı</th>
                                    <th>İsim Soyisim</th>
                                    <th>Email</th>
                                    <th>Oluşturulma Tarihi</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php

                                $sorgu = $conn->query("SELECT * FROM users ORDER BY userId ASC");
                                while ($sonuc = $sorgu->fetch_assoc()) {
                                    $id = $sonuc['userId'];
                                    $userName = $sonuc['userName'];
                                    $fullName = $sonuc['fullName'];
                                    $email = $sonuc['email'];
                                    $createDate = $sonuc['createDate'];
                                ?>
                                    <tr>
                                        <td><?php echo $id;
                                            ?></td>
                                        <td><?php echo $userName; ?></td>
                                        <td><?php echo $fullName?></td>
                                        <td><?php echo $email?></td>
                                        <td><?php echo date("Y-m-d") ?></td>
                                        <td><a href="kullaniciDuzenle.php?id=<?php echo $id; ?>" class="btn btn-outline-warning">Düzenle</a></td>
                                        <td><a href="kullaniciSil.php?id=<?php echo $id; ?>" class="btn btn-outline-danger" id="deleteBtn">Sil</a></td>
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