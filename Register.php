<?php
/**
 * Digunakan untuk register manual.
 */

 require "koneksi.php";

header("Content-Type: application/json");

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // post request
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        //$epassword = password_hash($password, PASSWORD_BCRYPT);

        // get data user
        $sql = "INSERT INTO loginuser VALUES (null, '$username', '$email','$password')";
        $result = $conn->query($sql);

        // jika register berhasil
        if($result === true){
            $response = array("status"=>"success", "message"=>"Register Success");
        }else{
            $response = array("status"=>"error", "message"=>"Register Gagal");
        }

        // close koneksi
        $conn->close();

    }else{
        $response = array("status"=>"error", "message"=>"not post method");
    }

    // show response
    echo json_encode($response);
?>