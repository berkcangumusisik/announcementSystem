<?php session_start(); ?>
<?php
include("data/vt.php");
if (isset($_POST["adminMail"]) && isset($_POST["adminPassword"])) {
    $email = $_POST["adminMail"];
    $password = $_POST["adminPassword"];
    $kullaniciSor = $conn->query("SELECT * FROM admins WHERE adminMail = '$adminMail' AND adminPassword ='$adminPassword'");
    $array =mysqli_fetch_assoc($kullaniciSor);

    if ($array["adminMail"] == $email && $array["adminPassword"] ==$password) {
        $_SESSION["email"] = $email;
        $_SESSION["sifre"] = $password;
        header("location:index.php");
    } else {
        header("location:login.php");
    }
}
?>