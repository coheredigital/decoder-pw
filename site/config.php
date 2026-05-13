<?php

if (!defined("PROCESSWIRE")) {
	die();
}

$config->debug = false;
$config->timezone = 'America/New_York';

$config->adminEmail = '';

$config->maxUrlSegments = 2;

$config->imageSizerOptions = array(
	'upscaling' => true,
	'cropping' => true,
	'quality' => 90,
);
$config->sessionFingerprint = 0;

$config->dbHost = '127.0.0.1';
$config->dbName = 'decoder_db';
$config->dbUser = 'decoder_nkzvrou8a4';
$config->dbPass = '2ff5e68cb5bc5ef5';
$config->dbPort = '3306';
$config->userAuthSalt = 'd582af857165f8e60514b5ef89e9f0f7';

$config->defaultAdminTheme = 'AdminThemeReno';

// $config->prependTemplateFile = '_init.php';
$config->appendTemplateFile = '_out.php';
$config->httpHosts = [
	"decoderringtheatre.com"
];