<?php
	switch ($_SESSION['language']) {
	case 'en':
		include_once $path."langs/english.php";
		break;
	case 'العربية':
		include_once $path."langs/arabic.php";
		break;
	case 'es':
		include_once $path."langs/spanish.php";
		break;
	default:
		$_SESSION['language'] = "en";
		include_once $path."langs/english.php";
		break;
	}
?>