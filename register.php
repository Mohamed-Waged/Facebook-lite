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
            <h2 class="border p-2  my-2 text-center bg-secondary text-light">Register</h2>

            <?php if (isset($_SESSION['userExisit'])) : ?>
                <div class="alert alert-danger text-center">
                    <?php echo $_SESSION['userExisit']; ?>
                </div>
            <?php
                unset($_SESSION['userExisit']);
            endif;
            ?>

            <form action="handelers/handleRegister.php" method="POST" class="border p-3">
                <div class="form-group p-2 my-1">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php if (isset($_SESSION['user'])) echo $_SESSION['user']['name'] ?>">
                    <small class="text-danger">
                        <?php if (isset($_SESSION['errors']['name']))  echo $_SESSION['errors']['name']; ?>
                    </small>
                </div>
                <div class="form-group p-2 my-1">
                    <label for="email">Email</label>
                    <input type="email" class="form-control " id="email" name="email" value="<?php if (isset($_SESSION['user'])) echo $_SESSION['user']['email'] ?>">
                    <small class="text-danger">
                        <?php if (isset($_SESSION['errors']['email']))  echo $_SESSION['errors']['email']; ?>
                    </small>
                </div>
                <div class="form-group p-2 my-1">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" value="<?php if (isset($_SESSION['user'])) echo $_SESSION['user']['password'] ?>">
                    <small class="text-danger">
                        <?php if (isset($_SESSION['errors']['password']))  echo $_SESSION['errors']['password']; ?>
                        <?php unset($_SESSION['errors']); ?>
                        <?php unset($_SESSION['user']); ?>
                    </small>
                </div>
                <div class="form-group p-2 my-1">
                    <input type="submit" value="Register" class="form-control bg-success">
                </div>
            </form>
        </div>
    </div>
</div>



<?php include 'inc/footer.php'; ?>