<?php
namespace GrupBilgi;

if(!defined('PageSecurity')){require($_SERVER['DOCUMENT_ROOT'].'/System/Classes/FileFolderSecurity.class.php');}

use DatabaseEngine as Db;

class Controller extends \Root\Controller{
	
	protected $ViewMethod='C';

	public function Run(){
		/*
		if($_POST){
			if( isset($_POST['linkTalep']) ){
				echo 5;
			}
			else if( isset($_POST['iptalTalep']) ){
				echo 2;
			}
		}*/

		$this->grup = Db::getRow('SELECT *,count(basvurular_onay.id) as uye_sayi FROM wp_gruplari 
		INNER JOIN basvurular_onay ON wp_gruplari.id = basvurular_onay.grup_id
		WHERE wp_gruplari.id = ?',array($this->Area->Session->Get('GrupId')));
		$this->Rend();

		
	}

}
