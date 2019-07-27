<?php
namespace WpGruplarim;

if(!defined('PageSecurity')){require($_SERVER['DOCUMENT_ROOT'].'/System/Classes/FileFolderSecurity.class.php');}

use \DatabaseEngine as Db;

class Controller extends \Root\Controller{
	
	protected $ViewMethod='C';

	public function Run(){
		$this->CustomJs = '
		<script type=\'text/javascript\' src=\''.$this->r_AssetsPath().'js/plugins/noty/jquery.noty.js\'></script>
            <script type=\'text/javascript\' src=\''.$this->r_AssetsPath().'js/plugins/noty/layouts/topCenter.js\'></script>
            <script type=\'text/javascript\' src=\''.$this->r_AssetsPath().'js/plugins/noty/layouts/topLeft.js\'></script>
            <script type=\'text/javascript\' src=\''.$this->r_AssetsPath().'js/plugins/noty/layouts/topRight.js\'></script>      


			
            
		<script>
		
		function linkGuncelle(id){
			
			var data = { "grup_id": id};
			var url = "'.$this->r_href('GrupIslem/GrupDetay').'";

			$.post(url, data).done(
			function(msg) {
				try{
						var grupBilgi = JSON.parse(msg);
							
						var box = $("#link-pencere");
						box.modal("toggle");
						$("#guncellemetarih").text(grupBilgi.son_link_tarih);
						
						$("#link-pencere input[name=\'grup_adi\']").attr(\'value\',grupBilgi.grup_adi);
						$("#link-pencere input[name=\'grup_katilim_link\']").attr(\'value\',grupBilgi.grup_katilim_link);
						$("#link-pencere textarea[name=\'grup_aciklama\']").text(grupBilgi.grup_aciklama);
						
						
							box.find(".mb-control-yes").on("click",function(){
								var guncelLink = $("#link-pencere input[name=\'grup_katilim_link\']").val();
						
							var data = { 	"grup_id": id,
											"grup_katilim_link": guncelLink
											};
							var url = "'.$this->r_href('GrupIslem/LinkGuncelle').'";

							$.post(url, data).done(
							function(msg) {
								if(msg == 1){
									location.reload();
								}
								
									});
							});
						}
						catch(e){
							
						}
					});
		}
		
		
		function grupSil(grup_id){
        
        var box = $("#mb-remove-row");
		
			var data = { "grup_id": grup_id};
			var url = "'.$this->r_href('GrupIslem/GrupDetay').'";
			
			$.post(url, data).done(
			function(msg) {
				try{
					var grubb = JSON.parse(msg);
			
					$("#mb-remove-row grup_isim").text(grubb.grup_adi);

		box.modal(\'show\');
        
        box.find(".mb-control-yes").on("click",function(){

			var data = { "grup_id": grup_id};
			var url = "'.$this->r_href('GrupIslem/Sil').'";
			
			$.post(url, data).done(
			function(msg) {
				if(msg == 1){
					box.modal("hide");
					$("#trow_"+grup_id).hide("slow",function(){
						$(this).remove();
					});
				}
					});
					

        });
					}
					catch(e){
						
					}
					});
					
		
		
		}
		
		
		$(\'#grupKaydet\').click(function call(){
			yeni();
		});
		
		function yeni(){
			var box = $("#yeniGrupForm");
			
			var data = { 
			"grup_adi": $("#yeniGrupForm input[name=\'grup_adi\']").val(),
			"grup_aciklama": $("#yeniGrupForm  textarea[name=\'grup_aciklama\']").val(),
			"grup_katilim_link": $("#yeniGrupForm  input[name=\'grup_katilim_link\']").val()
			};
			
			var url = "'.$this->r_href('GrupIslem/YeniGrup').'";
			
			$.post(url, data).done(
				function(msg) {
						try{
										
							var eklenenGrup = JSON.parse(msg);
							console.log(eklenenGrup);
							box.modal("toggle");
							$("#gruplar > tbody > tr:first").before("<tr id=\'trow_" + eklenenGrup.id +"\'> " +
																		"<td>" + eklenenGrup.ekleme_tarih + "</td> " +
																		"<td>" + eklenenGrup.grup_adi + "</td>" + 
																		"<td>" + eklenenGrup.grup_aciklama + "</td> " +
																		"<td>" + eklenenGrup.grup_katilim_link + "</td> " +
																		"<td>" + eklenenGrup.son_link_tarih + "</td> " +
																		"<td>" +
																		"<button class=\'btn btn-success btn-rounded btn-condensed btn-sm\' onClick=\'linkGuncelle(" + eklenenGrup.id + ")\'>LİNK GÜNCELLE <span class=\'fa fa-bolt\'></span></button> " + 
																		"<a href=\' '. $this->r_href('GrupDetay','" + eklenenGrup.id + "')  .' \' class=\'btn btn-primary btn-rounded btn-condensed btn-sm\' ><span class=\'fa fa-eye\'></span></a>" + 
																		"<button class=\'btn btn-danger btn-rounded btn-condensed btn-sm\' onClick = \'grupSil(" + eklenenGrup.grup_adi + "," + eklenenGrup.id + ")\'><span class=\'fa fa-close\'></span></button>"  +
																		"</td> </tr>");
							
						}
						catch(e){
							
						}

					});
		
		}

		</script>
		
		';
		$this->Rend();

	}
	public function whatsappGrupListele(){
		
		$gruplar = Db::get('SELECT * From wp_gruplari ORDER BY ekleme_tarih DESC');
		if($gruplar){
			foreach($gruplar as $grup){
						echo '<tr id="trow_'.$grup->id.'">
                                                    <td class="text-center">'.$grup->ekleme_tarih.'</td>
                                                    <td><strong>'.$grup->grup_adi.'</strong></td>
                                                    <td>'.$grup->grup_aciklama.'</td>
													<td><a href="'.$grup->grup_katilim_link.'">'.$grup->grup_katilim_link.'</a></td>
													<td>'.$grup->son_link_tarih.'</td>
													
                                                    <td>
														<button class="btn btn-success btn-rounded btn-condensed btn-sm" onClick="linkGuncelle(\''.$grup->id.'\')" >LİNK GÜNCELLE <span class="fa fa-bolt"></span></button>
                                                        <a href="'.$this->r_href('GrupDetay',$grup->id).'" class="btn btn-primary btn-rounded btn-condensed btn-sm" ><span class="fa fa-eye"></span></a>
														<button class="btn btn-danger btn-rounded btn-condensed btn-sm" onClick="grupSil(\''.$grup->id.'\')"><span class="fa fa-close"></span></button>
													</td>
                                </tr>';
			}
		}

	}

	
}
