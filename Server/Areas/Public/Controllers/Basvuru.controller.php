<?php
namespace Basvuru;

if(!defined('PageSecurity')){require($_SERVER['DOCUMENT_ROOT'].'/System/Classes/FileFolderSecurity.class.php');}

use \Notifications as Uyari;
use \DatabaseEngine as Db;
use \PHPMailer as eposta;
use \FolderFileOperations as dosya;

class Controller extends \Root\Controller{
	
	protected $ViewMethod='F';

	public function Run(){
		$this->uyari = new Uyari;
		
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
				isset($_POST['motorKm'])  &&
				isset($_POST['kural1'])  &&
				isset($_POST['kural2'])  &&
				isset($_POST['kural3'])  &&
				isset($_POST['kural4'])
				
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

				
					$onayKontrol = Db::getRow('SELECT count(basvurular.id) AS eslesme FROM basvurular INNER JOIN basvurular_onay ON basvurular.id = basvurular_onay.basvuru_id WHERE telefon = ? ', array($telefon));
					if($onayKontrol->eslesme){
						$this->uyari->Set('uyari','<div class="alert alert-info" role="alert">
                                
                                <strong>Zaten Onaylanmış Başvurun Bulunmakta ! </strong> Amacın Ne Kocum Senin :)
                            </div>');
					}
					else{
												$redKontrol = Db::getRow('SELECT  COUNT(*) as eslesme,basvurular.id as bidm FROM basvurular 

LEFT JOIN basvurular_onay ON basvurular.id = basvurular_onay.basvuru_id 
LEFT JOIN basvurular_red ON basvurular.id = basvurular_red.basvuru_id

WHERE telefon = ? AND (basvurular_onay.basvuru_id is NULL and basvurular_red.basvuru_id is NULL)', array($telefon));
						
						
						if($redKontrol->eslesme){
							$this->uyari->Set('uyari','<div class="alert alert-danger" role="alert">
									
									<strong>Bu Telefon Numarasıyla Başvuru Zaten Yapılmış !</strong> Önceki Başvurunun Onay bildirisini bekle. 
								</div>');
						}
						else{
							$ekle = Db::exec('INSERT INTO 
							`basvurular` (`id`, `ad_soyad`, `telefon`, `mail`, `dogum_tarihi`, `sehir`, `meslek`, `plaka`, `motor_marka_model`, `motor_km`, `uyelik_grup_adi`) VALUES 
							(NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);
							',array($adSoyad,$telefon,$email,$dogumTarihi,$sehir,$meslek,$plaka,$motorMarkaModel,$motorKm,$grupAdi));
							if($ekle){
								$yonetici = Db::getRow('SELECT mail FROM yoneticiler WHERE yetki = 1 LIMIT 1');
								
								$karakterler =  array_merge(range('A', 'Z'),range('a', 'z'),range(0, 9));
								shuffle($karakterler);
								$rastgeleSifre = implode(array_slice($karakterler,0,8));
								$dynamicToken = md5($telefon.$rastgeleSifre);
								
								$onay_link = $_SERVER['HTTP_HOST'].$this->DocumentRoot.'/Yonetim/HizliIslem/Onay/'.$dynamicToken;
								$red_link = $_SERVER['HTTP_HOST'].$this->DocumentRoot.'/Yonetim/HizliIslem/Red/'.$dynamicToken;
								
								$idCek = Db::getRow('SELECT id FROM basvurular WHERE telefon = ?',array($telefon));
								$basvuru_hizli_link = Db::exec('INSERT INTO `basvuru_hizli_link` (`basvuru_id`, `token`) VALUES (?, ?);',ARRAY($idCek->id,$dynamicToken));
								
								$mailGonder = $this->mailGonderYonetici($yonetici->mail,array($adSoyad,$telefon,$email,$dogumTarihi,$sehir,$meslek,$plaka,$motorMarkaModel,$motorKm,$grupAdi),$onay_link,$red_link);
								//yonetici mail gonderme işlemi için
								
								$this->uyari->Set('uyari','<div class="alert alert-success" role="alert">
									  
										<strong>Başvuru Başarılı !</strong> Bilgilerin sisteme Onaylanmak Üzere Kayıt Edildi. Onaylandığı durumda Sms veya Email ile Bilgilendirileceksin.
									</div>');
							}
							else{
								$this->uyari->Set('uyari','<div class="alert alert-danger" role="alert">
									   
										<strong>Sistemde Bir Hata oluştu!</strong> Başvuru kaydın maalesef alınamadı. Lütfen daha sonra tekrar dene. 
									</div>');
							}
							
						}
						
					}

					
					
				
				

			}
			else{
				$this->uyari->Set('uyari','<div class="alert alert-warning" role="alert">
                                
                                <strong>Lütfen Bilgileri Boş Geçme!</strong>  Bazı bilgilerin boş olduğunu tespit ettik , başvuru kaydın ve onay için lütfen geçerli bilgiler gir.
                            </div>');
			}
		}
		
		$this->Rend('BasvuruForm');

	}

	public function mailGonderYonetici($eposta,$basvuru_bilgiler,$onay,$red){
		$dosya = new dosya();
		$mailIcerik = $dosya->Read($this->Area->AreaStorage.'Files','yeniBasvuruBildiri.html');
		
		$bilgi = array(
		'{{ad_soyad}}'=> $basvuru_bilgiler[0],
		'{{sehir}}'=> $basvuru_bilgiler[4], 
		'{{meslek}}' => $basvuru_bilgiler[5],
		'{{yas}}' => $basvuru_bilgiler[3],
		'{{telefon}}' => $basvuru_bilgiler[1],
		'{{eposta}}' => $basvuru_bilgiler[2],
		'{{motor_marka_model}}' => $basvuru_bilgiler[7],
		'{{motor_km}}' => $basvuru_bilgiler[8],
		'{{motor_plaka}}' => $basvuru_bilgiler[6],
		'{{uyelik}}' => $basvuru_bilgiler[9],
		'{{basvuru_tarih}}' => 0,
		'{{onay_link}}' => $onay,
		'{{red_link}}' => $red
		);
		
		$this->mailIcerik = strtr($mailIcerik,$bilgi);
		
		$mail = new eposta();
		$mail->IsSMTP(); // enable SMTP
		$mail->SMTPDebug = 0; // hata ayiklama: 1 = hata ve mesaj, 2 = sadece mesaj
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
		$mail->Subject = 'FreedomHunters Yeni Başvuru !'; // Konu basligi
		$mail->Body = $this->mailIcerik; // Mailin icerigi
		if(!$mail->Send()){
			return(FALSE);
		} else {
			return(TRUE);
		}
	}
}
