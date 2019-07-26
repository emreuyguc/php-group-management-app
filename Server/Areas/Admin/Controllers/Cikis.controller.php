<?php
namespace Cikis;

if(!defined('PageSecurity')){require($_SERVER['DOCUMENT_ROOT'].'/System/Classes/FileFolderSecurity.class.php');}


use \SecurelySession as Oturum;


class Controller extends \Root\Controller{
	
	protected $ViewMethod='F';

	public function Run(){

		$this->YetkiliOturum = new Oturum;
		$this->YetkiliOturum->Destroy();
		$this->GoHome();

	}
	

	
}
