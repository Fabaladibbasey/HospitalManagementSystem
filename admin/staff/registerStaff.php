<?php
$errors = [];
$staff_fname = '';
$staff_lname = '';
$staff_username = '';
$staff_email = '';
$staff_specialization = '';
$staff_salary = '';
$staff_password = '';
try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // require_once './views/partial/databaseConnection.php';

        require_once $_SERVER['DOCUMENT_ROOT'] . '/hospitalManagementSystem/views/partial/databaseConnection.php';

        $staff_fname = $_POST['staff_fname'];
        $staff_lname = $_POST['staff_lname'];
        $staff_username = $_POST['staff_username'];
        $staff_email = $_POST['staff_email'];
        $staff_specialization = $_POST['staff_specialization'];
        $staff_salary = $_POST['staff_salary'];
        $staff_password = $_POST['staff_password'];
        $staff_enrollDate = date('y-m-d h:m:s');

        // echo '<pre>';
        // var_dump($_POST);
        // echo '</pre>';
        // exit;
        if (!$staff_username) {
            $errors[] = 'username can\'t be empty';
        }
        if (!$staff_email) {
            $errors[] = "staff's email adstaffess is missing!";
        }
        if (!$staff_password) {
            $errors[] = 'password is required!';
        }
        if (empty($errors)) {
            $pdo->beginTransaction();
            $statement = $pdo->prepare("
            INSERT INTO staff(fname, lname, username, password, email, specialization, salary, enroll_date)

            VALUES(:fname, :lname, :username, :password, :email, :specialization, :salary, :enroll_date)
            ");

            $statement->bindValue(':fname', $staff_fname);
            $statement->bindValue(':lname', $staff_lname);
            $statement->bindValue(':username', $staff_username);
            $statement->bindValue(':password', $staff_password);
            $statement->bindValue(':specialization', $staff_specialization);
            $statement->bindValue(':email', $staff_email);
            $statement->bindValue(':salary', $staff_salary);
            $statement->bindValue(':enroll_date', $staff_enrollDate);

            // echo $staff_enrollDate;
            // exit;

            $statement->execute();
            $pdo->commit();

            // header('Location: index.php?req=list_staff');
            echo "<script type='text/javascript'> document.location = 'index.php?req=list_staff'; </script>";
        }
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

?>

<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/hospitalManagementSystem/views/partial/errorMessage.php';
?>
<form action=" <?php $_SERVER['DOCUMENT_ROOT'] . '/hospitalManagementSystem/admin/staff/registerStaff.php'
                ?>
" method="POST">

    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/hospitalManagementSystem/admin/staff/formStaff.php'
    ?>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>