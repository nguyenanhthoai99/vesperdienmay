<!-- Những hàm lên quan đến hàm session và cookie    -->
<?php
// Kiểm tra quyền truy cập
if (!defined('_CODE')) {
    die('<h1>Trang không tồi tại hoặc bạn không có quyền truy cập trang này</h1>');
}

//Hàm gán Session
function setSession($key, $value)
{
    return $_SESSION[$key] = $value;
}

// Hàm đọc Session
function getSession($key = '')
{
    if (empty($key)) {
        return $_SESSION;
    } else {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }
    }
}

// Hàm xóa Session
function removeSession($key = '')
{
    if (empty($key)) {
        session_destroy();
        return true;
    } else {
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
            return true;
        }
    }
}


// Hàm Gán Session vào Flash data 
function setFlashData($key, $value){
    $key = 'flash_' . $key;
    return setSession($key, $value);
}

// hàm đọc falsh data và xóa session
function getFlashData($key){
    $key = 'flash_' . $key;
    $data = getSession($key);
    removeSession($key);
    return $data;
}