<?php
//should've use sessions
include_once '../views/partial/header.php';
$errors = [];
try {
	require_once $_SERVER['DOCUMENT_ROOT'] . '/hospitalManagementSystem/views/partial/databaseConnection.php';

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$success = false;
		$email = $_POST['email'];
		$password = $_POST['password'];
		if (!$email) {
			$errors[] = 'Email feild cannot be empty!';
		}
		if (!$password) {
			$errors[] = 'Password feild cannot be empty!';
		}
		if (empty($errors)) {

			$statement = $pdo->prepare(" SELECT * FROM admin
        WHERE email = :email AND password = :password
        ");

			$statement->bindValue(':email', $email);
			$statement->bindValue(':password', $password);
			$statement->execute();

			$adm = $statement->fetch(PDO::FETCH_ASSOC);
			// echo '<pre>';
			// var_dump($_POST);
			// var_dump($adm);
			// exit;
			if ($adm) {
				// $_SERVER['DOCUMENT_ROOT'] .
				$location = '/hospitalManagementSystem/admin/index.php';

				echo "<script type='text/javascript'> document.location = '$location' </script>";
			} else {
				$errors[] = 'admin\'s email address or password is incorrect!';
			}
		}
	}
} catch (\Throwable $th) {
	'Error: ' . $the->getMessage();
}
?>
<?php include_once '../views/partial/navbar.php' ?>
<h1 class="text-center">Admin login</h1>

<?php if (!empty($errors)) : ?>
	<div class="alert alert-warning" role="alert">
		<ul>
			<?php foreach ($errors as $error) : ?>
				<li> <?php echo $error ?></li>
			<?php endforeach ?>
		</ul>
	</div>
<?php endif; ?>
<form class="w-75 p-3 mx-auto" action="<?php $_SERVER['DOCUMENT_ROOT'] . '/hospitalManagementSystem/home/index.php' ?>" method="POST">
	<?php include_once './signin.php' ?>
</form>

<?php
include_once '../views/partial/footer.php';
?>