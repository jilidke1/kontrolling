<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>IoT Relay & Servo</title>

    <!-- Konfigurasi Ukuran Dan Posisi Object Pada Card Relay & Servo -->
    <style>
        /* Menyamakan tinggi card Relay dan Servo */
        .card-equal-height {
            height: 180px; /* Tentukan ukuran tinggi yang sama untuk kedua kartu */
        }

        /* Membesarkan toggle switch */
        .custom-switch .custom-control-input {
            width: 60px;
            height: 25px;
            transform: scale(1.5); /* Membesarkan ukuran switch */
            margin-left: -2.5rem; 
        }
        /* Object Switch 1 */
        .custom-switch .custom-control-label::before {
            width: 40px;
            height: 29px;
            border-radius: 30px;
        }
        /* Object Switch 2 */
        .custom-switch .custom-control-label::after {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            top: 3.5px;
            margin-left: -3px;
        }
    </style>


    <!-- Function Untuk Cek input User kepada Switch Relay dan Posisi Servo -->
    <script type="text/javascript">

        // Function Relay
        function ubahstatus(checkbox) {
            // Kondisi cek box switch
            var status = checkbox ? "ON" : "OFF";
            document.getElementById('status').innerHTML = status;

        //Function Ajax untuk mengubah nilai status relay
        var xmlhttp= new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                //Mengambil respon dari web setelah berhasil mengubah nilai
                document.getElementById('status').innerHTML = xmlhttp.responseText;
            }
        }

        //Eksecute file PHP untuk mengubah nilai di db
        xmlhttp.open("GET", "relay.php?stat="+status, true);
        //kirim data
        xmlhttp.send();

        }
      //Function Servo
        function ubahposisi(value) {
            // Update posisi di HTML
            document.getElementById('posisi').innerHTML = value;

            // Function Ajax untuk mengubah nilai posisi servo
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    // Mengambil respon dari web setelah berhasil mengubah nilai
                    document.getElementById('posisi').innerHTML = xmlhttp.responseText;
                }
            };

            // Eksekusi file PHP untuk mengubah nilai di database
            xmlhttp.open("GET", "servo.php?pos=" +value, true);
            // Kirim data
            xmlhttp.send();
        }

    </script>

  </head>
  <body>
    <!-- Judul awal web -->
    <div class="container" style="text-align: center ; padding-top: 20px;">
        <h2>Kontrol Relay & Servo NodeMCU ESP32<br>PHP & MySQL</h2>
    </div>

    <!-- Tampilan Card -->
    <div class="container" style="display:flex; justify-content:center; padding-top:25px;">

    <!-- Tampilan Card Relay -->
        <div class="container" style="padding-left:200px">
            <div class="card text-gray mb-3 card-equal-height" style="width: 20rem;">
                <div class="card-header" style="background-color:aquamarine; font-size: 30px; text-align: center; color:black;">Relay</div>
                <div class="card-body">

                    <!-- Switch Relay -->
                    <div class="custom-control custom-switch" style="font-size:17px; text-align:center;">
                        <input type="checkbox" class="custom-control-input" id="customSwitch1" onchange="ubahstatus(this.checked)">
                        <label class="custom-control-label" for="customSwitch1" style="padding-left:25px; font-size:24px"><span id="status">OFF</span></label>
                    </div>
                    <!-- Akhir Switch Relay -->

                </div>
            </div>
        </div>
        <!-- Akhir Tampilan Relay -->

        <!-- Tampilan Card Servo -->
        <div class="container">
            <div class="card text-gray mb-3 card-equal-height" style="width: 20rem;">
                <div class="card-header" style="background-color:blanchedalmond; font-size: 30px; text-align: center; color:black;">Servo</div>
                <div class="card-body">

                <!-- Range Slider -->
                    <form>
                        <div class="form-group" style="text-align: center;">
                            <label for="formControlRange">Posisi Servo <span id="posisi">0</span> Derajat</label>
                            <input type="range" class="form-control-range" id="formControlRange" min="0" max="180" step="1" value="0" onchange="ubahposisi(this.value)">
                        </div>
                    </form>
                <!-- Range Akhir Slider -->

                </div>
            </div>
        </div>
        <!-- Akhir Tampilan Servo -->

    </div>
    <!-- Akhir Tampilan Card -->

    <!-- Tampilan Img -->
    <div class="container" style="text-align:center; padding-top:40px">
        <img src="img/klogweh.PNG">
    </div>

    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
