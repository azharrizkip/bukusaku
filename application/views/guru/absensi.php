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
    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/animate-css/animate.css" rel="stylesheet" />


    <!-- Custom Css -->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo base_url(); ?>assets/css/themes/all-themes.css" rel="stylesheet" />

    <link href="<?php echo base_url(); ?>assets/dist/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />

    <!-- Sweet Alert Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/dist/css/font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
      .form-control{
        background-color: white;
        height: 30px;
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
    <?php $this->load->view('guru/navbar'); ?>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
          <?php $this->load->view('guru/sidebar'); ?>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->

        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
        <div class="card" style="background-color: #D7D7D7;">
        <div class="container-fluid">
            <div class="header">
                <h2 style="color:black;">
                Absensi Tanggal <?php echo date('d-m-Y'); ?>
                </h2>
            </div>
 <!-- isi -->
                

 <!-- Main content -->
    
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>guru/saveabsensi" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-12">

                    <div class="form-grup">
                          <p>
                              <b>Nama</b>
                          </p>
                          <select class="form-control show-tick" data-live-search="true" name="nis">
                            <?php $no=0; foreach($data_siswa as $row) { $no++ ?>
                            <option value="<?php echo $row['kd_sis']?>" data-subtext="<?php echo $row['nis']?> (<?php echo $row['kelas']?>)"><?php echo $row['nama']?></option>';

                            <?php } ?>
                          </select>
                      </div><br>
                      <div class="form-grup">
                          <p>
                              <b>Mata Pelajaran</b>
                          </p>
                          <select class="form-control show-tick" data-live-search="true" name="pelajaran">
                            <option value="<?php echo $mapel1 ?>"><?php echo $mapel1?></option>
                            <option <?php if($mapel2==NULL){ echo 'class="hidden"'; } ?> value="<?php echo $mapel2 ?>"><?php echo $mapel2?></option>;
                            <option <?php if($mapel3==NULL){ echo 'class="hidden"'; } ?> value="<?php echo $mapel3 ?>"><?php echo $mapel3?></option>;
                          </select>
                      </div>
                      <br>
                      <div class="form-grup">
                          <p>
                              <b>Keterangan</b>
                          </p>
                          <select class="form-control show-tick" data-live-search="true" name="keterangan">
                            <option value="Sakit">Sakit</option>';
                            <option value="Izin">Izin</option>';
                            <option value="Alasan">Alasan</option>';
                          </select>
                      </div>
                       
                  </div>
                  </div>


                </div><!-- /.item -->
                <br><br>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Kirim</button>
                </div><!-- /.col -->
               </form>
              </div><!-- /.chat -->
            </div><!-- /.box (chat box) -->
          </section><!-- /.Left col -->


    <!-- Jquery Core Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.js"></script>


    <!-- Select Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Jquery Validation Plugin Css -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- JQuery Steps Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-steps/jquery.steps.js"></script>

    <!-- Sweet Alert Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/sweetalert/sweetalert.min.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/node-waves/waves.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/admin.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/pages/forms/form-validation.js"></script>

    <!-- Demo Js -->
    <script src="<?php echo base_url(); ?>assets/js/demo.js"></script>
</body>
</html>