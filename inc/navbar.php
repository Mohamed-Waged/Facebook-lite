<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php" style= 'color: #6ab3ff;'><strong>FaceBook</strong></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              </li>
              <?php if (isset($_SESSION['userInfo'])) : ?>
                <li class="nav-item">
                  <a class="nav-link" href="profile.php">Profile</a>
                </li>
              <?php else : ?>
                <li class="nav-item">
                  <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="register.php">Register</a>
                </li>
              <?php endif; ?>
            </ul>
            <?php if (isset($_SESSION['userInfo'])) : ?>
              <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                <li class="nav-item mx-2">
                  <a class="btn btn-outline-success" href="profile.php"><?php echo "HI! " . $_SESSION['userInfo']['name']; ?></a>
                </li>
                <li class="nav-item">
                  <a class="btn btn-danger" href="logout.php">Logout</a>
                </li>
              </ul>
            <?php endif; ?>
        </div>
    </div>
</nav>