<?php
namespace Root;

if(!defined('PageSecurity')){require($_SERVER['DOCUMENT_ROOT'].'/System/Classes/FileFolderSecurity.class.php');}

class Controller {
	public function __construct($AreaEngine){
		$this->Area = $AreaEngine;
		$this->Site = $this->Area->SiteEngine;
		$this->DocumentRoot = $this->Area->Router->DocumentRoot;
	}

	protected function Rend($View = NULL){
		$ViewFolder = $this->Area->Views;
		if(is_null($View)){
			$ControllerName = explode('\\',get_class($this));
			$View = $ControllerName[0];
		}
		if($this->ViewMethod=='M'){
			$ViewFolder .= 'MainViews/';
		}
		$ViewFile = $ViewFolder.$View.$this->Area->ViewFileSeperator.$this->Area->PageFileExtension;

		if(file_exists($ViewFile)){
			$this->ViewRender($ViewFile);
		}
		else{
			$this->ViewFileNotFound($ViewFile);
		}
	}
	
	protected function GoHome(){
		$this->Area->Router->GoHome();
	}
	protected function GoArea($Area,$OtherGetVars=NULL){
		$this->Area->Router->GoArea($Area,$OtherGetVars);
	}
	protected function Go($Page=NULL,$OtherGetVars=NULL){
		$this->Area->Router->Go($Page,$OtherGetVars);
	}
	
	
	protected function IncludeCustomCss(){
		if(isset($this->Area->PageController->CustomCss)){
			echo($this->Area->PageController->CustomCss);
		}
	}
	protected function IncludeCustomJs(){
		if(isset($this->Area->PageController->CustomJs)){
			echo($this->Area->PageController->CustomJs);
		}
	}
	
	protected function e_href($Page,$OtherGetVars=NULL){
		if($OtherGetVars!=''){
			$OtherGetVars = $this->Area->UrlParamsExpVal.$OtherGetVars;
		}
		if($this->Area->AreaUrl == ''){
			$href = $this->DocumentRoot.$this->Area->UrlParamsExpVal.$Page.$OtherGetVars;
		}
		else{
			$href = $this->DocumentRoot.$this->Area->UrlParamsExpVal.$this->Area->AreaUrl.$this->Area->UrlParamsExpVal.$Page.$OtherGetVars;
		}
		echo($href);
	}	
	protected function r_href($Page,$OtherGetVars=NULL){
		if($OtherGetVars!=''){
			$OtherGetVars = $this->Area->UrlParamsExpVal.$OtherGetVars;
		}
		if($this->Area->AreaUrl == ''){
			$href = $this->DocumentRoot.$this->Area->UrlParamsExpVal.$Page.$OtherGetVars;

		}
		else{
			$href = $this->DocumentRoot.$this->Area->UrlParamsExpVal.$this->Area->AreaUrl.$this->Area->UrlParamsExpVal.$Page.$OtherGetVars;
		}
		return($href);
	}
	
	protected function AssetsPath($subPath=''){
		if($subPath != ''){
			echo($this->DocumentRoot.$this->Area->UrlParamsExpVal.$this->Area->Assets.$subPath.$this->Area->UrlParamsExpVal);
		}
		else{
			echo($this->DocumentRoot.$this->Area->UrlParamsExpVal.$this->Area->Assets);
		}
	}
	
	protected function StoragePath($subPath = NULL){
		if($subPath != NULL){
			echo($this->DocumentRoot.$this->Area->UrlParamsExpVal.$this->Area->AreaStorage.$subPath.$this->Area->UrlParamsExpVal);
		}
		else{
			echo($this->DocumentRoot.$this->Area->UrlParamsExpVal.$this->Area->AreaStorage);
		}
	}
	
	protected function r_StoragePath($subPath = NULL){
		if($subPath != NULL){
			return($this->DocumentRoot.$this->Area->UrlParamsExpVal.$this->Area->AreaStorage.$subPath.$this->Area->UrlParamsExpVal);
		}
		else{
			return($this->DocumentRoot.$this->Area->UrlParamsExpVal.$this->Area->AreaStorage);
		}
	}
	
	protected function r_AssetsPath($subPath=''){
		if($subPath != ''){
			return($this->DocumentRoot.$this->Area->UrlParamsExpVal.$this->Area->Assets.$subPath.$this->Area->UrlParamsExpVal);
		}
		else{
			return($this->DocumentRoot.$this->Area->UrlParamsExpVal.$this->Area->Assets);
		}
	}
	
	protected function RunController($ControllerName,$ControllerFolder = NULL){
		$Controller = $this->Area->IncludeController($ControllerName,$ControllerFolder);
		$Controller->Run();
	}
	protected function IncludeController($ControllerName,$ControllerFolder = NULL){
		$Controller = $this->Area->IncludeController($ControllerName,$ControllerFolder);
		Return($Controller);
	}
	
	protected function AreaTitle(){
		echo($this->Area->AreaTitle);
	}
	protected function FullTitle(){
		if(isset($this->Area->PageTitle)){
			$Title = $this->Area->AreaTitle.' - '.$this->Area->PageTitle;
		}
		else{
			$Title = $this->Area->AreaTitle;
		}
		echo($Title);
	}
	protected function PageTitle(){
		echo($this->Area->PageTitle);
	}
	
	private function ViewRender($ViewFile){//buraya method gelebilir argse
		switch($this->ViewMethod){
			case $this->Area->ChangerMethodVars[0]:
				$this->IncludeChangerPage($ViewFile);
			break;
			
			case $this->Area->FullPageMethodVars[0]:
				$this->IncludeFullPage($ViewFile);
			break;
			
			case $this->Area->SinglePageMethodVars[0]:
				$this->IncludeSinglePage($ViewFile);
			break;
			
			case $this->Area->PartialMethodVars[0]:
				$this->IncludePartial($ViewFile);
			break;
			
			case 'M':
				$this->IncludeMainView($ViewFile);
			break;
			
			default:
				$this->ControllerViewMethodError($ViewFile);
			break;
		}
	}
	private function ControllerViewMethodError($View){
		$this->GoArea($this->Area->Areas['UrlVar']['Error'],$this->Area->Areas['HomePage']['Error'].$this->Area->UrlParamsExpVal.'GelistiriciHatasi/ControllerViewMethodError/'.$View);
	}
	private function ViewFileNotFound($View){
		$this->GoArea($this->Area->Areas['UrlVar']['Error'],$this->Area->Areas['HomePage']['Error'].$this->Area->UrlParamsExpVal.'GelistiriciHatasi/ViewFileNotFound/'.$View);
	}
	
	private function IncludeChangerPage($View){
		$this->Area->HeadController->Run();
		$this->Area->NavBarController->Run();
		include_once($View);
		$this->Area->FootBarController->Run();
		$this->Area->FootController->Run();
	}
	private function IncludeSinglePage($View){
		$this->Area->HeadController->Run();
		include_once($View);
		$this->Area->FootController->Run();
	}
	protected function IncludeFullPage($View){
		include_once($View);
	}
	private function IncludeMainView($View){
		include_once($View);
	}
	private function IncludePartial($View,$Area=NULL){
		if($Area != NULL){
			if($this->Area->Areas['Folder'][$Area]){
				include(Area.$this->Area->Areas['Folder'][$Area].PartialViews.$View.$this->Area->ViewFileSeperator.$this->Area->PageFileExtension);
			}
		}
		else{
			include($this->Area->AreaFolder.PartialViews.$View.$this->Area->ViewFileSeperator.$this->Area->PageFileExtension);
		}
	}
	
}