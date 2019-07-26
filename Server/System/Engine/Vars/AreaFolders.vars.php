<?php
if(!defined('PageSecurity')){require($_SERVER['DOCUMENT_ROOT'].'/System/Classes/FileFolderSecurity.class.php');}

define('Areas','Areas/');

define('Controllers','/Controllers/');
define('Views','/Views/');
define('Assets','/Assets/');
define('AreaStorage','/Storage/');
define('AreaApp','/App/');

define('AreaFilesFolder',AreaStorage.'Files/');
define('AreaLogsFolder',AreaStorage.'Logs/');
define('AreaTempsFolder',AreaStorage.'Temps/');

define('AreaAccessLogs',AreaLogsFolder.'');
define('AreaErrorLogs',AreaLogsFolder.'');
define('AreaWarningLogs',AreaLogsFolder.'');

define('AreaTmpSess',AreaTempsFolder.'Sessions/');
define('AreaTmpFiles',AreaTempsFolder.'Files/');
define('AreaTmpCaches',AreaTempsFolder.'Caches/');

define('AreaVarsFolder',AreaApp.'Vars/');
define('AreaConfsFolder',AreaApp.'Confs/');
define('AreaCompsFolder',AreaApp.'Components/');

define('AreaLibsFolder',AreaCompsFolder.'Libs/');
define('AreaModulesFolder',AreaCompsFolder.'Modules/');
define('AreaFunctsFolder',AreaCompsFolder.'Functs/');
define('AreaClassesFolder',AreaCompsFolder.'Classes/');

define('MainControllers',Controllers.'MainControllers/');
define('ChangerControllers',Controllers.'ChangerControllers/');
define('PartialControllers',Controllers.'PartialControllers/');
define('SinglePageControllers',Controllers.'SinglePageControllers/');
define('FullPageControllers',Controllers.'FullPageControllers/');

define('MainViews',Views.'MainViews/');
define('ChangerViews',Views.'ChangerViews/');
define('PartialViews',Views.'PartialViews/');
define('SinglePageViews',Views.'SinglePageViews/');
define('FullPageViews',Views.'FullPageViews/');