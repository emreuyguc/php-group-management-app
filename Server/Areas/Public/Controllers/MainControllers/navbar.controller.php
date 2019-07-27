<?php
namespace NavBar;

if(!defined('PageSecurity')){require($_SERVER['DOCUMENT_ROOT'].'/System/Classes/FileFolderSecurity.class.php');}

class Controller extends \Root\Controller{
	
	protected $ViewMethod='M';
	
	protected function Run(){
		$this->activePage = $this->Area->Page;
		$this->Rend();
	}
	
	protected function activeClass($pageMenu){
		if($pageMenu == $this->activePage){
			echo 'active';
		}
		
	}
}
