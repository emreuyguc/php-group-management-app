<?php
namespace Giris;

if(!defined('PageSecurity')){require($_SERVER['DOCUMENT_ROOT'].'/System/Classes/FileFolderSecurity.class.php');}

use \DatabaseEngine as Db;
use \Notifications as Uyari;
use \SecurelySession as Oturum;

class Controller extends \Root\Controller{
	
	protected $ViewMethod='F';

	public function Run(){
		$this->oturum = new Oturum;
		if( $this->oturum->Check('Giris') ){
			$this->Go('/');
		}
		else{
			$this->girisKontrol();
			$this->Rend('GirisForm');
		}
		

	}
	private function girisKontrol(){
		if($_POST){
			if($_POST['kadi'] && $_POST['sifre']){
				$kadi = $_POST['kadi'];
				$sifre = $_POST['sifre'];
				$kontrolUser = Db::getRow('SELECT 
				count(uyeler.id) as eslesme, basvuru_id, kadi, ad_soyad , grup_id, uyeler.id as uye_id
				FROM uyeler 
				INNER JOIN basvurular_onay ON uyeler.onay_id = basvurular_onay.id
				INNER JOIN basvurular ON basvurular_onay.basvuru_id = basvurular.id
				WHERE BINARY kadi = ? and BINARY sifre = ? and durum = 1',array($kadi,$sifre));
				if($kontrolUser->eslesme > 0){
					$this->oturum->Set('Giris',true);
					$this->oturum->Set('GrupId',$kontrolUser->grup_id);
					$this->oturum->Set('UyeId',$kontrolUser->uye_id);
					$this->oturum->Set('AdSoyad',$kontrolUser->ad_soyad);
					$this->oturum->Set('Kadi',$kontrolUser->kadi);
					$this->GoHome();
				}
			}
		}
	}
	
}
