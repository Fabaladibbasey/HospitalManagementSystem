  <?php
	$pdo = new PDO('mysql:host=localhost;dbname=hospitalManagementSystem', 'root', '');
	//set the PDO error mode to exception
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	?>