<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>WorkShop</title>
</head>

<body>
    <?php
    include('nav.php');
    ?>
    <section class="background-section">
        <img src="images/ps.jpg" alt="" id="bgImg">
        <div class="background-data">
            <h1>Welcome to our Website</h1>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Molestias fugiat veniam soluta laborum magnam
                ut, incidunt libero commodi reiciendis saepe pariatur similique in modi ducimus error. Voluptatem, nobis
                sed. Libero? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illo laboriosam alias quam
                labore. Pariatur magni iure quibusdam eos hic consequatur, nostrum dolor delectus reprehenderit adipisci
                illo, omnis necessitatibus iste laboriosam. Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Tempora sunt eius enim maxime assumenda ipsam consectetur aliquam, id accusantium ratione vitae odio
                perferendis commodi a doloribus totam eum aperiam porro.</p>
            <div class="bgButtons">
                <a href="#">Get Started</a>
                <a href="#">About Us</a>
            </div>
        </div>
    </section>
    <section class="about-us">
        <img src="images/cat.jpg" alt="">
        <div class="about-data">
            <h3>About Us</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non ipsum incidunt pariatur commodi beatae minus
                velit eos nisi! Nulla explicabo quaerat fuga illo! Exercitationem itaque ipsum, laboriosam consectetur
                aliquam repellendus! Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem natus quae
                architecto soluta. Error esse illo accusamus voluptatum earum. Assumenda ut reiciendis delectus nam
                voluptas? Deserunt corrupti dignissimos amet. Suscipit. lore</p>
        </div>
    </section>
    <section class="best-offers">
    <?php
        if (isset($_SESSION['ok'])) { ?>
            <h1>Welcome</h1>
        <?php }
        ?>
    </section>

    <?php
    include('pages/footer.php');
    ?>
    <script src="js/script.js"></script>
</body>

</html>