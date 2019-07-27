<?php
namespace index;

if(!defined('PageSecurity')){require($_SERVER['DOCUMENT_ROOT'].'/System/Classes/FileFolderSecurity.class.php');}

use \SecurelySession as Oturum;

class Controller extends \Root\Controller{
	
	protected $ViewMethod='C';

	public function Run(){
		$this->oturum = new Oturum;
		
		if( $this->oturum->Check('Giris') ){
			$this->Go('Uyeler');
		}
		else{
			$this->ViewMethod = 'F';
			$this->Rend('Bilgi');
		}
		

	}
	
}
