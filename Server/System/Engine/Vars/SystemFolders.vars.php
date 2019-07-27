<?php
if(!defined('PageSecurity')){require($_SERVER['DOCUMENT_ROOT'].'/System/Classes/FileFolderSecurity.class.php');}

define('System','System/');
define('SystemStorage',System.'Storage/');
define('SystemEngine',System.'Engine/');
define('SystemApp',System.'App/');

define('EngineVarsFolder',SystemEngine.'Vars/');
define('EngineConfsFolder',SystemEngine.'Confs/');
define('EngineClassesFolder',SystemEngine.'Classes/');

define('SystemVarsFolder',SystemApp.'Vars/');
define('SystemConfsFolder',SystemApp.'Confs/');
define('SystemComps',SystemApp.'Components/');

define('SystemLibsFolder',SystemComps.'Libs/');
define('SystemModulesFolder',SystemComps.'Modules/');
define('SystemFunctsFolder',SystemComps.'Functs/');
define('SystemClassesFolder',SystemComps.'Classes/');




