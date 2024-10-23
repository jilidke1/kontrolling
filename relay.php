<?php
    
    //koneksi ke database
    $konek = mysqli_connect("localhost", "root", "", "kontrolling");

    //tangkap parameter dari ajax
    $stat = $_GET['stat'];
    if($stat ==  "ON"){
        //Ubah field relay menjadi 1
        mysqli_query($konek, "UPDATE kontrol SET relay=1");
        //Respon dari ajax
        echo "ON";
    }
    else{
         //Ubah field relay menjadi 1
         mysqli_query($konek, "UPDATE kontrol SET relay=0");
         //Respon dari ajax
         echo "OFF";
    }

?>