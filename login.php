<?php
include 'inc/header.php';
include 'inc/navbar.php';
include 'core/functions.php';

if (isset($_SESSION['userInfo'])) {
    redirectPath("index.php");
}
?>

<div class="container">
    <div class="row">
        <div class="col-8 mx-auto my-5 ">
            <h2 class="border p-2  my-2 text-center bg-secondary text-light">Login</h2>
            <?php
            if (isset($_SESSION['errors'])) :
                foreach ($_SESSION['errors'] as $error) : ?>
                    <div class="alert alert-danger text-center">
                        <?php echo $error; ?>
                    </div>
            <?php
                endforeach;
                unset($_SESSION['errors']);
            endif;
            ?>
            <form action="handelers/handleLogin.php" method="POST" class="border p-3">
                <div class="form-group p-2 my-1">
                    <label for="email">Email</label>
                    <input type="email" class="form-control " id="email" name="email"  value="<?php if (isset($_SESSION['user'])) echo $_SESSION['user']['email'] ?>">
                </div>
                <div class="form-group p-2 my-1">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" >
                </div>
                <div class="form-group p-2 my-1">
                    <input type="submit" value="Login" class="form-control bg-success">
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'inc/footer.php'; ?>