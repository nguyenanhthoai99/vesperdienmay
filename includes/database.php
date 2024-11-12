<!-- các hàm xử lý liên quan đến cơ sở dữ liệu -->
<?php

// Hàm dùng chung có các thao tác (thêm, sửa, xóa)
function query($sql, $data = [], $check = false)
{
    global $conn;
    $ketqua = false;
    // kiểm tra lỗi sql
    // print_r($sql);
    // die();
    try {
        $statement = $conn->prepare($sql); // hàm prepare là hàm có sẵn của class PDO công dụng là tăng cường bản mật
        if (!empty($data)) {
            $ketqua =  $statement->execute($data); // đẩy dữ liệu lên sever
        } else {
            $ketqua =  $statement->execute();
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . '<br/>';
        echo "File: " . $e->getFile() . '<br/>';
        echo "Line: " . $e->getLine() . '<br/>';
        die();
    }
    // kiểm check = true để truy vấn dữ liệu
    if ($check) {
        return $statement;
    }
    return $ketqua;
}

//Hàm insert
function insert($table, $data)
{
    $key = array_keys($data);
    //nối các trường thông tin và gán trị với nhau
    $truong = implode(', ', $key);
    // tên key và val giống nhau
    $valuetb = ' :' . implode(', :', $key);
    $sql = 'INSERT INTO ' . $table . ' (' . $truong . ')' . ' VALUES ' . '(' . $valuetb . ')';
    $result = query($sql, $data);
    return $result;
}

// Hàm update
function update($table, $data, $condition = '')
{
    $update = '';
    foreach ($data as $key => $val) {
        $update .= $key . ' = :' . $key . ',';
    }
    // xóa dấu , ở cuối chuỗi update
    $update = trim($update, ',');
    // kiểm tra điều kiện cần update
    if (!empty($condition)) {
        $sql = 'UPDATE ' . $table . ' SET ' . $update . ' WHERE ' . $condition;
    } else {
        $sql = 'UPDATE ' . $table . ' SET ' . $update;
    }
    $ketqua = query($sql, $data);
    return $ketqua;
}

//Hàm delete
function delete($table, $condition = '')
{
    if (!empty($condition)) {
        $sql = 'DELETE FROM ' . $table . ' WHERE ' . $condition;
    } else {
        $sql = 'DELETE FROM ' . $table;
    }
    //  print_r($sql);
    // die();
    $ketqua = query($sql);
    return $ketqua;
}


// lấy nhiều dòng dữ liệu
function getRaw($sql)
{
    $ketqua = query($sql, '', true);
    if (is_object($ketqua)) {
        $dataFetch = $ketqua->fetchAll(PDO::FETCH_ASSOC);
    }
    return $dataFetch;
}

//lấy 1 dòng dữ liệu
function oneRaw($sql)
{
    $ketqua = query($sql, '', true);
    if (is_object($ketqua)) {
        $dataFetch = $ketqua->fetch(PDO::FETCH_ASSOC);
    }
    return $dataFetch;
}

// Đếm số dòng dữ liệu
function getRows($sql)
{
    $ketqua = query($sql, '', true);
    if (!empty($ketqua)) {
        return $ketqua->rowCount();
    }
}
