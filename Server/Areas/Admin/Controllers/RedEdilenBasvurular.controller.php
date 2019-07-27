<?php
namespace RedEdilenBasvurular;

if(!defined('PageSecurity')){require($_SERVER['DOCUMENT_ROOT'].'/System/Classes/FileFolderSecurity.class.php');}

use \DatabaseEngine as Db;

class Controller extends \Root\Controller{
	
	protected $ViewMethod='C';

	public function Run(){
		$this->CustomJs = '
		
		<script>
			
			
		function incele(basvuruId){
			var data = { "basvuruId": basvuruId};
			var url = "'.$this->r_href('BasvuruIslem/RedIncele').'";
			
		$.post(url, data).done(
			function(msg) {
						try{
							var basvuruDetay = JSON.parse(msg);
					$("input[name=\'adSoyad\']").attr(\'value\',basvuruDetay.ad_soyad);
					$("input[name=\'telefon\']").attr(\'value\',basvuruDetay.telefon);
					$("input[name=\'eposta\']").attr(\'value\',basvuruDetay.mail);
					$("input[name=\'dogumYil\']").attr(\'value\',basvuruDetay.dogum_tarihi);
					$("input[name=\'sehir\']").attr(\'value\',basvuruDetay.sehir);
					$("input[name=\'meslek\']").attr(\'value\', basvuruDetay.meslek);
					$("input[name=\'motorKm\']").attr(\'value\', basvuruDetay.motor_km);
					$("input[name=\'motorModel\']").attr(\'value\',basvuruDetay.motor_marka_model);
					$("input[name=\'motorPlaka\']").attr(\'value\',basvuruDetay.plaka);
					$("input[name=\'grupUyelik\']").attr(\'value\',basvuruDetay.uyelik_grup_adi);
					$("#redyazi").text(basvuruDetay.red_sebep);
					
						}
						catch(e){
							
						}
					});
			
        var box = $("#message-box-info");

		box.modal(\'show\');
        
 
        
    }
		</script>
		';
		$this->Rend();

	}
	
	public function RedBasvurularListe(){
		$redBasvurular = Db::get('SELECT  *,basvurular.id as bidm FROM basvurular_red INNER  JOIN basvurular ON basvurular.id = basvurular_red.basvuru_id order by red_tarih desc ');
		$sira = 0;
		if($redBasvurular){
			foreach($redBasvurular as $basvuru){
				$sira += 1;
						echo '<tr id="trow_'.$sira.'">
                                                    <td class="text-center">'.$basvuru->red_tarih.'</td>
                                                    <td><strong>'.$basvuru->ad_soyad.'</strong></td>
                                                    <td>'.$this->cepNumaraFormat($basvuru->telefon).'</td>
													<td>'.$basvuru->red_sebep.'</td>
													
                                                    <td>
                                                        <button class="btn btn-primary btn-rounded btn-condensed btn-sm" onclick="incele('.$basvuru->bidm.')"><span class="fa fa-eye"></span></button>
                                                    </td>
                                </tr>';
			}
		}
		else{
			
		}

	}
	private function cepNumaraFormat($numara){
		$numaralar = str_split($numara);
		$ulke = implode(array_slice($numaralar, 0, 2, true));
		$operator = implode(array_slice($numaralar, 2, 3, true));
		$orta3 = implode(array_slice($numaralar, 5, 3, true));
		$son4 = implode(array_slice($numaralar, 8, 4, true));
		$son = "+{$ulke} ({$operator}) {$orta3} {$son4}";
		return $son;
	}


	
}
