<?php
include_once '../views/partial/header.php';
?>
<?php include_once '../views/partial/navbar.php' ?>
<form class="w-75 p-3 mx-auto" action="" method="POST">
	<h1 class="text-center">Patient's login</h1>
	<?php include_once './signin.php' ?>
</form>
<div class="alert alert-success">
	Don't have account <span><a href="#">Register here</a></span>
</div>
<?php
include_once '../views/partial/footer.php';
?>