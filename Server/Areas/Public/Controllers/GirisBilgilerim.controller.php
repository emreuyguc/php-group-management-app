<?php
namespace GirisBilgilerim;

if(!defined('PageSecurity')){require($_SERVER['DOCUMENT_ROOT'].'/System/Classes/FileFolderSecurity.class.php');}


use DatabaseEngine as Db;
use Notifications as uyari;

class Controller extends \Root\Controller{
	
	protected $ViewMethod='C';

	public function Run(){
		
		$this->uyari = new uyari;
		if($_POST){
			if(
				isset($_POST['sifre'])
			){
				
				//SADECE VERİ EKLERKENN BPŞ DOLU KONTROLU YYAPPP YETERLİİİ BİRDE ÖZELLİK GEREKTİREN VERİLERDE
				$sifre = $_POST['sifre'];
		
				$guncel = Db::exec('UPDATE uyeler 
				SET 
				sifre = ?
				where uyeler.id = ?',array($sifre,$this->Area->Session->Get('UyeId')));
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
		sifre
		FROM uyeler
		where uyeler.id = ?',array($this->Area->Session->Get('UyeId')));
		if($this->profil){
			$this->Rend();
		}
		else{
			echo '<script>alert("OTURUM BİLGİLERİNİZDE KRİTİK HATA TEKRAR GİRİŞ YAP!")</script><meta http-equiv="refresh" content="0;url='.$this->r_href('Cikis').'"> ';
			die();
		}
	}
	

}
