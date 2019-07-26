<?php
namespace AktifBasvurular;

if(!defined('PageSecurity')){require($_SERVER['DOCUMENT_ROOT'].'/System/Classes/FileFolderSecurity.class.php');}

use \DatabaseEngine as Db;

class Controller extends \Root\Controller{
	
	protected $ViewMethod='C';

	public function Run(){
		$this->CustomJs = '
		<script>

	
	function onayPencere(bidm){
					
		var data = { "basvuruId": bidm};
		var url = "'.$this->r_href('BasvuruIslem/Incele').'";
			
		$.post(url, data).done(
			function(msg) {
						try{
							var basvuruDetay = JSON.parse(msg);
							var url = "'.$this->r_href('BasvuruIslem/GrupCek').'";
							var data = {"1":1};	
							$.post(url,data).done(
								function(msg) {
											try{
												var gruplar = JSON.parse(msg);
												var gruplarDizi = [];
												for(var grup in gruplar){
													gruplarDizi.push(\'<option value="\' + (gruplar[grup].id) + \'">\' + (gruplar[grup].grup_adi) + \'</option>\');
												}
												$(\'#wpGruplar\').html(gruplarDizi);
												
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
												$("input[name=\'onayWpGrup\']").attr(\'value\',basvuruDetay.grupAdi);
												$("#basvuruId").attr(\'value\',basvuruDetay.id);	
												
												var box = $("#message-box-info");
												box.modal("show");
											}
											catch(e){
												
											}
										});
						}
						catch(e){
							
						}
					});

	}
	function basvuru_onay(){

	var btn = $("#gonderBtn");
	var spinner = btn.attr("data-loading-text");
	btn.html(spinner);
   
		var kaydedilenWpGrup = $(\'#wpGruplar\').val();
		var basvuruId = $("#basvuruId").val();

			var data = { "basvuruId": basvuruId,
						"kaydedilenWpGrup" : kaydedilenWpGrup
						};
			
			var url = "'.$this->r_href('BasvuruIslem/Onay').'";
			
			$.post(url, data).done(
			function(msg) {
				if(msg == 1){
					btn.html("Onaylandı ve Mail Gönderildi");
					setTimeout(function() {
						var box = $("#message-box-info");
						box.modal("hide");
						$("#trow_"+basvuruId).hide("slow",function(){
							$(this).remove();
						});
					  }, 1000);
					
					
				}
				else{
					btn.html("Bir Hata olustu Mail Gönderilemedi");
					setTimeout(function() {
						var box = $("#message-box-info");
						box.modal("hide");
						$("#trow_"+basvuruId).hide("slow",function(){
							$(this).remove();
						});
					  }, 1000);
				}
					});
				
    }
	
	
	function redPencere(bidm){
		var data = { "basvuruId": bidm};
		var url = "'.$this->r_href('BasvuruIslem/Incele').'";
			
		$.post(url, data).done(
			function(msg) {
						try{
							var basvuruDetay = JSON.parse(msg);
							$("#redbasvuruId").attr(\'value\',basvuruDetay.id);	
							$("#mb-remove-row basvuru_isim").text(basvuruDetay.ad_soyad);
							
							var box = $("#mb-remove-row");
							box.modal("show");
						}
						catch(e){
							
						}
					});
	}
	function basvuru_red(){
			var redbasvuruId = $("#redbasvuruId").val();
			var redSebep = $(\'textarea[name="redSebep"]\').val();
			var data = { "basvuruId": redbasvuruId,
						"redSebep" : redSebep
						};
			var url = "'.$this->r_href('BasvuruIslem/Red').'";
			$.post(url, data).done(
			function(msg) {
				if(msg == 1){
					var box = $("#mb-remove-row");
					box.modal("hide");
					$("#trow_"+redbasvuruId).hide("slow",function(){
						$(this).remove();
						$(\'textarea[name="redSebep"]\').val(\'\');
					});
				}
				else{
					console.log(msg);
				}
					});

    }

		</script>
	
';
		$this->Rend();

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
	private function yasHesap($yil){
		return (date("Y") - $yil).' ('.$yil.')';
	}
	public function aktifBasvurularListe(){
		$aktifBasvurular = Db::get('SELECT  *,basvurular.id as bidm FROM basvurular 

LEFT JOIN basvurular_onay ON basvurular.id = basvurular_onay.basvuru_id 
LEFT JOIN basvurular_red ON basvurular.id = basvurular_red.basvuru_id

WHERE basvurular_onay.basvuru_id is NULL and basvurular_red.basvuru_id is NULL ORDER BY basvuru_tarih DESC');
		
		if($aktifBasvurular){
			foreach($aktifBasvurular as $basvuru){
				
						echo '<tr id="trow_'.$basvuru->bidm.'">
                                                    <td class="text-center">'.$basvuru->basvuru_tarih.'</td>
                                                    <td><strong>'.$basvuru->ad_soyad.'</strong></td>
                                                    <td>'.$this->cepNumaraFormat($basvuru->telefon).'</td>
                                                    <td>'.$this->yasHesap($basvuru->dogum_tarihi).'</td>
                                                    <td>'.$basvuru->sehir.'</td>
													<td>'.$basvuru->meslek.'</td>
													<td>'.$basvuru->motor_marka_model.'</td>
													<td>'.$basvuru->plaka.'</td>
													<td>'.$basvuru->motor_km.'</td>
													
                                                    <td>
                                                        <button class="btn btn-success btn-rounded btn-condensed btn-sm"  onclick="onayPencere(\''.$basvuru->bidm.'\');"><span class="fa fa-check"></span></button>
                                                        <button class="btn btn-danger btn-rounded btn-condensed btn-sm" onclick="redPencere(\''.$basvuru->bidm.'\');"><span class="fa fa-times"></span></button>
                                                    </td>
                                </tr>';
			}
		}
		else{
			
		}

		
	}
	

	
}
