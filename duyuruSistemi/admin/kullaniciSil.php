<?php session_start(); ?>

<?php 
if ($_GET) 
{
    include("data/vt.php"); 
    if ($conn->query("DELETE FROM users WHERE userId =".(int)$_GET['id']))
    {
        header("location:kullanicilar.php"); 
    }
}
?>