<?php
if(!defined('PageSecurity')){require($_SERVER['DOCUMENT_ROOT'].'/System/Classes/FileFolderSecurity.class.php');}

$Site->SslMode = '0';
$Site->CompressMethod = 'ob_gzhandler';
$Site->Title = '';