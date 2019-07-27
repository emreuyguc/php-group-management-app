<?php
namespace Head;

if(!defined('PageSecurity')){require($_SERVER['DOCUMENT_ROOT'].'/System/Classes/FileFolderSecurity.class.php');}


use \SecurelySession as Oturum;

class Controller extends \Root\Controller{
	
	protected $ViewMethod='M';
	
	protected function Run(){
		$this->YetkiliOturum = new Oturum;
		if(!$this->YetkiliOturum->Check('giris')){
			$this->Go('Giris');
		}
		$this->Rend();

	}
}
