<?php
namespace Cikis;

if(!defined('PageSecurity')){require($_SERVER['DOCUMENT_ROOT'].'/System/Classes/FileFolderSecurity.class.php');}


class Controller extends \Root\Controller{
	
	protected $ViewMethod='F';

	public function Run(){
		$this->Area->Session->Destroy();
		$this->Go('Giris');
	}

}
