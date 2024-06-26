<?php
session_start();
require_once('config.php');
require_once('./includes/function.php');
layouts('header-clients');
?>

<body>
   <div class="container">
      <div class="row">
         <div class="col-3 sidebar">
            <?php layouts('sidebar-clients'); ?>
         </div>
         <div class="col-9 content">
            <?php layouts('banner-clients'); ?>
            <?php layouts('content-clients'); ?>
         </div>
      </div>
   </div>

</body>

<?php
layouts('footer-clients');
?>