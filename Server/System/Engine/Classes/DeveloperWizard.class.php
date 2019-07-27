<?php
if(!defined('PageSecurity')){require($_SERVER['DOCUMENT_ROOT'].'/System/Classes/FileFolderSecurity.class.php');}

use \FolderFileOperations as FileOp;

class DeveloperWizard{
	
	public function SetupControl(){
		$this->FileOp = new FileOp;
		$CheckSetupFile = $this->FileOp->CheckFile('BackEnd\Storage\Files','install-require.txt');
		if($CheckSetupFile){
			return(FALSE);
		}
		else{
			return(TRUE);
		}
	}
	
	public function SetUser($User,$Pass){
		
	}
	
	public function FinishWizard(){
		
	}
	
	public function DeveloperLogin(){
		
	}
	
	public function GetUser($Var){

	}
	
	public function GetVariableVal($Folder,$File,$Var){
		include($_SERVER['DOCUMENT_ROOT'].$Folder.$File);
		echo $Var;
	}

	/*
	
	1.kurulum yapılmışsa
		-home git
		
	kuurlum yapılmamışsa(dosya varsa)
		-setupa git 
			-kullanıcı adı şifre belirleme
			-developer ip belirleme
			-mysql veritabanı kuladı şifre belirleme
			-site ip
			-ssl mod
			-hata mod
			-area ayarları
			-main view adları
			-otomatik ana sayfa controller ve viewleri oluşturma boş
	*/
	
}
