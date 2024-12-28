<?php

header("Acces-Control-Allow-Origin: header");
header(header: "Acces-Control-Allow-Origin: *");

include 'koneksi.php';

$sql = "SELECT * FROM berita";
$result = $koneksi->query($sql);
if($result->num_rows > 0)
{
    $response['isSucces'] = true;
    $response['message'] = "Berhasil Menampilkan Berita";
    $response['data'] = array();
    while ($row = $result->fetch_assoc()){
        $response['data'][] = $row;
        }
}
else
{
    $response['isSucces'] = false;
    $response['message'] = "Gagal Menampilkan Berita";
    $response['data'] = null;
}
echo json_encode($response);
?>