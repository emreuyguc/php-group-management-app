<?php
if(!defined('PageSecurity')){require($_SERVER['DOCUMENT_ROOT'].'/System/Classes/FileFolderSecurity.class.php');}

class FolderFileOperations{
	
	public function NewFile($Folder,$File){
		$FilePath = $Folder.'/'.$File;
		if(!$this->CheckFile($Folder,$File)){
				$this->NewFolder($Folder);
				$Handle = fopen($FilePath, 'w');
				if($Handle){
					fclose($Handle);
					return(1);
				}
			}
	}
	
	public function CheckFile($Folder,$File){
		$FilePath = $Folder.'/'.$File;
		if(file_exists($FilePath)){
			return(1);
		}
	}
	
	public function RemoveFile($Folder,$File){
		$FilePath = $Folder.'/'.$File;
		if($this->CheckFile($Folder,$File)){
				$Handle = unlink($FilePath);
				if($Handle){
					return(1);
				}
			}
	}	
	
	public function NewFolder($FolderPath){
		if(!$this->CheckFolder($FolderPath)){
			$Handle = mkdir($FolderPath);
			if($Handle){
				return(1);
			}
		}
	}
	
	public function CheckFolder($FolderPath){
		if(is_dir($FolderPath)){
			return(1);
		}
	}

	public function RemoveFolder($FolderPath){
		if($this->CheckFolder($FolderPath)){
			$Files = array_slice(scandir($FolderPath), 2); 
			foreach($Files as $File){
				if(!is_dir($FolderPath.'/'.$File)){
					$this->RemoveFile($FolderPath,$File);	
				}
				else{
					$this->RemoveFolder($FolderPath.'/'.$File);
				}
			}
			$Handle= rmdir($FolderPath);
			if($Handle){
				return(1);
			}
		}
	}
	
	public function Write($Folder,$File,$Data,$Mode = 'w'){
		$this->NewFolder($Folder);
		$Handle = fopen($Folder.'/'.$File,$Mode);
		if($Handle){
			$Write = fwrite($Handle,$Data);
			if($Write){
				fclose($Handle);
				return(1);
			}
		}
	}
	
	public function Read($Folder,$File){
		$CheckFile = $this->CheckFile($Folder,$File);
		if($CheckFile){
			$Handle = file_get_contents($Folder.'/'.$File);
			if($Handle){
				return($Handle);
			}
		}
	}
	
	public function ReadLines($Folder,$File){
		$CheckFile = $this->CheckFile($Folder,$File);
		if($CheckFile){
			$Handle = fopen($Folder.'/'.$File,'r');
			if($Handle){
				return(fgets($Handle));
				fclose($Handle);
			}
		}
	}
	
	public function RenameFile(){
	}
	
	public function RenameFolder(){
	}
	
	public function BackupFile(){
	}
	
	public function BackupFolder(){
	}
	
	public function CopyFile(){
	}
	
	public function CopyFolder(){
	}
}