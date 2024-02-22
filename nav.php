<?php
session_start();
?>
<header>
    <nav>
        <img src="./images/cat.jpg" alt="">
        <ul>
            <li>
                <a href="index.php">Home</a>
            </li>
            <?php
            if (isset($_SESSION['ok'])) { ?>
                <li>
                    <a href="#">
                        <?php
                        echo ($_SESSION['ok']);
                        ?>
                    </a>
                </li>
                <li>
                    <form method="post">
                        <input type="submit" value="Logout" name="logout">
                    </form>
                </li>
                
                <?php
                if (isset($_POST['logout'])) {
                    session_destroy();
                }
            } else {
                ?>
                <li>
                    <a href="pages/register.php">Register</a>
                </li>
                <li>
                    <a href="pages/login.php">Login</a>
                </li>
            <?php
            }

            ?>

        </ul>
    </nav>
</header>