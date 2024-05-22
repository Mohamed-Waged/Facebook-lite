<?php
include 'inc/header.php';
include 'core/functions.php';
include 'data/Database.php';
include 'inc/navbar.php';

if (!isset($_SESSION['userInfo'])) {
    redirectPath("login.php");
}
?>

<?php $db = new Database(); ?>
<?php $user = $db->readData("users", $_SESSION['userInfo']['email'], $_SESSION['userInfo']['password']) ?>
<?php if (count($user) > 0) : ?>
    <?php foreach ($user as $value) :  ?>
        <div class="container">
            <div class="row">
                <div class="col-8 mx-auto my-5 p-2 border">
                    <h1 class="text-center bg-info mt-2 mb-5 p-3">Welcom <?php echo $value['name']; ?></h1>
                    <div>
                        <h2 class="border my-2 p-2 ">Name : <?php echo $value['name']; ?></h2>
                        <h2 class="border my-2 p-2 ">Email : <?php echo $value['email']; ?></h2>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php else : ?>
    <?php redirectPath("logout.php"); ?>
<?php endif; ?>


<?php include 'inc/footer.php'; ?>