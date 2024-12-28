<?php

header("Acces-Control-Allow-Origin: header");
header("Acces-Control-Allow-Origin: *");

include 'koneksi.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $id = $_POST['id'];
    $sql = "SELECT * FROM users WHERE id = $id";
    $result = $koneksi->query($sql);

    if($result->num_rows > 0){
        $response['isSucces'] = true;
        $response['message'] = "Berhasil Menampilkan data User";
        $response['data'] = array();
        while ($row = $result->fetch_assoc()){
            $response['data'][] = $row;
            }
    }
    else
    {
        $response['isSucces'] = false;
        $response['message'] = "Gagal Menampilkan data User";
        $response['data'] = null;
    }
    echo json_encode($response);
}
?>