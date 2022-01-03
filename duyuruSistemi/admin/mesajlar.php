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
                                    <th>İsim</th>
                                    <th>Soyisim</th>
                                    <th>Telefon Numarası</th>
                                    <th>Konu</th>
                                    <th>Mesaj</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php

                                $sorgu = $conn->query("SELECT * FROM contacts ORDER BY messageId ASC");
                                while ($sonuc = $sorgu->fetch_assoc()) {
                                    $id = $sonuc['messageId'];
                                    $name = $sonuc['name'];
                                    $surName = $sonuc['surname'];
                                    $phoneNumber = $sonuc['phoneNumber'];
                                    $subject = $sonuc['subject'];
                                    $message = $sonuc['message'];

                                ?>
                                    <tr>
                                        <td><?php echo $id;
                                            ?></td>
                                        <td><?php echo $name; ?></td>
                                        <td><?php echo $surName;?></td>
                                        <td><?php echo $phoneNumber;?></td>
                                        <td><?php echo $subject;?></td>
                                        <td><?php echo $message;?></td>
                                       
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