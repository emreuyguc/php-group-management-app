<?php
if(!defined('PageSecurity')){require($_SERVER['DOCUMENT_ROOT'].'/System/Classes/FileFolderSecurity.class.php');}

define('EngineVars',EngineVarsFolder.'all.required.vars.php');
define('EngineConfs',EngineConfsFolder.'all.required.confs.php');
define('EngineClasses',EngineClassesFolder.'all.required.classes.php');

define('SystemVars',SystemVarsFolder.'all.required.vars.php');
define('SystemConfs',SystemConfsFolder.'all.required.confs.php');
define('SystemLibs',SystemLibsFolder.'all.required.libs.php');
define('SystemModules',SystemModulesFolder.'all.required.modules.php');
define('SystemFuncts',SystemFunctsFolder.'all.required.functs.php');
define('SystemClasses',SystemClassesFolder.'all.required.classes.php');

define('SiteEngineClass',EngineClassesFolder.'SiteEngine.class.php');
define('AreaEngineClass',EngineClassesFolder.'AreaEngine.class.php');
