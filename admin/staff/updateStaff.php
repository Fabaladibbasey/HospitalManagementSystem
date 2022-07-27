<?php

try {
    $id = $_GET['id'];
    if (!$id && $_SERVER["REQUEST_METHOD"] != "POST") {
        // header('Location: index.php?req=list_staffs');
        echo "<script type='text/javascript'> document.location = 'index.php?req=list_staff&id=$id'; </script>";
        exit;
    }
    require_once $_SERVER['DOCUMENT_ROOT'] . '/hospitalManagementSystem/views/partial/databaseConnection.php';
    $pdo->beginTransaction();
    $statement = $pdo->prepare("
    SELECT * FROM staff
    WHERE id = :id
    ");
    $statement->bindValue(':id', $id);
    $statement->execute();
    $staff = $statement->fetch(PDO::FETCH_ASSOC);
    $pdo->commit();

    $staff_fname = $staff['fname'];
    $staff_lname = $staff['lname'];
    $staff_username = $staff['username'];
    $staff_email = $staff['email'];
    $staff_specialization = $staff['specialization'];
    $staff_salary = $staff['salary'];
    $staff_password = $staff['password'];
    //update
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $staff_fname = $_POST['staff_fname'];
        $staff_lname = $_POST['staff_lname'];
        $staff_username = $_POST['staff_username'];
        $staff_email = $_POST['staff_email'];
        $staff_specialization = $_POST['staff_specialization'];
        $staff_salary = $_POST['staff_salary'];
        $staff_password = $_POST['staff_password'];
        $staff_id = $_POST['staff_id'];

        $pdo->beginTransaction();
        $statement = $pdo->prepare("
        UPDATE staff SET
        fname=:fname, lname=:lname, username=:username ,password=:password, email=:email, specialization=:specialization, salary=:salary
        WHERE id = :id
        ");
        // echo '<h1> this is an id: ' . $staff_id . '</h1>';
        // echo '<pre>';
        // var_dump($_SERVER);
        // exit;
        $statement->bindValue('fname', $staff_fname);
        $statement->bindValue('lname', $staff_lname);
        $statement->bindValue('username', $staff_username);
        $statement->bindValue('email', $staff_email);
        $statement->bindValue('password', $staff_password);
        $statement->bindValue('specialization', $staff_specialization);
        $statement->bindValue('salary', $staff_salary);
        $statement->bindValue('id', $staff_id);
        $statement->execute();
        $pdo->commit();
        // $location = $_SERVER['SCRIPT_NAME'];
        // header("Location: index.php?req=list_staffs&id=$id");
        echo "<script type='text/javascript'> document.location = 'index.php?req=list_staff&id=$id'; </script>";
    }
} catch (\Throwable $th) {
    echo 'Error: ' . $th->getMessage();
}

?>

<form action="<?php $_SERVER['DOCUMENT_ROOT'] . '/hospitalManagementSystem/admin/staff/updateStaff.php' ?>" method="POST">
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/hospitalManagementSystem/admin/staff/formStaff.php' ?>
    <input type="hidden" name="staff_id" value="<?php echo $_GET['id'] ?>">
    <button type="submit" class="btn btn-primary">Save</button>
</form>