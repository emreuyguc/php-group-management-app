<?php
namespace Uyeler;

if(!defined('PageSecurity')){require($_SERVER['DOCUMENT_ROOT'].'/System/Classes/FileFolderSecurity.class.php');}

use DatabaseEngine as Db;

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
		$this->Rend();
	}
	
	public function uyeYazdir(){
				$uyelerCek = Db::get('SELECT
		ad_soyad,sehir,telefon,mail,dogum_tarihi,meslek,motor_marka_model,motor_km,grup_adi,plaka,onay_tarih
		FROM uyeler
		INNER JOIN basvurular_onay ON uyeler.onay_id = basvurular_onay.id
		INNER JOIN basvurular ON basvurular_onay.basvuru_id = basvurular.id
		LEFT JOIN wp_gruplari ON basvurular_onay.grup_id = wp_gruplari.id
		WHERE wp_gruplari.id = ?',array($this->Area->Session->Get('GrupId')));
		if($uyelerCek){
			foreach($uyelerCek as $uye){
				echo ' <tr>
                                                    <td>'.$uye->onay_tarih.'</td>
                                                   <td>'.$uye->ad_soyad.'</td>
												   <td>'.$uye->telefon.'</td>
												   <td>'.$uye->dogum_tarihi.'</td>
												   <td>'.$uye->sehir.'</td>
												   <td>'.$uye->meslek.'</td>
												   <td>'.$uye->plaka.'</td>
												   <td>'.$uye->motor_marka_model.'</td>
												   <td>'.$uye->motor_km.'</td>
                                                </tr>
                                               ';
			}
		}
	}
	
}
