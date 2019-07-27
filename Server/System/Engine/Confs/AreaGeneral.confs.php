<?php
if(!defined('PageSecurity')){require($_SERVER['DOCUMENT_ROOT'].'/System/Classes/FileFolderSecurity.class.php');}

//Admin and Developer
###################################
$Area->Areas['Folder']['Error'] = 'Error';
$Area->Areas['HomePage']['Error'] = 'Mesaj';
$Area->Areas['UrlVar']['Error'] = 'Hata';
$Area->Areas['Title']['Error'] = 'Bir Hata Oluştu!';
###################################
$Area->Areas['Folder']['Public'] = 'Public';
$Area->Areas['HomePage']['Public'] = 'index';
$Area->Areas['UrlVar']['Public'] = '';
$Area->Areas['Title']['Public'] = 'Motorcycle Club - Member Area';
###################################
$Area->Areas['Folder']['Admin'] = 'Admin';
$Area->Areas['HomePage']['Admin'] = 'index';
$Area->Areas['UrlVar']['Admin'] = 'Yonetim';
$Area->Areas['Title']['Admin'] = 'Motorcycle Club - Admin Area';
###################################
$Area->UrlParamsVar = 'UrlParams';
###################################
$Area->ChangerMethodVars = ['C','Changer']; 
$Area->PartialMethodVars = ['P','Partial']; 
$Area->SinglePageMethodVars = ['S','SinglePage']; 
$Area->FullPageMethodVars = ['F','FullPage']; 
###################################
$Area->MainHead = 'head';
$Area->MainNavBar = 'navbar';
$Area->MainFootBar = 'footerbar';
$Area->MainFoot = 'foot';
###################################
$Area->PageFileExtension = 'php';
###################################
$Area->ViewFileSeperator = '.view.';
$Area->ControllerFileSeperator = '.controller.';
###################################
$Area->UrlParamsExpVal = '/';