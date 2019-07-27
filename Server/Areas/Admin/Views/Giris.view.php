<?php
if(!defined('PageSecurity')){require($_SERVER['DOCUMENT_ROOT'].'/System/Classes/FileFolderSecurity.class.php');}

?>


<!DOCTYPE html>
<html lang="tr" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <title><?php echo $this->FullTitle(); ?></title>            
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
        
        <div class="login-container">
        
            <div class="login-box animated fadeInDown">

                <div class="login-body">
                    <div class="login-title"><strong>Freedom Hunters </strong><BR>GRUP YÖNETİM BÖLGESİ</div>
					
					<?php $this->Uyari->Show('uyari'); ?>
                    <form action="" class="form-horizontal" method="post">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="Yetkili" name="yetkili"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" class="form-control" placeholder="Şifre" name="sifre"/>
                        </div>
                    </div>
					<button class="btn btn-info btn-block">GİRİŞ</button>
                        

                    </form>
                </div>
                <div class="login-footer">
                    <div class="pull-left">
                       <small> &copy; euu web software</small>
                    </div>
                </div>
            </div>
            
        </div>
        
    </body>
</html>






