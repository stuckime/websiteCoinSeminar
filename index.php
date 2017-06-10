<?php
	include_once './resources/builder.php';
	include_once './resources/builderCities.php';
	include_once './resources/builderContinent.php';

	$url = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
	if(!empty($url[1])) {
		$url[1] = strtolower($url[1]);
		//$url[1] = substr($url[1], 0, strpos($url[1], "?"));
		echo("</div></div>");

		switch($url[1]) {
			case 'namerica':
				build('namerica.php');
				break;
			case 'samerica':
				build('samerica.php');
				break;
			case 'africa':
				build('africa.php');
				break;
			case 'oceania':
				build('oceania.php');
				break;
			case 'europa':
				build('europa.php');
				break;
			case 'asia':
				build('asia.php');
				break;
			case 'infos':
				build('infos.php');
				break;
			case 'continent':
				build('continent.php');
				break;
			case 'cities':
				if (!empty($url[2])){
					
					$url[2] = strtolower($url[2]);
					buildCity($url[2]);
				}else{
					build('home.php');
				}
				
				break;	
			default:
				build('home.php');
				break;
		}
	} 
	else {
		build('home.php');
	}
?>