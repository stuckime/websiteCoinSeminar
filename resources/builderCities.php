<?php

	//build-Funktion stellt die mitgegebene Seite dar
	function buildCity($file) {
		session_start();
		$_SESSION['city'] = $file;
		require_once './resources/headerCities.php' ?>
		<main style="background-image: url('../images/board.jpg'); background-color:#000000;">
			
			<?php require_once './views/cities/city.php'?>

		</main>
		

		<?php require_once './resources/footer.php';

		
	}
?>