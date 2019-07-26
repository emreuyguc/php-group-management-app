<?php
namespace BasvuruIslem;

if(!defined('PageSecurity')){require($_SERVER['DOCUMENT_ROOT'].'/System/Classes/FileFolderSecurity.class.php');}

use \DatabaseEngine as Db;
use \SecurelySession as Oturum;
use \PHPMailer as eposta;
use \FolderFileOperations as dosya;

class Controller extends \Root\Controller{
	
	protected $ViewMethod='F';

	public function Run(){
		$this->YetkiliOturum = new Oturum;
		if($this->YetkiliOturum->Check('giris') || isset($_POST['hizli_token'])){
			
			if($_POST){
				if(isset($_POST['hizli_token'])){
							$hizlitoken = $_POST['hizli_token'];
				}
				if($this->Area->PageParams == 'Red'){
					$basvuruId = $_POST['basvuruId'];
					$redSebep = $_POST['redSebep'];
					
					$basvuruRed = Db::exec('INSERT INTO `basvurular_red` (`basvuru_id`, `red_sebep`) VALUES (?, ?);',ARRAY($basvuruId,$redSebep));
					if($basvuruRed){
						$redUye = Db::getRow('SELECT basvurular_red.id as id,telefon,mail,ad_soyad,basvurular.id as uye_id 
						FROM basvurular_red
						INNER JOIN basvurular ON basvurular_red.basvuru_id = basvurular.id
						WHERE basvuru_id = ?',ARRAY($basvuruId));
						if($redUye->id){
							
							
							if(isset($hizlitoken)){
								$upHizliLink = Db::exec('UPDATE basvuru_hizli_link SET durum = 0 WHERE token = ?',array($hizlitoken));
							}
							else{
								$upHizliLink = Db::exec('UPDATE basvuru_hizli_link SET durum = 0 WHERE basvuru_id = ?',array($basvuruId));
							}
							
							if(isset($hizlitoken)){
								echo 'KULLANICI BAŞARIYLA REDDEDİLDİ !';
							}
							else{
								echo 1;
							}
							
							
							$mailGonder = $this->mailRed($redUye->mail,$redUye->ad_soyad,$redSebep);
							if($mailGonder != FALSE){
								$mail_log = Db::exec('INSERT INTO `mailler` (`uye_id`,`eposta`,`icerik`, `durum`,`islem`) VALUES (?, ?, ?,?,?);',ARRAY($redUye->uye_id , $redUye->mail,  base64_encode($this->mailIcerik), 1,'basvuru_red'));
							}
							else{
								$mail_log = Db::exec('INSERT INTO `mailler` (`uye_id`,`eposta`,`icerik`, `durum`,`islem`) VALUES (?, ?, ?,?,?);',ARRAY($redUye->uye_id , $redUye->mail,  base64_encode($this->mailIcerik), 0,'basvuru_red'));
							}
							
						}
						
					}
				}
				else if($this->Area->PageParams == 'Onay'){
					$basvuruId = $_POST['basvuruId'];
					$kaydedilenWpGrup = $_POST['kaydedilenWpGrup'];
					
					$basvuruOnay = Db::exec('INSERT INTO `basvurular_onay` (`basvuru_id`, `grup_id`) VALUES (?, ?);',ARRAY($basvuruId,$kaydedilenWpGrup));
					if($basvuruOnay){
						$onayUye = Db::getRow('SELECT basvurular_onay.id as id,telefon,mail,ad_soyad,basvurular.id as uye_id,grup_katilim_link 
						FROM basvurular_onay 
						INNER JOIN basvurular ON basvurular_onay.basvuru_id = basvurular.id
						INNER JOIN wp_gruplari ON basvurular_onay.grup_id = wp_gruplari.id
						WHERE basvuru_id = ?',ARRAY($basvuruId));
						if($onayUye->id){
							
							$karakterler =  array_merge(range('a', 'z'),range(0, 9));
							shuffle($karakterler);
							$rastgeleSifre = implode(array_slice($karakterler,0,6));
							$uyeEkle = Db::exec('INSERT INTO `uyeler` (`onay_id`,`kadi`, `sifre`) VALUES (?, ?, ?);',ARRAY($onayUye->id,substr($onayUye->telefon,2,10) , $rastgeleSifre));
							if($uyeEkle){
								if(isset($hizlitoken)){
									$upHizliLink = Db::exec('UPDATE basvuru_hizli_link SET durum = 0 WHERE token = ?',array($hizlitoken));
								}
								else{
									$upHizliLink = Db::exec('UPDATE basvuru_hizli_link SET durum = 0 WHERE basvuru_id = ?',array($basvuruId));
								}
								
								$mailGonder = $this->mailOnaylama($onayUye->mail, $onayUye->ad_soyad, substr($onayUye->telefon,2,10), $rastgeleSifre, $onayUye->grup_katilim_link);
								if($mailGonder != FALSE){
									$mail_log = Db::exec('INSERT INTO `mailler` (`uye_id`,`eposta`,`icerik`, `durum`,`islem`) VALUES (?, ?, ?,?,?);',ARRAY($onayUye->uye_id , $onayUye->mail,  base64_encode($this->mailIcerik), 1,'basvuru_onay'));
									if(isset($hizlitoken)){
										echo 'KULLANICI BAŞARIYLA ONAYLANDI !';
									}
									else{
										echo 1;
									}
									
								}
								else{
									$mail_log = Db::exec('INSERT INTO `mailler` (`uye_id`,`eposta`,`icerik`, `durum`,`islem`) VALUES (?, ?, ?,?,?);',ARRAY($onayUye->uye_id , $onayUye->mail,  base64_encode($this->mailIcerik), 0,'basvuru_onay'));
									echo 2;
								}
							}
							else{
								//EKLENEMEDGİ DURUMDA BASVURU ONAYI SİLME
							}
							
						}						
					}
				}
				
				else if($this->Area->PageParams == 'Incele'){  //sadece re için kullanıyom
					$basvuruId = $_POST['basvuruId'];
					
					$basvuru = Db::getRow('SELECT  * FROM basvurular
						WHERE basvurular.id = ? ',array($basvuruId));
					if($basvuru){
						echo json_encode($basvuru);
					}
				}
				
				else if($this->Area->PageParams == 'RedIncele'){  //sadece re için kullanıyom
					$basvuruId = $_POST['basvuruId'];
					
					$basvuru = Db::getRow('SELECT  * FROM basvurular 
							INNER JOIN basvurular_red ON basvurular.id = basvurular_red.basvuru_id
						WHERE basvurular.id = ? ',array($basvuruId));
					if($basvuru){
						echo json_encode($basvuru);
					}
				}
				
				else if($this->Area->PageParams == 'OnayIncele'){
					$basvuruId = $_POST['basvuruId'];
					
					$basvuru = Db::getRow('SELECT  * FROM basvurular 
							INNER JOIN basvurular_onay ON basvurular.id = basvurular_onay.basvuru_id
							INNER JOIN wp_gruplari ON basvurular_onay.grup_id = wp_gruplari.id
							WHERE basvurular.id = ?',array($basvuruId));
					if($basvuru){
						echo json_encode($basvuru);
					}
				}
				
				else if($this->Area->PageParams == 'GrupCek'){
					$gruplar = Db::get('SELECT  * FROM wp_gruplari ');
					if($gruplar){
						echo json_encode($gruplar);
					}
				}
				
			}
		}

		

	}
	private function mailRed($eposta, $isim,$redSebep){
		$dosya = new dosya();
		$mailIcerik = $dosya->Read($this->Area->AreaStorage.'Files','basvuruRedBildiri.html');
		$site = $_SERVER['HTTP_HOST'].$this->DocumentRoot.'/Giris';
		$bilgi = array('{{isim}}'=> $isim,'{{red_sebep}}'=> $redSebep);
		$this->mailIcerik = strtr($mailIcerik,$bilgi);
		
		$mail = new eposta();
		$mail->IsSMTP(); // enable SMTP
		$mail->SMTPDebug = 1; // hata ayiklama: 1 = hata ve mesaj, 2 = sadece mesaj
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = 'tls'; // SSL sertifikanız var ise Güvenli baglanti icin ssl satırını kullanmalısınız. SSL sertifikanız yok ise bu satırı kaldırmalısınız. Gmail , hotmail gibi mail adreslerini kullanmanız durumunda SSL kısmını TLS olarak ayarlamalısınız
		$mail->Host = $this->Site->senderMailHost;// Mail host adresiniz
		$mail->Port =  $this->Site->senderMailPort;// Standart olarak kullanmanılması gereken port. Eğer ssl sertifikası kullanıyorsanız port olarak 465 girmelisiniz.
		$mail->IsHTML(true);
		$mail->SetLanguage("tr");
		$mail->CharSet  ="utf-8";
		$mail->Username = $this->Site->senderMailAddress; // Mail adresimizin kullanicı adi
		$mail->Password =  $this->Site->senderMailPass;// Mail adresinizin şifresi
		$mail->SetFrom($this->Site->senderMailAddress, $this->Site->senderMailHeader); // Mail attigimizda gorulecek ismimiz
		$mail->AddAddress($eposta); // Maili gonderecegimiz kisi yani alici
		$mail->Subject = 'FreedomHunters Başvurun Red !'; // Konu basligi
		$mail->Body = $this->mailIcerik; // Mailin icerigi
		if(!$mail->Send()){
			return(FALSE);
		} else {
			return(TRUE);
		}
	}
	
	private function mailOnaylama($eposta, $isim ,$kadi,$sifre,$gruplink){
		$dosya = new dosya();
		$mailIcerik = $dosya->Read($this->Area->AreaStorage.'Files','basvuruOnayBildiri.html');
		$site = $_SERVER['HTTP_HOST'].$this->DocumentRoot.'/Giris';
		$bilgi = array('{{isim}}'=> $isim,'{{kadi}}'=> $kadi , '{{sifre}}' => $sifre,'{{site}}' => $site,'{{grup}}' => $gruplink);
		$this->mailIcerik = strtr($mailIcerik,$bilgi);
		
		$mail = new eposta();
		$mail->IsSMTP(); // enable SMTP
		$mail->SMTPDebug = 1; // hata ayiklama: 1 = hata ve mesaj, 2 = sadece mesaj
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = 'tls'; // SSL sertifikanız var ise Güvenli baglanti icin ssl satırını kullanmalısınız. SSL sertifikanız yok ise bu satırı kaldırmalısınız. Gmail , hotmail gibi mail adreslerini kullanmanız durumunda SSL kısmını TLS olarak ayarlamalısınız
		$mail->Host = $this->Site->senderMailHost;// Mail host adresiniz
		$mail->Port =  $this->Site->senderMailPort;// Standart olarak kullanmanılması gereken port. Eğer ssl sertifikası kullanıyorsanız port olarak 465 girmelisiniz.
		$mail->IsHTML(true);
		$mail->SetLanguage("tr");
		$mail->CharSet  ="utf-8";
		$mail->Username = $this->Site->senderMailAddress; // Mail adresimizin kullanicı adi
		$mail->Password =  $this->Site->senderMailPass;// Mail adresinizin şifresi
		$mail->SetFrom($this->Site->senderMailAddress, $this->Site->senderMailHeader); // Mail attigimizda gorulecek ismimiz
		$mail->AddAddress($eposta); // Maili gonderecegimiz kisi yani alici
		$mail->Subject = 'FreedomHunters Başvurun Onaylandı !'; // Konu basligi
		$mail->Body = $this->mailIcerik; // Mailin icerigi
		if(!$mail->Send()){
			return(FALSE);
		} else {
			return(TRUE);
		}
	}
}
