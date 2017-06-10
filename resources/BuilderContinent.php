<?php 

	//build-Funktion stellt die mitgegebene Seite dar
	function buildContinent($file) {
		session_start();
		$param = explode('-', trim($_SERVER['REQUEST_URI'], '-'));
		$_SESSION['contiennt'] = $param[0];
		$_SESSION['activity'] = $param[1];
		require_once '../resources/header.php' ?>
		<main style="background-image: url('../images/board.jpg'); background-color:#000000;">

			<?php require_once './views/cities/continent.php'; ?>

		</main>
		<?php
		require_once '../resources/footer.php';
		
	}
?>