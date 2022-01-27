<?php session_start();
ob_start();
?>
<?php 
if ($_GET) 
{
    include("data/vt.php"); 
    if ($conn->query("DELETE FROM announcement WHERE ID =".(int)$_GET['id']))
    {
        header("location:duyurular.php"); 
    }
}
?>