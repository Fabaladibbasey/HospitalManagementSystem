<?php
$staff = [];
try {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/hospitalManagementSystem/views/partial/databaseConnection.php';
    $id = $_GET['id'];
    if (!$id) {
        header('Location: index.php?req=list_drs');
    }

    $pdo->beginTransaction();
    $statement = $pdo->prepare("
    SELECT * FROM staff
    WHERE id = :id
    ");
    $statement->bindValue(':id', $id);
    $statement->execute();
    $staff = $statement->fetch(PDO::FETCH_ASSOC);
    $pdo->commit();
    // echo '<pre>';
    // var_dump($staff);
    // exit;
} catch (\Throwable $th) {
    echo 'Error: ' . $th->getMessage();
}

?>

<style>
    .card-img-top {
        width: 150px;
        height: 150px;
        object-fit: cover;
        margin: 0 auto;
        padding: 8px;
    }
</style>
<div class="d-flex justify-content-center">

    <div class="card text-center" style="width:19rem;">
        <img src="./images/myPic-min.jpg" class="card-img-top rounded-circle" alt="...">
        <!-- <a href="#">edit</a> -->
        <p>
            <!-- <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                Link with href
            </a> -->
            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                Edit profile photo
            </button>
        </p>
        <div class="collapse" id="collapseExample">
            <div class="card card-body">
                <form action="/hospitalManagementSystem/admin/staff/updProfilePhoto.php" enctype="multipart/form-data" method="POST">
                    <!-- <input type="file" id="image" name="image" class="form-control"> -->
                    <input type="file" name="image" class="form-control" accept="image/png, image/gif, image/jpeg" />
                    <button type="submit" class="btn btn-primary btn-lg form-control p-1 mt-3">Save</button>
                </form>
            </div>
        </div>
        <div class="card-body">
            <h5 class="card-title"><?php echo $staff['username'] ?></h5>
            <p class="card-text">
                <?php echo $staff['fname'] . ' ' . $staff['lname'] . ' join this company since ' . $staff['enroll_date'] . ' and was known for his hardwork and comittements'
                ?>
            </p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                Email: <?php echo $staff['email'] ?>
            </li>
            <li class="list-group-item">
                Password: <?php echo $staff['password'] ?>
            </li>

        </ul>
        <div class="card-body">
            <a href="index.php?req=upd&id=<?php echo $_GET['id'] ?>" class="card-link">update</a>
            <a href="#" class="card-link">send message</a>
        </div>
    </div>
</div>