<?php
namespace HizliIslem;

if(!defined('PageSecurity')){require($_SERVER['DOCUMENT_ROOT'].'/System/Classes/FileFolderSecurity.class.php');}

use \DatabaseEngine as Db;
use \SecurelySession as Oturum;
use \PHPMailer as eposta;
use \FolderFileOperations as dosya;

class Controller extends \Root\Controller{
	
	protected $ViewMethod='F';

	public function Run(){

		if($_GET){
			if(isset($this->Area->PageParams) & !empty($this->Area->PageParams)){
				$link = explode('/',$this->Area->PageParams,2);
				if(count($link) == 2){
					$islem = $link[0];
					$token = $link[1];
					$this->token_user = Db::getRow('SELECT * FROM basvuru_hizli_link INNER JOIN basvurular ON basvuru_hizli_link.basvuru_id = basvurular.id WHERE token = ?',array($token));
					if($this->token_user && $this->token_user->durum == 1){
						$this->token = $token;
						$this->basvuru_id = $this->token_user->basvuru_id;
						if($islem == 'Onay'){
							$this->Rend('HizliOnay');
						}
						else if($islem == 'Red'){
							$this->Rend('HizliRed');
						}
					}
					else{
						echo 'Token yok yada Daha önce işlem yapılmış';
					}
					
				}
				
			}
			
		}

	}

	public function wp_gruplar(){
		$gruplar = Db::get('SELECT id,grup_adi FROM wp_gruplari');
		foreach($gruplar as $grup){
			echo '<option value="'.$grup->id.'">'.$grup->grup_adi.'</option>';
		}
		
	}
	public function kullanici_bilgi(){
		echo '<ul class="list-group">
  <li class="list-group-item">'.$this->token_user->ad_soyad.'</li>
  <li class="list-group-item">'.$this->token_user->sehir.'</li>
  <li class="list-group-item">'.$this->token_user->telefon.'</li>
</ul>';
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
