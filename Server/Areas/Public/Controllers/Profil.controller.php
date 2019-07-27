<?php
namespace Profil;

if(!defined('PageSecurity')){require($_SERVER['DOCUMENT_ROOT'].'/System/Classes/FileFolderSecurity.class.php');}


use DatabaseEngine as Db;
use Notifications as uyari;
class Controller extends \Root\Controller{
	
	protected $ViewMethod='C';

	public function Run(){
		
		$this->uyari = new uyari;
		if($_POST){
			if(
				isset($_POST['adSoyad'])  &&
				isset($_POST['telefon'])  &&
				isset($_POST['email'])  &&
				isset($_POST['dogumTarihi'])  &&
				isset($_POST['sehir'])  &&
				isset($_POST['meslek'])  &&
				isset($_POST['plaka'])  &&
				isset($_POST['motorMarkaModel'])  &&
				isset($_POST['motorKm'])
			){
				
				//SADECE VERİ EKLERKENN BPŞ DOLU KONTROLU YYAPPP YETERLİİİ BİRDE ÖZELLİK GEREKTİREN VERİLERDE
				$adSoyad = $_POST['adSoyad'];
				$telefon = str_replace(array('-',' ','(',')'),'',$_POST['telefon']);
				$email = $_POST['email'];
				$dogumTarihi = $_POST['dogumTarihi'];
				$sehir = $_POST['sehir'];
				$meslek = $_POST['meslek'];
				$plaka = $_POST['plaka'];
				$motorMarkaModel = $_POST['motorMarkaModel'];
				$motorKm = $_POST['motorKm'];
				
				$grupAdi = $_POST['grupAdi'];

				
				$uyeId = Db::getVar('SELECT
		basvuru_id
		FROM uyeler	
		INNER JOIN basvurular_onay ON uyeler.onay_id = basvurular_onay.id
		INNER JOIN basvurular ON basvurular_onay.basvuru_id = basvurular.id
		where uyeler.id = ?',array($this->Area->Session->Get('UyeId')));
		
				$guncel = Db::exec('UPDATE basvurular 
				SET 
				ad_soyad = ?
				,telefon = ?
				,mail = ?
				,dogum_tarihi = ?
				,sehir = ?
				,meslek = ?
				,plaka = ?
				,motor_marka_model = ?
				,motor_km = ?
				,uyelik_grup_adi = ?
				where basvurular.id = ?',array($adSoyad,$telefon,$email,$dogumTarihi,$sehir,$meslek,$plaka,$motorMarkaModel,$motorKm,$grupAdi,$uyeId));
				if($guncel){
					$this->uyari->Set('uyari','<div class="alert alert-success" role="alert">
                                
                                <strong>Bilgiler kaydedildi </strong>
                            </div>');
				}
				else{
					$this->uyari->Set('uyari','<div class="alert alert-warning" role="alert">
                                
                                <strong>Bilgiler aynı veya bir hata oluştu! </strong>
                            </div>');
				}
			}
			else{
				$this->uyari->Set('uyari','<div class="alert alert-warning" role="alert">
                                
                                <strong>Lütfen Bilgileri Boş Geçme!</strong>  Bazı bilgilerin boş olduğunu tespit ettik , başvuru kaydın ve onay için lütfen geçerli bilgiler gir.
                            </div>');
			}
		}
		
		$this->CustomJs = "<script type='text/javascript' src='".$this->r_AssetsPath()."js/plugins/bootstrap/bootstrap-datepicker.js'></script>      
        <script type='text/javascript' src='".$this->r_AssetsPath()."js/plugins/icheck/icheck.min.js'></script>
        <script type='text/javascript' src='".$this->r_AssetsPath()."js/plugins/validationengine/languages/jquery.validationEngine-en.js'></script>
        <script type='text/javascript' src='".$this->r_AssetsPath()."js/plugins/validationengine/jquery.validationEngine.js'></script>        
        <script type='text/javascript' src='".$this->r_AssetsPath()."js/plugins/jquery-validation/jquery.validate.js'></script>                

        <script type='text/javascript' src='".$this->r_AssetsPath()."js/plugins/maskedinput/jquery.maskedinput.min.js'></script>
		 <script type='text/javascript' src='".$this->r_AssetsPath()."js/plugins.js'></script>
		 
	
      ";
	  
	  
	  		$this->profil = Db::getRow('SELECT
		*
		FROM uyeler	
		INNER JOIN basvurular_onay ON uyeler.onay_id = basvurular_onay.id
		INNER JOIN basvurular ON basvurular_onay.basvuru_id = basvurular.id
		LEFT JOIN wp_gruplari ON basvurular_onay.grup_id = wp_gruplari.id
		
		where uyeler.id = ?',array($this->Area->Session->Get('UyeId')));
		if($this->profil){
			$this->Rend();
		}
		else{
			echo '<script>alert("OTURUM BİLGİLERİNİZDE KRİTİK HATA TEKRAR GİRİŞ YAP!")</script><meta http-equiv="refresh" content="0;url='.$this->r_href('Cikis').'"> ';
			die();
		}
	}
	
	public function gKontrol($sec){
		if($this->profil->uyelik_grup_adi !='HAYIR' && $sec == 'e'){
			echo 'checked';
		}
		else if($this->profil->uyelik_grup_adi =='HAYIR' && $sec == 'h'){
			echo 'checked';
		}
	}
}
