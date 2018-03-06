<!DOCTYPE html>
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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="<?php echo base_url(); ?>assets/plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo base_url(); ?>assets/css/themes/all-themes.css" rel="stylesheet" />
    <!--tambah -->
    <link href="<?php echo base_url(); ?>assets/css/profil.css" rel="stylesheet" >
    <link href="<?php echo base_url(); ?>assets/css/scroll.css" rel="stylesheet" >
</head>

<body class="theme-red">
    <!-- Page Loader -->

    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->

    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <?php $this->load->view('wali/navbarw'); ?>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
          <?php $this->load->view('wali/sidebarw'); ?>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->

        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
      <div style="background-color: #de1c1c; color:#fff">
          <table border="0" style=" font-size:14px; font-weight: bold ;">
              <tbody>
                  <tr>
                      <td  style="width:35%; text-align:left;">
                          <div class="profil close-panel"><!--width="62" height="58"-->
                              <img src="<?php echo base_url();?>assets/images/me.png"style="width:102px; height:94px ">
                          </div>
                      </td >
                      <td style="">
                          <div id="pesan_nis" ><?php echo $nis; ?></div>
                          <div id="pesan_user" ><?php echo $nama; ?></div>
                          <div id="pesan_kelas" ><?php echo $kelas; ?></div>
                      </td>

                  </tr>


              </tbody>
          </table>
        </div>
        <div class="container-fluid">

            <div class="block-header">

            </div>
            <table border="0" class="ktabel" style="line-height:2; font-weight:bold;" >
              <tr >
                  <td style="width:30%; "><div id="topoin" style="display:block; "><?php echo $tpoin; ?></div>
                          <p>poin</p></td>
                  <td style="width:30% "><div id="pelanggaran" style="display:block; "><?php echo $tpelanggaran; ?></div>
                          <p>pelanggaran</p></td>
                  <td style="width:30% "><div id="pengharga" style="display:block; "><?php echo $tpengharga; ?></div>
                          <p>prestasi</p></td>
              </tr>
            </table><br>
            <div class="table-responsive">
            <table  style="box-shadow:3px 3px 3px 3px #E9E9E9 ;" class="table table-striped " cellpadding="0"  cellspacing="0">
              <thead>
                  <tr>
                    <th>NO</th>
                     <th>KODE</th>
                     <th>POIN</th>
                     <th>KETERANGAN</th>
                     <th>TANGGAL</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=0; foreach($data_poin as $row) { $no++ ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $row['kode']; ?></td>
                    <td><?php echo $row['poin']; ?></td>
                    <td><?php echo $row['pelanggaran']; ?></td>
                    <td><?php echo $row['tanggal']; ?></td>
                  </tr>
                  <?php } ?>
                </tbody>
            </table>
          </div>
                <!-- isi -->

                <!-- #END# isi -->
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

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/node-waves/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Morris Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/raphael/raphael.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <script src="<?php echo base_url(); ?>assets/plugins/chartjs/Chart.bundle.js"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/flot-charts/jquery.flot.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/flot-charts/jquery.flot.time.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-sparkline/jquery.sparkline.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url(); ?>assets/js/admin.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/pages/index.js"></script>

    <!-- Demo Js -->
    <script src="<?php echo base_url(); ?>assets/js/demo.js"></script>
</body>

</html>
