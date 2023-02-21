<?php

// starts the sessiom
session_start();

// checks if session user is set if not then redirect
if (!isset($_SESSION["username"])) {
    header("Location:./index.php?message=please_login_first");
}

// if someone clicks on logout unset the session
if (isset($_POST["logout"])) {
    session_unset();
    session_destroy();
    header("Location:./index.php");
}


// if someone does a get query like welcome.php?q=4 then redirect to correct url
if (isset($_GET["q"])) {
    $q = $_GET["q"];
    switch ($_GET["q"]) {
        case "1":
            header('Location:task'.$q.'.php');
            break;
        case "2":
            header('Location:task'.$q.'.php');
            break;
        case "3":
            header('Location:task'.$q.'.php');
            break;
        case "4":
            header('Location:task'.$q.'.php');
            break;
        case "5":
            header('Location:task'.$q.'.php');
            break;
        case "6":
            header('Location:task'.$q.'.php');
            break;
        default:
            echo "Wrong url <br>";
    }
}
?>

<html>
<head>
  <title>Pager</title>
  <link rel="stylesheet" href="./login-style.css">
</head>
<body>
    <h1>Tasks</h1>
    <nav>
        <ul>
        <li><a href="links.php?q=1">Task 1</a></li>
        <li><a href="links.php?q=2">Task 2</a></li>
        <li><a href="links.php?q=3">Task 3</a></li>
        <li><a href="links.php?q=4">Task 4</a></li>
        <li><a href="links.php?q=5">Task 5</a></li>
        <li><a href="links.php?q=6">Task 6</a></li>
        </ul>
    </nav>
    <form action="index.php" method="post">
        <button type="submit" name="logout" class="logout">Log Out</button>
    </form>
</body>
</html>
