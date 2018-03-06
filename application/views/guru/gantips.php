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
    <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

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
            margin-top: -50px;
          }
        </style>
    </head>
    <center>
    <body>
        <div class="uwrap views">
            <div class="upage view-main view" id="mainpage">
              <div class="home">
                <div class="login">
                  <div class="login-box animated fadeInUp">

                    <form style="" method="post" class="login-form" id="gantips" action="<?php echo base_url(); ?>guru/kirim" onsubmit="return validasi_input(this)">
                      <center><h2>Isi Data Diri Anda</h2><br><br>
                        <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                        <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                        <div id="logo"><img src="<?php echo base_url();?>assets/images/logo.png"></div><br><br><br>
                        <p class="login-box-msg"  class="uppercase"><?php echo $info; ?></p>
                        <input  type="text" name="nik"  value="<?php echo $nik; ?>" readonly="yes" class="login-input"/>
                        <input  type="text" name="nama" value="<?php echo $nama; ?>" readonly="yes" class="login-input"/ required>
                        <input  type="text" name="email" placeholder="Email" class="login-input"/>
                        <input type="password" name="password1" placeholder="Sandi baru" class="login-input"/ required>
                        <input type="password" name="password2" placeholder="Ulangi sandi" class="login-input"/ required>
                        <button class="ph-button ph-btn-grey" type="submit">KIRIM</button>
                      </form>
                    </div>
                  </div>
                </div>
              <div class="pages">
            </div>
        </div>
    </body>
    </center>
    <script type="text/javascript">
      function validasi_input(form){
        if (form.password1.value != form.password2.value){
          alert("Password tidak sama!!");
          form.password2.focus();
          return (false);
        }
      return (true);
      }
    </script>
</html>
