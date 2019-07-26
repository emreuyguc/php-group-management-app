<?php
namespace Uyeler;

if(!defined('PageSecurity')){require($_SERVER['DOCUMENT_ROOT'].'/System/Classes/FileFolderSecurity.class.php');}

use \DatabaseEngine as Db;

class Controller extends \Root\Controller{
	
	protected $ViewMethod='C';

	public function Run(){
		$this->CustomJs = ' <!-- THIS PAGE PLUGINS -->
        <script type="text/javascript" src="'.$this->r_AssetsPath().'js/plugins/icheck/icheck.min.js"></script>
        <script type="text/javascript" src="'.$this->r_AssetsPath().'js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        <script type="text/javascript" src="'.$this->r_AssetsPath().'js/plugins.js"></script> 
        <script type="text/javascript" src="'.$this->r_AssetsPath().'js/plugins/datatables/jquery.dataTables.min.js"></script>
        <!-- END PAGE PLUGINS -->';
		$this->Rend();

	}
	
	public function uyeListele(){
		$uyelerCek = Db::get('SELECT
		ad_soyad,sehir,telefon,mail,dogum_tarihi,meslek,motor_marka_model,motor_km,grup_adi,plaka
		FROM uyeler
		INNER JOIN basvurular_onay ON uyeler.onay_id = basvurular_onay.id
		INNER JOIN basvurular ON basvurular_onay.basvuru_id = basvurular.id
		LEFT JOIN wp_gruplari ON basvurular_onay.grup_id = wp_gruplari.id');
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
												   <td>'.$uye->grup_adi.'</td>
                                                </tr>
                                               ';
			}
		}
	}

	
}
