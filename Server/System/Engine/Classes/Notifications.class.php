<?php
if(!defined('PageSecurity')){require($_SERVER['DOCUMENT_ROOT'].'/System/Classes/FileFolderSecurity.class.php');}

class Notifications{
	
	private $Notify = array();
	
	public function Set($Key , $Msg){
		$this->Notify[$Key] = $Msg;
	}
	
	public function Get($Key){
		if(isset($this->Notify[$Key])){
			return($this->Notify[$Key]);
		}
	}
	
	public function Show($Key){
		if(isset($this->Notify[$Key])) echo($this->Notify[$Key]);
	}
	
}