<?php
if(!defined('PageSecurity')){require($_SERVER['DOCUMENT_ROOT'].'/System/Classes/FileFolderSecurity.class.php');}

?>
<!DOCTYPE html>
<html lang="tr" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <title><?php $this->FullTitle(); ?></title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="icon" href="<?php $this->AssetsPath(); ?>favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="<?php $this->AssetsPath(); ?>css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->                                      
    </head>
    <body>
	<div class="page-content">
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#"><?php $this->AreaTitle(); ?></a></li>
                    <li><a href="#">Üye Bölgesi</a></li>
                    <li class="active"></li>
                </ul>
                <!-- END BREADCRUMB -->
				
                <div class="panel panel-info">
                                <div class="panel-heading">
								
									<center><img src="<?php $this->AssetsPath(); ?>logo.jpg" alt="Cinque Terre" height='159px'></center>

                                    <h3 class="panel-title">Biz Kimiz :</h3>
                                </div>
                                <div class="panel-body">
                                    <p> Burasıı  Bilgi.view.php <---</p>
                                    </div>  
		<div class="form-group">                                        
                                            <div class="col-md-6">
                                                <button class="btn btn-success btn-block" onClick="window.location = ('<?php $this->e_href('Giris'); ?>')">Üye Girişi Yap</button>
                                            </div>
                                                         
                                            <div class="col-md-6">
                                                <button class="btn btn-danger btn-block" onClick="window.location = ('<?php $this->e_href('Basvuru'); ?>')">Başvuru Yap</button>
                                            </div>              
                                        </div>								
                           
                 </div>
               
    </div>
	<script type="text/javascript" src="<?php $this->AssetsPath(); ?>js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="<?php $this->AssetsPath(); ?>js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?php $this->AssetsPath(); ?>js/plugins/bootstrap/bootstrap.min.js"></script>
        <!-- END PLUGINS -->
    </body>
</html>

