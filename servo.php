<?php
    //jalur menuju File koneksi
    require "./koneksi.php";

    //tangkap variabel pos dari ajax
    $pos = $_GET['pos'];

    // Update nilai field servo pada database
    mysqli_query($konek, "UPDATE kontrol SET servo='$pos'");
    //berikan respon
    echo $pos;
   
?>