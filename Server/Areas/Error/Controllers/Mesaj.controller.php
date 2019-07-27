<?php
namespace Mesaj;

if(!defined('PageSecurity')){require($_SERVER['DOCUMENT_ROOT'].'/System/Classes/FileFolderSecurity.class.php');}

class Controller extends \Root\Controller{
	
	protected $ViewMethod='F';
	
	public function Run(){
		if(http_response_code() >= 400){
			$this->hata = http_response_code();
		}
		else{
			$this->hata = $this->Area->PageParams;
		}
		$this->Rend('HataMesaji');
	}
}
