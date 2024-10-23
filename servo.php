<?php
    //koneksi ke database
    $konek = mysqli_connect("localhost", "root", "", "kontrolling");

    //tangkap variabel pos dari ajax
    $pos = $_GET['pos'];
    // Update nilai field servo pada database
    mysqli_query($konek, "UPDATE kontrol SET servo='$pos'");
    //berikan respon
    echo $pos;
   
?>
