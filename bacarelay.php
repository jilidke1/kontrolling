<?php
      //Jalur menuju File koneksi
      require "./koneksi.php";

      $sql = mysqli_query($konek, "SELECT * FROM kontrol");
      $data = mysqli_fetch_array($sql);
      $relay = $data['relay'];

    //   Response balik ke NodeMCU
    echo $relay;

?>