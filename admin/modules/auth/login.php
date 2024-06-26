<?php require_once(__DIR__ . '../../../../config.php'); ?>

<head>
    <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATES; ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATES; ?>/css/clients.css">
    <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATES; ?>/css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<div class="modal-header">
    <h1 class="modal-title fs-3" id="exampleModalToggleLabel">Đăng nhập</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body ">
    <form class="main-form" action="#" method="post">
        <div class="input-group">
            <input type="text" required>
            <label for="">Username</label>
        </div>
        <div class="input-group">
            <input type="password" required>
            <label for="">Password</label>
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Ghi nhớ mật khẩu</label>
        </div>
    </form>
</div>
<div class="modal-footer">
    <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Đăng ký</button>
    <button class="btn btn-primary">Đăng nhập</button>
</div>
</div>

<!-- <style>
 
    .input-group {
        position: relative;
        margin: 20px 0;
    }

    .input-group label {
        position: absolute;
        top: 50%;
        left: 5px;
        transform: translateY(-50%);
        font-size: 16px;
        padding: 0 5px;
        pointer-events: none;
        transition: .5s;
    }

    .input-group input {
        width: 100%;
        height: 40px;
        font-size: 16px;
        padding: 0 10px;
        background: transparent;
        border: 1.2px solid;
        outline: none;
        border-radius: 5px;
    }

    .input-group input:focus~label,
    .input-group input:valid~label {
        top: 0px;
        font-size: 12px;
        background: #fff;
    }
</style> -->