<?php session_start();
include("admin/data/vt.php");
include("data/navbar.php");
?>

<section class="container py-5">

    <h1 style="text-align:center;" class="col-12 col-xl-8 h2 text-left text-primary pt-3"> Kullanıcı Giriş Sayfası<h1>
            <h2 class="col-12 col-xl-8 h4 text-left regular-400"> </h2>
            <p class="col-12 col-xl-8 text-left text-muted pb-5 light-300">

            </p>

            <div class="row pb-4">
                
                <div class="col-lg-8 mx-auto">
                    <form class="contact-form row" method="post" action="islem.php" role="form">

                        <div class="col-12 mb-4">
                            <div class="form-floating">
                                <input type="text" name="userName" class="form-control form-control-lg light-300" id="floatingphoneNumber" name="inputphoneNumber" placeholder="phoneNumber">
                                <label for="floatingphoneNumber light-300">Kullanıcı Adı</label>

                            </div>
                        </div>

                        <div class="col-12 mb-4">
                            <div class="form-floating">
                                <input type="password" name="password" class="form-control form-control-lg light-300" id="floatingphone" name="inputphone" placeholder="Phone">
                                <label for="floatingphone light-300">Şifre</label>
                            </div>
                        </div>
                        <div class="col-md-12 col-12 m-auto text-end">
                            <button type="submit" class="btn btn-secondary rounded-pill px-md-5 px-4 py-2 radius-0 text-light light-300">Kayıt Ol</button>
                        </div>

                    </form>
                </div>


            </div>
</section>
<?php include("data/footer.php"); ?>