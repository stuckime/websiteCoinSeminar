<?php 

	//build-Funktion stellt die mitgegebene Seite dar
	function build($file) {
		require_once '../resources/header.php' ?>
		<main style="background-image: url('../images/board.jpg'); background-color:#000000;">

			<?php require_once './views/cities'.$file; ?>

		</main>
		<?php
		if ($file==="home.php"){
			require_once '../resources/footerMap.php';
		}else{
			require_once '../resources/footer.php';
		}
		
	}
?>