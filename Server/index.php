<?php
/*

AUTHOR : EMRE UTKU UYGUC
CONTACT : emreuyguc@gmail.com

PROJECT : MOTORCYCLE GROUP WHATSAPP
*/
define('PageSecurity',TRUE);

require_once('System/Engine/Vars/all.required.vars.php');
require_once(EngineClasses);

$Site = new Site\Engine();
$Area = new Area\Engine();

$Area->SiteEngine = $Site;

require_once(EngineConfs);

$Site->Run($Area);