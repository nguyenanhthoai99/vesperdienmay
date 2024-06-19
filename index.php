<?php
session_start();
require_once('config.php');
require_once(_WEB_PATH_TEMPLATES . '/layouts/header-clients.php');
?>

<body>
   <div class="container">
      <div class="row">
         <div class="col-3 sidebar">
            <?php require_once(_WEB_PATH_TEMPLATES . '/layouts/sidebar-clients.php'); ?>
         </div>
         <div class="col-9 content">
            <?php require_once(_WEB_PATH_TEMPLATES . '/layouts/banner-clients.php'); ?>
            <?php require_once(_WEB_PATH_TEMPLATES . '/layouts/content-clients.php'); ?>
         </div>
      </div>
   </div>

</body>

<?php
//    require_once(_WEB_HOST_TEMPLATES. '/layouts/footer-clients.php');
require_once(_WEB_PATH_TEMPLATES . '/layouts/footer-clients.php');
?>