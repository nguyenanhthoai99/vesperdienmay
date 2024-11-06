<!-- Các hàm trong của project -->
<?php

// hàm kiểm tra đường dẫn path (layout) có tồn tại không , tiêu đề của từng trang
function layouts($layoutName = 'header', $data = [])
{
    if (file_exists(_WEB_PATH_TEMPLATES . '/layouts/' . $layoutName . '.php')) {
        require_once(_WEB_PATH_TEMPLATES . '/layouts/' . $layoutName . '.php');
    }
}

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Hàm gửi Email
function sendMail($to, $subject, $content)
{
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username = 'nathoaid20008@cusc.ctu.edu.vn';
        $mail->Password = 'vulrirxmsfeldqez';                              //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        $mail->CharSet = "UTF-8";

        //Recipients
        $mail->setFrom('nguyenanhthoai99@ggmail.com', 'Thoai');
        $mail->addAddress($to);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $content;

        $sendEmail =  $mail->send();
        if ($sendEmail) {
            return $sendEmail;
        }
    } catch (Exception $e) {
        echo "Gửi mail thất bại. Mailer Error: {$mail->ErrorInfo}";
    }
}

// Kiểm tra phương thức get
function isGet()
{
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        return true;
    }
    return false;
}

// Kiểm tra phương thức post
function isPost()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        return true;
    }
    return false;
}

