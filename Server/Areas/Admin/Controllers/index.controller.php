<?php
namespace index;

if(!defined('PageSecurity')){require($_SERVER['DOCUMENT_ROOT'].'/System/Classes/FileFolderSecurity.class.php');}

use \DatabaseEngine as Db;

class Controller extends \Root\Controller{
	
	protected $ViewMethod='C';

	public function Run(){

		$this->Rend();

	}
	
	public function aktifBasvuruSayi(){

		$basvuru = Db::getRow('SELECT  count(*) as sayi,basvurular.id as bidm FROM basvurular 

LEFT JOIN basvurular_onay ON basvurular.id = basvurular_onay.basvuru_id 
LEFT JOIN basvurular_red ON basvurular.id = basvurular_red.basvuru_id

WHERE basvurular_onay.basvuru_id is NULL and basvurular_red.basvuru_id is NULL');
		echo $basvuru->sayi;
	}
	public function redBasvuruSayi(){

		
		$basvuru = Db::getRow('SELECT  count(*) as sayi,basvurular.id as bidm FROM basvurular_red INNER  JOIN basvurular ON basvurular.id = basvurular_red.basvuru_id ');
		echo $basvuru->sayi;

	}
	public function onayBasvuruSayi(){

		
		$basvuru = Db::getRow('SELECT  count(*) as sayi,basvurular.id as bidm FROM basvurular 
INNER JOIN basvurular_onay ON basvurular.id = basvurular_onay.basvuru_id
INNER JOIN wp_gruplari ON basvurular_onay.grup_id = wp_gruplari.id');
		echo $basvuru->sayi;

	}
	public function wpGrupSayi(){

		$gruplar = Db::getRow('SELECT count(*) as sayi from wp_gruplari');
		echo $gruplar->sayi;

	}
	
}
