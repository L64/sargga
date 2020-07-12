<?php
	switch ($_SESSION['language']) {
	case 'English':
		include_once $path."langs/english.php";
		break;
	case 'العربية':
		include_once $path."langs/arabic.php";
		break;
	case 'Español':
		include_once $path."langs/spanish.php";
		break;
	default:
		$_SESSION['language'] = "English";
		include_once $path."langs/english.php";
		break;
	}
?>
