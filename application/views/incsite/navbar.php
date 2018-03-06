<!-- Top Bar -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">


  <link href="<?php echo base_url(); ?>assets/css/icomaterial.css" rel="stylesheet">
<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" >BUKU SAKU</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <!-- #END# Call Search -->
                <!-- Notifications -->
                <li >
                    <a href="<?php echo base_url(); ?>siswa/notif" role="button">
                        <i class="material-icons">notifications</i>
                        <span class="label-count"><?php echo $tot_notif; ?></span>

                    </a>
                </li>
                <li>
                  <a href="<?php echo base_url();?>siswa/pesan" role="button">
                  <i class="material-icons">message</i>
                  <span class="label-count"><?php echo $tot_pesan ?></span>
                 </a>
                </li>
                <li class="pull-right">
                  <a href="<?php echo base_url();?>siswa/logout" role="button"  >
                  <i class="material-icons">exit_to_app</i>

                 </a>
                </li>
                <!-- #END# Notifications -->
                <!-- Tasks -->

                <!-- #END# Tasks -->

            </ul>
        </div>
    </div>
</nav>
