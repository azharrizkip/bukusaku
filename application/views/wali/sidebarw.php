
<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="<?php echo base_url(); ?>assets/images/me.png" width="62" height="58" alt="User" />
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $nama ?></div>
            <div class="name"><?php echo $nis ?></div>

        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">MAIN NAVIGATION</li>
            <li id="home">
                <a href="<?php echo base_url(); ?>wali/profil">
                    <i class="material-icons">home</i>
                    <span>Home</span>
                </a>
            </li>
            <li id="tertib">
                <a href="<?php echo base_url(); ?>wali/tertib">
                    <i class="material-icons">book</i>
                    <span>Tata Tertib</span>
                </a>
            </li>
            <li id="pasal">
                <a href="<?php echo base_url(); ?>wali/pasal">
                    <i class="material-icons">book</i>
                    <span>Pasal</span>
                </a>
            </li>
            <li id="about">
                <a href="<?php echo base_url(); ?>wali/tentang">
                    <i class="material-icons">book</i>
                    <span>Tentang</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            &copy; 2017 <a >SMK TELKOM PURWOKERTO</a>.
        </div>
        <div class="version">
            <b>Version: </b> 1.0.0
        </div>
    </div>
    <!-- #Footer -->
</aside>

<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
   $(document).ready(function() {
       if (window.location.href === 'http://localhost/bukus2/wali/profil'){
            $('#home').addClass('active');
        }
        else if (window.location.href === 'http://localhost/bukus2/wali/tentang'){
            $('#about').addClass('active');
        }
        else if (window.location.href === 'http://localhost/bukus2/wali/pasal'){
            $('#pasal').addClass('active');
        }
        else if (window.location.href === 'http://localhost/bukus2/wali/tertib'){
            $('#tertib').addClass('active');
        }
    });
</script>
