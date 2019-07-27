<?php
namespace GrupIslem;

if(!defined('PageSecurity')){require($_SERVER['DOCUMENT_ROOT'].'/System/Classes/FileFolderSecurity.class.php');}

use \DatabaseEngine as Db;
use \SecurelySession as Oturum;

class Controller extends \Root\Controller{
	
	protected $ViewMethod='F';

	public function Run(){
		$this->YetkiliOturum = new Oturum;
		if($this->YetkiliOturum->Check('giris')){
			if($_POST){
				if($this->Area->PageParams == 'YeniGrup'){
					$grup_adi = $_POST['grup_adi'];
					$grup_aciklama = $_POST['grup_aciklama'];
					$grup_katilim_link = $_POST['grup_katilim_link'];
					
					$grupEkle = Db::exec('INSERT INTO `wp_gruplari` (`grup_adi`, `grup_aciklama`, `grup_katilim_link`, `son_link_tarih`) VALUES (?, ?, ?, ?);',ARRAY($grup_adi,$grup_aciklama,$grup_katilim_link,date("Y-m-d H:i:s") ));
					if($grupEkle){
						$grupCek = Db::getRow('SELECT * FROM wp_gruplari WHERE grup_adi = ?',array($grup_adi));
						if($grupCek){
							echo json_encode($grupCek);
						}
					}
				}
				else if($this->Area->PageParams == 'Sil'){
					$grup_id = $_POST['grup_id'];

					
					$grupSil = Db::exec('DELETE FROM `wp_gruplari` where id = ?',ARRAY($grup_id));
					if($grupSil){
						echo 1;
					}
				}
				
				else if($this->Area->PageParams == 'GrupDetay'){
					$grup_id = $_POST['grup_id'];
					
					$grupCek = Db::getRow('SELECT * FROM wp_gruplari WHERE id = ?',ARRAY($grup_id));
					if($grupCek){
						echo json_encode($grupCek);
					}
				}
				
				else if($this->Area->PageParams == 'LinkGuncelle'){
					$grup_id = $_POST['grup_id'];
					$grup_katilim_link = $_POST['grup_katilim_link'];
					
					$guncelle = Db::exec('UPDATE `wp_gruplari`  SET grup_katilim_link = ?,son_link_tarih=? WHERE id = ?',ARRAY($grup_katilim_link, date("Y-m-d H:i:s") ,$grup_id));
					if($guncelle){
						echo 1;
					}
					
					
				}	
			}
		}

		

	}
}
