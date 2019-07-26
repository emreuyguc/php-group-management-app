<?php
if(!defined('PageSecurity')){require($_SERVER['DOCUMENT_ROOT'].'/System/Classes/FileFolderSecurity.class.php');}

class Router{

	public function __construct(){
		$this->DocumentRoot = $this->GetDocumentRoot();
	}
	
	public function GetDocumentRoot(){
  		$Urls = explode('/',$_SERVER['SCRIPT_NAME']);
		array_shift($Urls);
		array_pop($Urls);
		$UrlCount = count($Urls);
		if($UrlCount >= 1){// sıkıntı olabilir
			$Folder = '';
			foreach($Urls as $Url){
				$Folder .= '/'.$Url;
			}
			if(isset($Folder) && !empty($Folder)){
				return($Folder);
			}
		}
	}
	
	private function Redirect($Url){
		header('location: '.$this->DocumentRoot.$this->UrlParamsExpVal.$Url);
	}
	
	public function GoArea($Area,$OtherGetVars=NULL){
		if($OtherGetVars!=''){
			$OtherGetVars = $this->UrlParamsExpVal.$OtherGetVars;
		}
		$this->Redirect($Area.$OtherGetVars);
		die();
	}
	
	public function GoHome(){
		$this->Redirect($this->AreaUrl);
		die();
	}
	
	public function Go($Page=NULL,$OtherGetVars=NULL){
		if($Page==NULL){
			$Page = $this->Page;
		}
		
		if($OtherGetVars!=NULL){
			$OtherGetVars = $this->UrlParamsExpVal.$OtherGetVars;
		}
		if($this->AreaUrl != ''){
			$Url = $this->AreaUrl.$this->UrlParamsExpVal.$Page.$OtherGetVars;
		}
		else{
			$Url = $Page.$OtherGetVars;
		}
		$this->Redirect($Url);
		die();
	}
	
	
}