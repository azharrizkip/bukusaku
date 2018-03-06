﻿<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>BUKU SAKU</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="<?php echo base_url(); ?>assets/plugins/morrisjs/morris.css" rel="stylesheet" />
    <!-- Sweetalert Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo base_url(); ?>assets/css/themes/all-themes.css" rel="stylesheet" />
    <style media="screen">
      a{
        text-decoration: none;
      }
    </style>
</head>

<body class="theme-red">
    <!-- Page Loader -->

    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->

    <!-- Top Bar -->
    <?php $this->load->view('incsite/navbar'); ?>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
          <?php $this->load->view('incsite/sidebar'); ?>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->

        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>PEMBERITAHUAN</h2>
                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
            </div>

                <!-- isi -->
              <div class="row clearfix js-sweetalert">

                <!--unt pemberitahuan -->

                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header bg-light-blue">
                            <h2>
                                PEMBERITAHUAN <small></small>
                            </h2>
                            <ul class="header-dropdown m-r--5">

                            </ul>
                        </div>
                        <div class="body">

                          <div class="text">Poin pelanggaran Anda sekarang <?php echo $pemberitahuan2; ?></div>

                          </div>
                    </div>
                </div>

                <!--unt peringatan-->
                <?php $no=0; foreach($peringatan as $row) { $no++ ?>

                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header bg-light-blue" style="background: #F44336 !important; color:#fff;">
                            <h2>
                                PERINGATAN <small>Anda harus mengkonfiramsi pesan ini</small>
                            </h2>

                        </div>
                        <div class="body">
                          <div class="text">Poin pelanggaran Anda <?php echo $row['tpoin']; ?> Anda melebihi batas poin ditingkat <?php echo $row['aksi']; ?></div>
                          <div class="text">Anda segera menemui <?php echo $row['timdis']; ?> </div>
                          <div class="text"><center><?php echo $row['tanggal'];?></center></div>
                          </div>
                    </div>
                </div>
                  <?php } ?>
              </div>
                <!-- #END# isi -->
            </div>
        </div>
    </section>


    <!-- Jquery Core Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Bootstrap Notify Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-notify/bootstrap-notify.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/node-waves/waves.js"></script>

    <!-- SweetAlert Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/sweetalert/sweetalert.min.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url(); ?>assets/js/admin.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/pages/ui/dialogs.js"></script>

    <!-- Demo Js -->
    <script src="<?php echo base_url(); ?>assets/js/demo.js"></script>


    <!-- Demo Js -->
    <script src="<?php echo base_url(); ?>assets/js/demo.js"></script>
    <script>
    $(function(){
    $('#pesan-flash').delay(4000).fadeOut();
    $('#pesan-error-flash').delay(5000).fadeOut();
    });
    </script>


</body>

</html>
