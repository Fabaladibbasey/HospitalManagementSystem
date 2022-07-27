<?php
$staff = [];
$search = '';
try {
    // echo '<pre>';
    // // echo "Hello world!";
    // var_dump($_SERVER['DOCUMENT_ROOT']);
    // exit;
    require_once $_SERVER['DOCUMENT_ROOT'] . '/hospitalManagementSystem/views/partial/databaseConnection.php';
    $search = $_POST['search'];
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && $search) {
        $statement = $pdo->prepare(" SELECT * FROM staff
        WHERE fname LIKE :search OR lname LIKE :search OR specialization LIKE :search
        ORDER BY enroll_date DESC
        ");

        $statement->bindValue(':search', "%$search%");
        // $statement->execute();
        // $staff = $statement->fetchAll(PDO::FETCH_ASSOC);
        // echo '<pre>';
        // echo var_dump($staff);
        // exit;
    } else {
        $statement = $pdo->prepare("SELECT * FROM staff ORDER BY enroll_date DESC ");
    }
    $statement->execute();
    $staff = $statement->fetchAll(PDO::FETCH_ASSOC);
} catch (\Throwable $th) {
    echo 'Error: ' . $th->getMessage();
}
?>

<?php include_once '../../views/partial/header.php' ?>
<button class="btn btn-success">
    <a href="index.php?req=enroll_staff" class="nav-link px-0"> <span class="d-none d-sm-inline text-white">Enroll new staff</span> </a>
</button>
<form action="" method="POST">
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="search staff" name="search">
        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
    </div>
</form>
<?php if ($search) : ?>
    <div class="alert alert-info">
        Click search button again to navigate back </div>
<?php endif; ?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">fname</th>
            <th scope="col">lname</th>
            <th scope="col">specialization</th>
            <th scope="col">salary</th>
            <th scope="col">more info</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($staff as $key => $staff) : ?>
            <tr>
                <th scope="row"><?php echo $key + 1 ?></th>
                <td><?php echo $staff['fname'] ?></td>
                <td><?php echo $staff['lname'] ?></td>
                <td><?php echo $staff['specialization'] ?></td>
                <td><?php echo $staff['salary'] ?></td>
                <td>
                    <a href="index.php?req=list_staff&id=<?php echo $staff['id'] ?>">
                        profile
                    </a>
                </td>
            <?php endforeach; ?>
</table>