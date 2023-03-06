
<html>
<head>
  <title>Login Page</title>
  <link rel="stylesheet" href="./login-style.css">
</head>
<body>
    <?php
    // starts the sessiom
    session_start();
    // checks if session user is set if not then redirect
    if (isset($_SESSION["username"])) :
        header("Location:links.php?q=4");
        exit;
    elseif (!isset($_SESSION["username"])) :?>
        <div class="login-page">
            <div class="form">
                <form class="login-form" method="post">
                <input type="text" placeholder="username" name="username"/>
                <input type="password" placeholder="password" name="password"/>
                <input type="submit" value="Login" class="submit">
                </form>
            </div>
            <div class="php">
                <?php include './login.php'; ?>
            </div>
        </div>
    <?php endif; ?>
</body>
</html>
