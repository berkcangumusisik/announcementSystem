<?php session_start(); ?>
<?php
include("user/data/vt.php");
if (isset($_POST["userName"]) && isset($_POST["password"])) {
    $userName = $_POST["userName"];
    $password = $_POST["password"];
    $kullaniciSor = $conn->query("SELECT * FROM users WHERE userName = '$userName' AND password ='$password'");
    $array =mysqli_fetch_assoc($kullaniciSor);

    if ($array["userName"] == $userName && $array["password"] ==$password) {
        $_SESSION["girisBelgesi"] = $userName;
        $_SESSION["sifre"] = $password;
        header("location:user/index.php");
    } else {
        header("location:girisyap.php");
    }
}
?>