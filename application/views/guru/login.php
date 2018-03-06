<!DOCTYPE html>
<html>
    <!--
  * Please see the included README.md file for license terms and conditions.
  -->

    <head>
        <title>BUKU SAKU</title>
    <meta name="viewport" conten="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/form.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/login.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/msg.css">

        <meta charset="UTF-8">

        <meta http-equiv="Content-type" content="text/html; charset=utf-8">

        <!-- <meta name="viewport" content="width=device-width, minimum-scale=1, initial-scale=1"> -->
        <meta name="viewport" content="width=device-width, minimum-scale=1, initial-scale=1, user-scalable=no">
        <!-- <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes, minimum-scale=1, maximum-scale=2"> -->

        <style>
            /* following three (cascaded) are equivalent to above three meta viewport statements */
            /* see http://www.quirksmode.org/blog/archives/2014/05/html5_dev_conf.html */
            /* see http://dev.w3.org/csswg/css-device-adapt/ */
                @-ms-viewport { width: 100vw ; min-zoom: 100% ; zoom: 100% ; }          @viewport { width: 100vw ; min-zoom: 100% zoom: 100% ; }
                @-ms-viewport { user-zoom: fixed ; min-zoom: 100% ; }                   @viewport { user-zoom: fixed ; min-zoom: 100% ; }
                /*@-ms-viewport { user-zoom: zoom ; min-zoom: 100% ; max-zoom: 200% ; }   @viewport { user-zoom: zoom ; min-zoom: 100% ; max-zoom: 200% ; }*/
        .login{
            margin-top: -30px;
        }
        </style>
    </head>
    <center>
    <body>
        <div class="uwrap views">
            <div class="upage view-main view" id="mainpage">
                <div class="pages">
                    <div class="home">
                    <div class="login">
                      <div class="login-box animated fadeInUp">
                          <form  method="post" class="login-form" action="<?php echo base_url(); ?>guru/proseslog" name="login">

                            <center><h2>BUKU SAKU SMK TELKOM<br>PURWOKERTO</h2>
                            <div id="logo"><img src="<?php echo base_url(); ?>assets/images/logo.png"></div><br><br>
                            <h3 style="line-height:1.3em">ANDA MASUK SEBAGAI<BR> GURU</h3></center>
                              <p class="login-box-msg"  class="uppercase"></p>
                            <input  type="text" name="nik" id="nik" placeholder="Nomer Induk Karyawan" onblur="cek()" class="login-input"/ required>
                            <input type="password" name="password" placeholder="Password" class="login-input"/ required>
                            <button id="masuk" class="ph-button ph-btn-grey" type="submit">MASUK</button>
                            <br /><br /><a style="color:white; text-align:right;"href="<?php echo base_url(); ?>siswa">masuk sebagai siswa</a>
                          </form>
                        </div>
                        </div>
                    </div>
            </div>
        </div>
    </body>
    </center>
      <script src="<?php echo base_url(); ?>assets/js/script.js"></script>

</html>
