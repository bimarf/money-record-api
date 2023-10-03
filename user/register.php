<?php
include '../connection.php';

$name = $_POST['name'];
$email = $_POST['email'];
$password = md5($_POST['password']);
$created_at = $_POST['created_at'];
$updated_at = $_POST['updated_at'];

$sqlCheck = "SELECT * FROM user WHERE email = '$email'";

$resultCheck = $connect->query($sqlCheck);

if ($resultCheck->num_rows > 0) {
    echo json_encode(array(
        'status' => false,
        'message' => 'Email sudah terdaftar'
    ));
} else {
    $sql = "INSERT INTO user SET name='$name', email='$email', password='$password', created_at='$created_at', updated_at='$updated_at'";

    $result = $connect->query($sql);

    if ($result) {
        echo json_encode(array(
            'status' => true,
            'message' => 'Berhasil mendaftar'
        ));
    } else {
        echo json_encode(array(
            'status' => false,
            'message' => 'Gagal mendaftar'
        ));
    }
}
