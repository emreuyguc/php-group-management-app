<?php
namespace Area;

if(!defined('PageSecurity')){require($_SERVER['DOCUMENT_ROOT'].'/System/Classes/FileFolderSecurity.class.php');}

use \DataSecurity as Secure;
use \DeveloperWizard as Developer;
use \Router as Router;

class Engine{
	public $SiteEngine;
	
	public function Run(){
		$this->Router = new Router();
		$this->Session = new \SecurelySession();
		$this->Router->UrlParamsExpVal = $this->UrlParamsExpVal;
			
		$this->GetUrlParams();
		$this->AreaLoad();
		
		$this->Session->Start();
		
		$this->Dev = new Developer;
		$SetupCheck = $this->Dev->SetupControl();
		if($SetupCheck == FALSE && ($this->AreaKey !='Developer' || ($this->Page != 'Wizard' && $this->Page != 'Login'))){
			$this->Router->GoArea($this->Areas['UrlVar']['Developer'],'Wizard');
		}
		else if($SetupCheck == TRUE && $this->AreaKey =='Developer' && $this->Page == 'Wizard'){
			$this->Router->GoArea($this->Areas['UrlVar']['Developer']);
		}
		
		if(isset($this->Page) && !empty($this->Page)){
			$this->RunPageController($this->Page);
		}
		else{
			$this->RunPageController($this->Areas['HomePage'][$this->Area]);
		}
	}
	
	public function IncludeController($ControllerName,$ControllerFolder = NULL){
		if(!is_null($ControllerFolder)){
			$ControllerFolder .= 'Controllers'.$this->UrlParamsExpVal;
		}
		$this->ControllerFile = $this->Controllers.$ControllerFolder.$ControllerName.$this->ControllerFileSeperator.$this->PageFileExtension;

		if(file_exists($this->ControllerFile)){
			include_once($this->ControllerFile);
			$ControllerName = '\\'.ucfirst($ControllerName).'\\Controller';
				if(class_exists($ControllerName)){
					if(method_exists($ControllerName,'Run')){
						return(new $ControllerName($this));
					}
					else{
						$this->ControllerRunMethodError($ControllerName);
					}
				}
				else{
					$this->ControllerClassError($ControllerName);
				}
			}
		else{
			$this->ControllerFileNotFound($this->ControllerFile);
		}
	}
	
	private function GetUrlParams(){//request uri olabilir
		if(isset($_GET[$this->UrlParamsVar])){
			$UrlParams = explode($this->UrlParamsExpVal,Secure::Url($_GET[$this->UrlParamsVar]),2);
			if(in_array($UrlParams[0],$this->Areas['UrlVar'])){
				$this->AreaKey = $this->Areas['Folder'][array_search($UrlParams[0], $this->Areas['UrlVar'])];
				$this->AreaTitle = $this->Areas['Title'][$this->AreaKey];
				$this->Page = $this->Areas['HomePage'][$this->AreaKey];
				if(isset($UrlParams[1]) && !empty($UrlParams[1])){
					$UrlParams = explode($this->UrlParamsExpVal,$UrlParams[1],2);
					if(!is_null($UrlParams[0])){
						$this->Page = $UrlParams[0];
					}
					if(isset($UrlParams[1]) && !empty($UrlParams[1])){
						$this->PageParams = $UrlParams[1];
					}
				}
			}
			else{
				$this->AreaKey = $this->Areas['Folder']['Public'];
				$this->AreaTitle = $this->Areas['Title']['Public'];
				$this->Page = $UrlParams[0];
				if(isset($UrlParams[1]) && !empty($UrlParams[1])){
					$this->PageParams = $UrlParams[1];
				}
			}
		}
		else{
			$this->AreaKey = $this->Areas['Folder']['Public'];
			$this->AreaTitle = $this->Areas['Title']['Public'];
			$this->Page = $this->Areas['HomePage'][$this->AreaKey];
		}
	}
	
	private function AreaLoad(){
		$this->AreaFolder = Areas.$this->Areas['Folder'][$this->AreaKey];
		$this->HomePage = $this->Areas['HomePage'][$this->AreaKey];
		$this->AreaUrl = $this->Areas['UrlVar'][$this->AreaKey];
		
		$this->AreaVars = $this->AreaFolder.AreaVars;
		$this->AreaConfs = $this->AreaFolder.AreaConfs;
		$this->AreaLibs = $this->AreaFolder.AreaLibs;
		$this->AreaModules = $this->AreaFolder.AreaModules;
		$this->AreaFuncts = $this->AreaFolder.AreaFuncts;
		$this->AreaClasses = $this->AreaFolder.AreaClasses;
		$this->AreaStorage = $this->AreaFolder.AreaStorage;
		
		$this->AreaFiles =  $this->AreaFolder.AreaFilesFolder;
		$this->AreaLogs =  $this->AreaFolder.AreaLogsFolder;
		$this->AreaTemps =  $this->AreaFolder.AreaTempsFolder;
		
		$this->Controllers = $this->AreaFolder.Controllers;
		$this->Views = $this->AreaFolder.Views;
		
		$this->Assets = $this->AreaFolder.Assets;
		
		$this->Router->AreaUrl = $this->AreaUrl;
		$this->Router->Page = $this->Page;
		
		$this->Session->SiteSslMode = $this->SiteEngine->SslMode;
		$this->Session->AreaName = $this->AreaKey;
		$this->Session->AreaDir = $this->AreaFolder.AreaTmpSess;
		$this->Session->AreaPath = $this->Router->DocumentRoot.$this->UrlParamsExpVal.$this->AreaUrl;
		
		require_once($this->AreaVars);
		require_once($this->AreaConfs);
		require_once($this->AreaLibs);
		require_once($this->AreaModules);
		require_once($this->AreaFuncts);
		require_once($this->AreaClasses);
		
		$this->HeadController = $this->IncludeController($this->MainHead,'Main');
		$this->NavBarController = $this->IncludeController($this->MainNavBar,'Main');
		$this->FootBarController = $this->IncludeController($this->MainFootBar,'Main');
		$this->FootController = $this->IncludeController($this->MainFoot,'Main');
	}
	
	private function RunPageController($Controller){
		$this->PageController = $this->IncludeController($Controller);
		$this->PageController->Run();
	}
	
	private function ControllerFileNotFound($Controller){
		$this->Router->GoArea($this->Areas['UrlVar']['Error'],$this->Areas['HomePage']['Error'].$this->UrlParamsExpVal.'SayfaBulunamadi/ControllerNotFound/'.$Controller);
	}
	
	private function ControllerClassError($Controller){
		$this->Router->GoArea($this->Areas['UrlVar']['Error'],$this->Areas['HomePage']['Error'].$this->UrlParamsExpVal.'GelistiriciHatasi/ClassError/'.$Controller);
	}
	
	private function ControllerRunMethodError($Controller){
		$this->Router->GoArea($this->Areas['UrlVar']['Error'],$this->Areas['HomePage']['Error'].$this->UrlParamsExpVal.'GelistiriciHatasi/RunMethodError/'.$Controller);
	}
	
}
