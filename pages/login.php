<?php
require('connect.php');
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Login</title>
</head>

<body>
    <?php 
    if (isset($_POST['signin'])) {
        $uname = htmlspecialchars($_POST['uname']);
        $pw = htmlspecialchars($_POST['pw']);
        $selectQuery = "SELECT * FROM `newusers` WHERE `username` = '$uname'";
        $selectDone = $conn->query($selectQuery);
        $data = $selectDone->fetchAll(PDO::FETCH_ASSOC);
        // print_r($data);
        $loginError = [];
        if ($data) {
            $originalPw = password_verify($pw, $data[0]['password']);
            if ($originalPw) {
                session_start();
                $_SESSION['ok'] = $uname;
                header('location: ../index.php');
                // exit();
            } else {
                $loginError['pwerror'] = "Incorrect Password";
            }
            } 
        }
    ?>
    <div class="form-container">
        <h1>Sign In</h1>
        <form method="post">
            <input type="text" placeholder="Username" name="uname">
            <p></p>
            <input type="password" placeholder="Password" name="pw">
            <p>
                <?php
                if (isset($loginError['pwerror'])) {
                    echo ($loginError['pwerror']);
                }
                ?>
            </p>
            <input type="submit" value="Sign In" name="signin">
        </form>
    </div>
</body>
</html>
<?php 
    ob_end_flush();
?>