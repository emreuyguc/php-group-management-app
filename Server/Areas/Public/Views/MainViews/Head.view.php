<?php
if(!defined('PageSecurity')){require($_SERVER['DOCUMENT_ROOT'].'/System/Classes/FileFolderSecurity.class.php');}
?>
<!DOCTYPE html>
<html lang="tr">
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
		<?php $this->IncludeCustomCss(); ?>
    </head>