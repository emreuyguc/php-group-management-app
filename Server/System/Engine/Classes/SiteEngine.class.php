<?php
namespace Site;

if(!defined('PageSecurity')){require($_SERVER['DOCUMENT_ROOT'].'/System/Classes/FileFolderSecurity.class.php');}

class Engine{
	public function Run($Area){
		error_reporting(0);
		if($this->ErrorMode=='1'){
			error_reporting(E_ALL);
		}
		require_once(SystemVars);
		require_once(SystemConfs);
		require_once(SystemLibs);
		require_once(SystemModules);
		require_once(SystemFuncts);
		require_once(SystemClasses);
		
		ob_start($this->CompressMethod);

		header('Content-Type: text/html; Charset="UTF-8"');
		date_default_timezone_set('Europe/Istanbul');
		
		$Area->Run();
		
		ob_end_flush();
	}
}
