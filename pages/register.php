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
    <title>Register</title>
</head>

<body>
<?php
    if (isset($_POST['signup'])) {
        $uname = htmlspecialchars($_POST['uname']);
        $pw = htmlspecialchars($_POST['pw']);
        $cpw = htmlspecialchars($_POST['cpw']);
        $email = htmlspecialchars($_POST['email']);
        $address = htmlspecialchars($_POST['address']);
        $phone = htmlspecialchars($_POST['phone']);
        $errors = [];
        if ($pw == $cpw) {
            $selectQuery = "SELECT * FROM `newusers`";
            $selectDone = $conn->query($selectQuery);
            // print_r($selectDone);
            $data = $selectDone->fetchAll(PDO::FETCH_ASSOC);
            // print_r($data);
            for ($i = 0; $i < count($data); $i++) {
                if ($data[$i]['username'] == $uname) {
                    $errors['usernameerror'] = "Username is already Used";
                }
                if ($data[$i]['email'] == $email) {
                    $errors['emailerror'] = "Email is already used";
                }
                if ($data[$i]['phone'] == $phone) {
                    $errors['phoneerror'] = "Phone number is already used";
                }
            }
            // if (empty($errors)) {//===
            if (count($errors) == 0) {
                // $pw = md5($pw);
                $hashedPw = password_hash($pw, PASSWORD_BCRYPT);
                $insertQuery = "INSERT INTO `newusers` (`username`, `password`, `email`, `address`, `phone`) VALUES ('$uname', '$hashedPw', '$email', '$address', '$phone')";
                $insertDone = $conn->query($insertQuery);
                if ($insertDone) {
                    header('location:login.php');
                }

            }
        } else {
            $errors['pwerror'] = "Password not Match";
        }
    }
?>
    <div class="form-container">
        <h1>Sign Up</h1>
        <form method="post">
            <input type="text" placeholder="Username" name="uname" value="<?php if (isset($uname)) { echo $uname; } ?>">
            <p>
                <?php
                if (isset($errors['usernameerror'])) {
                    echo ($errors['usernameerror']);
                }
                ?>
            </p>
            <input type="password" placeholder="Password" name="pw" value="<?php if (isset($pw)) { echo $pw; } ?>">
            <input type="password" placeholder="Confirm Password" name="cpw" value="<?php if (isset($cpw)) { echo $cpw; } ?>">
            <p>
                <?php
                if (isset($errors['pwerror'])) {
                    echo ($errors['pwerror']);
                }
                ?>
            </p>
            <input type="email" placeholder="Email" name="email" value="<?php if (isset($email)) { echo $email; } ?>"> 
            <p></p>
            <input type="text" placeholder="Address" name="address" value="<?php if (isset($address)) { echo $address; } ?>">
            <input type="text" placeholder="Phone" name="phone" value="<?php if (isset($phone)) { echo $phone; } ?>">
            <p></p>
            <input type="submit" value="Sign Up" name="signup">
        </form>
    </div>
</body>
</html>
<?php 
    ob_end_flush();
?>