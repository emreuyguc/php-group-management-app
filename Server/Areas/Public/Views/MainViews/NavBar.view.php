<?php
if(!defined('PageSecurity')){require($_SERVER['DOCUMENT_ROOT'].'/System/Classes/FileFolderSecurity.class.php');}
?>
    <body class="x-dashboard-dark">
        <!-- START PAGE CONTAINER -->
        <div class="page-container">            
            <!-- PAGE CONTENT -->
            <div class="page-content">
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    
                    <div class="x-hnavigation">
                        <div class="x-hnavigation-logo">
                            <a href="<?php $this->e_href(''); ?>">Freedom Hunters</a>
                        </div>
                        <ul>
						<li class="xn <?php $this->activeClass('GrupBilgi'); ?>">
                                <a href="<?php $this->e_href('GrupBilgi'); ?>">Grubum</a>
                            </li>
							<li class="xn <?php $this->activeClass('Uyeler'); ?>">
                                <a href="<?php $this->e_href('Uyeler'); ?>">Üyeler</a>
                            </li>
                            <li class="xn <?php $this->activeClass('Profil'); ?>">
                                <a href="<?php $this->e_href('Profil'); ?>">Profilim</a>
                                
                            </li>
							<li class="xn <?php $this->activeClass('GirisBilgilerim'); ?>">
                                <a href="<?php $this->e_href('GirisBilgilerim'); ?>">Sifre Güncelle</a>
                            </li>
                        </ul>
                        
                        <div class="x-features">
                            <div class="x-features-nav-open">
                                <span class="fa fa-bars"></span>
                            </div>
                            <div class="pull-right">

                                <div class="x-features-profile">
									
								    <img src="<?php $this->AssetsPath(); ?>assets/images/users/no-image.jpg">

                                    <ul class="xn-drop-left animated zoomIn">
                                        <li><a href="<?php $this->e_href('Cikis'); ?>" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span>Çıkış</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>                        
                    </div>
