<?php
$p_fname = '';
$p_lname = '';
$p_email = '';
$p_phone = '';
$message = '';
$errors = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $p_fname = $_POST['p_fname'];
    $p_lname = $_POST['p_lname'];
    $p_email = $_POST['p_email'];
    $p_phone = $_POST['p_phone'];
    $message = $_POST['message'];
    $date = date('y-m-d h:m:s');
    if (!$p_fname) {
        $errors[] = "first name cannot be empty!";
    }
    if (!$p_lname) {
        $errors[] = "last name cannot be empty!";
    }
    if (!$p_email) {
        $errors[] = "email cannot be empty!";
    }
    if (!$p_phone) {
        $errors[] = "phone number cannot be empty!";
    }
    if (!$message) {
        $errors[] = "message cannot be empty!";
    }
    try {
        if (empty($errors)) {
            require_once '../views/partial/databaseConnection.php';
            $pdo->beginTransaction();
            $statement = $pdo->prepare("INSERT INTO contact
        (
            fname, lname, email, phone, message, date
        )
        VALUES (
            :fname, :lname, :email, :phone, :message, :date
        )
        ");
            $statement->bindValue(':fname', $p_fname);
            $statement->bindValue(':lname', $p_lname);
            $statement->bindValue(':email', $p_email);
            $statement->bindValue(':phone', $p_phone);
            $statement->bindValue(':message', $message);
            $statement->bindValue(':date', $date);
            $statement->execute();
            $pdo->commit();
            header("Location: ../../../hospitalManagementSystem/home/");
        }
    } catch (\Throwable $th) {
        'Error: ' . $th->getMessage();
    }
}
?>

<?php include_once '../views/partial/header.php' ?>
<?php include_once '../views/partial/navbar.php' ?>
<p class="text-center">Contact the admin</p>
<?php include_once '../views/partial/errorMessage.php' ?>
<form action="" method="POST">
    <div class="mb-3">
        <label for="p_fname" class="form-label">first name</label>
        <input type="text" class="form-control" id="p_fname" name="p_fname" value="<?php echo $p_fname ?>">
    </div>
    <div class="mb-3">
        <label for="p_lname" class="form-label">last name</label>
        <input type="text" class="form-control" id="p_lname" name="p_lname" value="<?php echo $p_lname ?>">
    </div>

    <div class="mb-3">
        <label for="p_email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="p_email" name="p_email" value="<?php echo $p_email ?>">
    </div>
    <div class="mb-3">
        <label for="p_phone" class="form-label">Phone number</label>
        <input type="text" class="form-control" id="p_phone" name="p_phone" value="<?php echo $p_phone ?>">
    </div>
    <div class="form-floating">
        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="message"><?php echo $message ?></textarea>
        <label for="floatingTextarea2">Comments</label>
    </div>
    <button class="form-control btn btn-primary" type="submit">Send query</button>
</form>

<?php include_once '../views/partial/footer.php' ?>