//hàm filter hàm lọc dữ liệu
function filter()
{
    $filterArr = [];
    //
    if (isGet()) {
        // xử lý trước khi hiển thị ra
        if (!empty($_GET)) {
            foreach ($_GET as $key => $val) {
                // strip_tag loại bỏ thẻ php và html
                $key = strip_tags($key);
                // kiểm tra val có giá trị array không
                if (is_array($val)) {
                    $filterArr[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
                } else {
                    $filterArr[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                }
            }
        }
    }

    if (isPost()) {
        // xử lý trước khi hiển thị ra
        // return $_GET;
        if (!empty($_POST)) {
            foreach ($_POST as $key => $val) {
                // strip_tag loại bỏ thẻ php và html
                $key = strip_tags($key);
                // kiểm tra val có giá trị array không
                if (is_array($val)) {
                    $filterArr[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
                } else {
                    $filterArr[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                }
            }
        }
    }
    return $filterArr;
}

// hàm Kiểm tra Email
function isEmail($email)
{
    $checkEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
    return $checkEmail;
}

//hàm Kiểm tra số nguyên
function isNumberInt($number)
{
    $checkNumber = filter_var($number, FILTER_VALIDATE_INT);
    return $checkNumber;
}

//hàm Kiểm tra số thực
function isNumberFloat($number)
{
    $checkNumber = filter_var($number, FILTER_VALIDATE_FLOAT);
    return $checkNumber;
}


// hàm kiểm tra số điện thoại
function isPhone($phone)
{
    $checkZero = false;
    //Điều kiện 1 là kiểm tra số 0
    if ($phone[0] == '0') {
        $checkZero = true;
        $phone = substr($phone, 1);
    }
    //Điều kiện 2 là kiểm tra 9 số còn lại
    $checkNumber = false;
    if (isNumberInt($phone) && (strlen($phone) == 9)) {
        $checkNumber = true;
    }
    if ($checkNumber && $checkZero) {
        return true;
    }
    return false;
}

// Hàm thông báo lỗi
function getMsg($msg, $type = 'success')
{
    echo '<div class="alert alert-' . $type . '">';
    print_r($msg);
    echo '</div>';
}

// hàm chuyển hướng
function redirect($path = 'index.php')
{
    header('Location:' . $path);
    exit;
}

// Hàm thông báo lỗi form input
function formError($fileName, $beforeHtml = '', $afterHtml = '', $errors)
{
    //Hàm reset hàm có mặc của php công việc lấy ra phần tử đầu tiên của mảng
    return (!empty($errors[$fileName])) ? '<span class="error">' . reset($errors[$fileName]) . '</span>' : '';
}

// hàm hiển thị dữ liệu cũ form
function old($fileName, $oldData, $default = null)
{
    return (!empty($oldData[$fileName]) ? $oldData[$fileName] : $default);
}

// hàm kiểm tra trạng thái đăng nhập
function isLogin()
{
    $checkLogin = false;
    // kiểm tra cookie có không
    if (isset($_COOKIE['user_login'])) {
        $checkLogin = true;
    }
    //Kiểm tra có tokenLogin không
    if (!empty(getSession('tokenLogin'))) {
        $tokenLogin = getSession('tokenLogin');
        // Kiểm tra token có giống trong database không
        $queryToken = "SELECT user_id FROM tokenlogin WHERE token = '$tokenLogin'";
        if (!empty($queryToken)) {
            $checkLogin = true;
        } else {
            removeSession('tokenLogin');
        }
    }

    return $checkLogin;
}

// Hàm kiểm tra tài khoản admin
function adminLogin()
{
    $checkAdmin = false;
    if (!empty($_COOKIE['user_login'])) {
        $_SESSION['user_login'] = $_COOKIE['user_login'];
        $checkAdmin = true;
    }

    //kiểm tra có phải session của admin không
    $checkSession = password_verify("admin", $_SESSION['user_login']);
    if (!empty($_SESSION['user_login'] == 'admin' || $checkSession)) {
        $checkAdmin = true;
    } else {
        redirect(_WEB_HOST . '/errors/404.php');
    }
    return $checkAdmin;
}

// Hàm hiện thị tiền tệ
function showCurrency($currency)
{
    return number_format($currency, 0, ',', '.') . '<span class="dong-item">&#8363</span></p>';
}

// hàm tính phan trăm
function percentage($giagoc, $giahientai)
{
    if ($giagoc == 0) {
        return 0; // Tránh chia cho 0
    }
    $giahientai = $giagoc - $giahientai;
    $kq = ($giahientai / $giagoc) * 100;
    return number_format($kq) . "%";
}

function limitString($string, $limit = 30)
{
    if (mb_strlen($string) > $limit) {
        return mb_substr($string, 0, $limit) . '...';
    }
    return $string;
}

// hàm file image

function fileImage($fileName = [], $host = '', $nameIamge)
{
    switch ($fileName) {
        case 1:
            echo "<img src=\"$host/images/maygiat/$nameIamge\" class=\"card-img-top img-item\" onmouseenter=\"increaseSize(this)\" onmouseout=\"decreaseSize(this)\">";
            break;
        case 2:
            echo "<img src=\"$host/images/maylocnuoc/$nameIamge\" class=\"card-img-top img-item\" onmouseenter=\"increaseSize(this)\" onmouseout=\"decreaseSize(this)\">";
            break;
        case 3:
            echo "<img src=\"$host/images/tudong/$nameIamge\" class=\"card-img-top img-item\" onmouseenter=\"increaseSize(this)\" onmouseout=\"decreaseSize(this)\">";
            break;
        case 4:
            echo "<img src=\"$host/images/maynuocnong/$nameIamge\" class=\"card-img-top img-item\" onmouseenter=\"increaseSize(this)\" onmouseout=\"decreaseSize(this)\">";
            break;
        case 5:
            echo "<img src=\"$host/images/tivi/$nameIamge\" id=\"img-tivi\" class=\"card-img-top img-item\" onmouseenter=\"increaseSize(this)\" onmouseout=\"decreaseSize(this)\">";
            break;
        case 6:
            echo "<img src=\"$host/images/tulanh/$nameIamge\" class=\"card-img-top img-item\" onmouseenter=\"increaseSize(this)\" onmouseout=\"decreaseSize(this)\">";
            break;
        default:
            echo "<img src=\"$host/images/maylanh/$nameIamge\" class=\"card-img-top img-item img-maylanh\" onmouseenter=\"increaseSize(this)\" onmouseout=\"decreaseSize(this)\">";
    }
}


// Hàm link sản phẩm chi tiết
function linkSp($fileName = [], $host, $nameSp)
{
    switch ($fileName) {
        case 1:
            echo "$host/maygiat/view.php?sp=$nameSp";
            break;
        case 2:
            echo "$host/maylocnuoc/view.php?sp=$nameSp";
            break;
        case 3:
            echo "$host/tudong/view.php?sp=$nameSp";
            break;
        case 4:
            echo "$host/maynuocnong/view.php?sp=$nameSp";
            break;
        case 5:
            echo "$host/tivi/view.php?sp=$nameSp";
            break;
        case 6:
            echo "$host/tulanh/view.php?sp=$nameSp";
            break;
        default:
            echo "$host/maylanh/view.php?sp=$nameSp";
    }
}

// Hàm phân trang
function page($page, $tongPage)
{
    if ($page > 3) {
        $first_page = 1;
        echo "<a href=\"?page= $first_page\" class=\"pageChuyen\"><i class=\"fa-solid fa-angles-left\" style=\"margin: 0px 5px;\"></i></a>";
    }

    if ($page > 1) {
        $prePage = $page - 1;
        echo "<a href=\"?page=$prePage\" class=\"pageChuyen\"><i class=\"fa-solid fa-chevron-left\" style=\"margin: 0px 5px;\"></i></a>";
    }

    for ($num = 1; $num <= $tongPage; $num++) {
        if ($num != $page) {
            if ($num > $page - 3 && $num < $page + 3) {
                echo "<button class=\"btn-itemPage\"><a href=\"?page=$num\" class=\"itemPage\">$num</a></button>";
            }
        } else {
            echo "<button class=\"itemPage-disabled\"><a class=\"pageDisabled\" style=\"cursor: not-allowed;\">$num</a></button>";
        }
    }

    if ($page < $tongPage - 1) {
        $nextPage = $page + 1;
        echo "<a href=\"?page=$nextPage\" class=\"pageChuyen\"><i class=\"fa-solid fa-chevron-right\" style=\"margin: 0px 5px;\"></i></a>";
    }

    if ($page < $tongPage - 3) {
        $endPage = $tongPage;
        echo "<a href=\"?page=$endPage\" class=\"pageChuyen\"><i class=\"fa-solid fa-angles-right\" style=\"margin: 0px 5px;\"></i></a>";
    }
}
