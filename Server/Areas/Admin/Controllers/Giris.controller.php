<?php
namespace Giris;

if(!defined('PageSecurity')){require($_SERVER['DOCUMENT_ROOT'].'/System/Classes/FileFolderSecurity.class.php');}

use \DatabaseEngine as Db;
use \SecurelySession as Oturum;
use \Notifications as Uyari;

class Controller extends \Root\Controller{
	
	protected $ViewMethod='F';

	public function Run(){
		$this->Uyari = new Uyari;
		$this->YetkiliOturum = new Oturum;
		
		if($this->YetkiliOturum->Check('giris')){
			$this->GoHome();
		}

		if($_POST){

			if(
			isset($_POST['yetkili']) &&
			isset($_POST['sifre']) 
			){
				$yetkili = $_POST['yetkili'];
				$sifre = $_POST['sifre'];
				$kontrol = Db::getRow('SELECT count(id) AS eslesme FROM yoneticiler WHERE BINARY yetkili = ? and BINARY sifre = ?',array($yetkili,$sifre));
				if($kontrol->eslesme){
					$this->YetkiliOturum->Set('giris',TRUE);
					$this->YetkiliOturum->Set('yetkili', $yetkili);
					$this->Go('');
					die();
				}
				else{
					$this->Uyari->Set('uyari','<div class="alert alert-danger" role="alert">
                               
                                <strong>Giriş Bilgileri Hatalı !</strong> Bağlantı bilgileriniz Güvenlik sebebiyle kayıt edilmiştir.
                            </div>');
				}
			}

		}
		$this->Rend();

	}
	

	
}
