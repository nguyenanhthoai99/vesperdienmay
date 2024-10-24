<?php 

// kiểm tra trạng thái đăng nhập
if (!isLogin()) {
    redirect(_WEB_HOST . '/auth/login.php');
}
