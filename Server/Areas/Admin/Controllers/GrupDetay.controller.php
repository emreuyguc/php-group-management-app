<?php
namespace GrupDetay;

if(!defined('PageSecurity')){require($_SERVER['DOCUMENT_ROOT'].'/System/Classes/FileFolderSecurity.class.php');}

use \DatabaseEngine as Db;
use Notifications as uyari;
class Controller extends \Root\Controller{
	
	protected $ViewMethod='C';

	public function Run(){
				$this->CustomJs = '
		<script>
						$(document).ready(function(){
						  $("#araPlaka").on("keyup", function() {
							var value = $(this).val().toLowerCase();
							$("#uyeler tbody").filter(function() {
							  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
							});
						  });
						});
						
						</script>

';
		if(isset($this->Area->PageParams) && !empty($this->Area->PageParams)){
			
			$this->uyari = new uyari;

						if($_POST){
				if(
					isset($_POST['grup_adi']) &&
					isset($_POST['grup_aciklama']) &&
					isset($_POST['grup_katilim_link'])
				){
					
					//SADECE VERİ EKLERKENN BPŞ DOLU KONTROLU YYAPPP YETERLİİİ BİRDE ÖZELLİK GEREKTİREN VERİLERDE
					$ad = $_POST['grup_adi'];
					$link = $_POST['grup_katilim_link'];
					$aciklama = $_POST['grup_aciklama'];
			
					$guncel = Db::exec('UPDATE wp_gruplari 
					SET 
					grup_adi = ?,
					grup_aciklama = ?,
					grup_katilim_link = ?
					where id = ?',array($ad, $aciklama, $link, $this->Area->PageParams));
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
			$this->grup = Db::getRow('SELECT * FROM wp_gruplari WHERE wp_gruplari.id = ?',array($this->Area->PageParams));

			$this->Rend();
		}
		else{
			$this->Go('WpGruplarim');
		}
	}
	

	public function uyeListele(){
		$uyelerCek = Db::get('SELECT
		ad_soyad,sehir,telefon,mail,dogum_tarihi,meslek,motor_marka_model,motor_km,grup_adi,plaka
		FROM uyeler
		INNER JOIN basvurular_onay ON uyeler.onay_id = basvurular_onay.id
		INNER JOIN basvurular ON basvurular_onay.basvuru_id = basvurular.id
		LEFT JOIN wp_gruplari ON basvurular_onay.grup_id = wp_gruplari.id
		WHERE wp_gruplari.id = ?',array($this->Area->PageParams));
		if($uyelerCek){
			foreach($uyelerCek as $uye){
				echo ' <tr>
                                                    <td>'.$uye->ad_soyad.'</td>
                                                   <td>'.$uye->sehir.'</td>
												   <td>'.$uye->plaka.'</td>
												   <td>'.$uye->mail.'</td>
												   <td>'.$uye->telefon.'</td>
												   <td>'.$uye->dogum_tarihi.'</td>
												   <td>'.$uye->meslek.'</td>
												   <td>'.$uye->motor_marka_model.' / '.$uye->motor_km.'</td>
                                                </tr>
                                               ';
			}
		}
	}
	
}
