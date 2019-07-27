<?php
if(!defined('PageSecurity')){require($_SERVER['DOCUMENT_ROOT'].'/System/Classes/FileFolderSecurity.class.php');}

?>
<!DOCTYPE html>
<html lang="tr" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <title><?php $this->AreaTitle(); ?> Üye girişi</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="<?php $this->AssetsPath(); ?>css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->                                      
    </head>
    <body>
        
        <div class="login-container login-v2">
            
            <div class="login-box animated fadeInDown">
                <div class="login-body">
                    <div class="login-title"><strong><?php $this->AreaTitle(); ?></strong> Üye Girişi.</div>
                    <form action="" class="form-horizontal" method="post">
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <span class="fa fa-user"></span>
                                </div>
                                <input name="kadi" type="text" class="form-control" placeholder="Telefon Numaranız 546..."/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <span class="fa fa-lock"></span>
                                </div>                                
                                <input name="sifre" type="password" class="form-control" placeholder="Şifre"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <a href="<?php $this->e_href('SifremiUnuttum'); ?>">Şifremi Unuttum</a>
                        </div>          
                        <div class="col-md-6 text-right">
                            <a href="<?php $this->e_href('Basvuru'); ?>">Yeni Başvuru</a>
                        </div>              
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <button class="btn btn-primary btn-lg btn-block">Giriş</button>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        &copy; 2019 <?php $this->AreaTitle(); ?> - E.U.U
                    </div>
                   
                </div>
            </div>
            
        </div>
        
    </body>
</html>






