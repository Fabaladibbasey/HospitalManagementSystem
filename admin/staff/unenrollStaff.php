<?php
$errors = [];
$success = false;
$staff = [];
try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/hospitalManagementSystem/views/partial/databaseConnection.php';
        $id = $_POST['id'] ?? null;
        if (!$id) {
            $errors[] = "You need to specify the staff's identity";
        } else {
            $statement = $pdo->prepare("SELECT * 
        FROM staff WHERE id = :id
        ");
            $statement->bindValue(':id', $id);
            $statement->execute();
            $staff = $statement->fetch(PDO::FETCH_ASSOC);
            // echo '<pre>';
            // echo var_dump($staff);
            // exit;
            if ($staff['id']) {
                $statement = $pdo->prepare("DELETE FROM staff WHERE id = :id
        ");
                $statement->bindValue(':id', $id);
                $statement->execute();
                $success = true;
            } else {
                $errors[] = "No staff with such identity exist";
            }
        }
    }
} catch (\Throwable $th) {
    'Error: ' . $th->getMessage();
}
?>
<div class="alert alert-danger" role="alert">
    You're in a danger zone, be sure of your actions you're to perform because any done action here cannot be reverse!
</div>
<?php if ($success) : ?>
    <div class="alert alert-success" role="alert">
        You've successfully deleted a staff, <?php echo $staff['lname'] ?>
    </div>
<?php endif; ?>
<?php if (!empty($errors)) : ?>
    <div class="alert alert-warning" role="alert">
        <ul>
            <?php foreach ($errors as $error) : ?>
                <li> <?php echo $error ?></li>
            <?php endforeach ?>
        </ul>
    </div>
<?php endif; ?>
<form action="" method="POST">
    <div>
        Enter staff's identity
    </div>
    <div class="input-group mb-3">
        <input type="text" placeholder="staff's id" name='id' required>
        <button class="btn btn-danger" type="submit" id="button-addon2">Delete</button>
    </div>
</form>