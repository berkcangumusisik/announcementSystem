<?php session_start(); ?>
<?php
ob_start();
?>
<body class="hold-transition sidebar-mini layout-fixed">
  <?php

  include("data/sidebar.php");
  include("home.php");
  include("data/footer.php");

  ?>

</body>

</html>