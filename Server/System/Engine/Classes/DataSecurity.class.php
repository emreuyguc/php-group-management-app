<?php
if(!defined('PageSecurity')){require($_SERVER['DOCUMENT_ROOT'].'/System/Classes/FileFolderSecurity.class.php');}

class DataSecurity{
	public static function Url($Data){
		return(addslashes(trim(strip_tags(htmlentities(($Data))))));
	}
	
	public static function Request($Data){
		return(addslashes(trim(strip_tags(htmlentities(($Data))))));
	}
	
	public static function Html($Data){
		return(addslashes(trim(strip_tags(htmlentities(($Data))))));
	}
	
	public static function Txt($Data){
		return(addslashes(trim(strip_tags(htmlentities(($Data))))));
	}
	
	public static function Form($Data){
		return(addslashes(trim(strip_tags(htmlentities(($Data))))));
	}
}