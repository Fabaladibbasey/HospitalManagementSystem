<?php
$enquiries = [];
$search = '';
try {

	require_once $_SERVER['DOCUMENT_ROOT'] . '/hospitalManagementSystem/views/partial/databaseConnection.php';
	$search = $_POST['search'];
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && $search) {
		$statement = $pdo->prepare(" SELECT * FROM contact
        WHERE fname LIKE :search OR lname LIKE :search OR email LIKE :search OR phone LIKE :search
        ORDER BY date DESC
        ");

		$statement->bindValue(':search', "%$search%");
		// $statement->execute();
		// $enquiries = $statement->fetchAll(PDO::FETCH_ASSOC);
		// echo '<pre>';
		// echo var_dump($enquiries);
		// exit;
	} else {
		$statement = $pdo->prepare("SELECT * FROM contact ORDER BY date DESC ");
	}
	$statement->execute();
	$enquiries = $statement->fetchAll(PDO::FETCH_ASSOC);
} catch (\Throwable $th) {
	echo 'Error: ' . $th->getMessage();
}
?>

<?php include_once '../../views/partial/header.php' ?>

<form action="" method="POST">
	<div class="input-group mb-3">
		<input type="text" class="form-control" placeholder="search quiries" name="search">
		<button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
	</div>
</form>
<?php if ($search) : ?>
	<div class="alert alert-info">
		Click search button again to navigate back
	</div>
<?php endif; ?>
<table class="table">
	<thead>
		<tr>
			<th scope="col">#</th>
			<th scope="col">fname</th>
			<th scope="col">lname</th>
			<th scope="col">email</th>
			<th scope="col">phone</th>
			<th scope="col">message</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($enquiries as $key => $enquiry) : ?>
			<tr>
				<th scope="row"><?php echo $key + 1 ?></th>
				<td><?php echo $enquiry['fname'] ?></td>
				<td><?php echo $enquiry['lname'] ?></td>
				<td><?php echo $enquiry['email'] ?></td>
				<td><?php echo $enquiry['phone'] ?></td>
				<td><?php echo $enquiry['message'] ?></td>
			</tr>
		<?php endforeach; ?>
</table>