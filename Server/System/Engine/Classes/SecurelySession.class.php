<?php
if(!defined('PageSecurity')){require($_SERVER['DOCUMENT_ROOT'].'/System/Classes/FileFolderSecurity.class.php');}

class SecurelySession{
	
	public $AreaName;
	public $AreaDir;
	public $AreaPath;
	public $SiteSslMode;
	
	public function Start(){
		session_save_path($this->AreaDir);
		
		if($this->SiteSslMode == '1'){
			ini_set('session.cookie_secure', true);
		}
		ini_set('session.cookie_httponly', true);
		ini_set('session.use_only_cookies', true);
		ini_set('session.use_cookies ', true);
		ini_set('session.use_strict_mode ', true);
		ini_set('session.use_trans_sid', false);
		ini_set('session.name', $this->AreaName.'Session');
		ini_set('session.cookie_path', $this->AreaPath);
		ini_set('session.auto_start', false);
		ini_set('session.gc_maxlifetime', 86400);//1 day 172800 2day
		ini_set('session.cookie_lifetime', 60*60);// 1 day onradan degistir 
	//save path
		//session_set_cookie_params($limit, $path, $domain, $secure, true);
		//referrer , ip , browser ve id,name, path, ve her aktivede özel cookie , kontrolu şifreli
		//last activie kottrol time ile
		//otrm bittignde tempten silme yada zamanlı
		//reg id
		//is null null== düz mantk yapoılabl
		//get guvenlk
		if(!isset($_SESSION) || session_status() !== PHP_SESSION_ACTIVE){
			session_start();
		}

	}
	public function Destroy(){
		if(isset($_SESSION) || session_status() == PHP_SESSION_ACTIVE){
			session_destroy();
		}
	}
	public function Clean($Sess=NULL){
		if($Sess == NULL){
			session_unset();
		}
		else{
			unset($_SESSION[$Sess]);
		}
	}
	
	public function Check($Sess,$SessVal=NULL){
		if(!is_null($SessVal)){
			if(isset($_SESSION[$Sess]) && $_SESSION[$Sess] == $SessVal){
				return(TRUE);
			}
		}
		else{
			if(isset($_SESSION[$Sess])){
				return(TRUE);
			}
		}
	}
	
	public function Set($Sess,$SessVal=NULL){
		if(!is_null($SessVal)){
				$_SESSION[$Sess] = $SessVal;
		}
		else{
				$_SESSION[$Sess] = TRUE;
		}
	}
	public function Get($Sess){
		if(isset($_SESSION[$Sess])){
			return($_SESSION[$Sess]);
		}
	}
	

}
