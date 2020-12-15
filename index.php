<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8"/>
        <title> BCDA-CONGO </title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css"/>
        <style>
            body{
                background-color: lightgrey;
            }
            .image-admin {
                height: 200px;
                object-fit: cover;
                background-position: center;
                width: 100%;
            }
            .carl:hover{
                opacity: 0.9;
                color: white;
            }
            .img-logo{
                width: 150px;
                height: 150px;
                background-size: cover;
                background-position: center !important;
            }

            .img-bd{
                width: 250px;
                height: 250px;
                display: flex;
                justify-content: center;
                align-items: center;

            }
            /*.box{*/
            /*    display: flex;*/
            /*    justify-content: space-between;*/
            /*    flex-direction: column;*/
            /*    align-items: center;*/
            /*    box-sizing: border-box;*/

            /*}*/
            /*.containe{*/
            /*    width: 100%;*/
            /*    height: 50vh;*/
            /*    display: flex;*/
            /*    justify-content: center;*/
            /*}*/

            .diaporama{
                background-position: center;
                background-attachment: fixed;
                background-image: url("images/image4.jpg");
                background-size: cover;
                animation: slider 70s infinite linear;

                /*-webkit-animation-name:diapo ;*/
                /*-webkit-animation-duration: 50s;*/
                /*-webkit-animation-timing-function: linear ;*/
                /*-webkit-animation-iteration-count: infinite;*/
                /*-webkit-animation-direction: normal;*/

                /*-moz-animation-name: diapo;*/
                /*-moz-animation-duration: 50s;*/
                /*-moz-animation-timing-function: linear;*/
                /*-moz-animation-iteration-count: infinite;*/
                /*-moz-animation-direction: normal;*/

                /*animation-name: diapo;*/
                /*animation-duration: 50s;*/
                /*animation-timing-function: linear;*/
                /*animation-iteration-count: infinite;*/
                /*animation-direction: normal;*/
            }

            /*@-webkit-keyframes diapo  {*/
            /*    0%{background-image: url("images/image1.jpg")}*/
            /*    33%{background-image: url("images/image2.jpg")}*/
            /*    66%{background-image: url("images/image3.jpg")}*/
            /*}*/
            /*@-moz-keyframes diapo  {*/
            /*    0%{background-image: url("images/image1.jpg")}*/
            /*    33%{background-image: url("images/image2.jpg")}*/
            /*    66%{background-image: url("images/image3.jpg")}*/
            /*}*/

            @keyframes slider  {
                2%{background-image: url("images/image1.jpg")}
                34%{background-image: url("images/image2.jpg")}
                64%{background-image: url("images/image3.jpg")}
            }
        </style>
    </head>
    <body class="">
<div class="diaporama">

    <?php if(isset($_SESSION['flash'])): ?>
        <?php foreach ($_SESSION['flash'] as $type => $message): ?>
            <div class="alert alert-<?= $type ?>">
                <p class="text-center"> <?= $message ?> </p>
            </div>
        <?php endforeach; ?>
        <?php unset($_SESSION['flash']) ?>
    <?php endif; ?>

        <?php require_once 'partials/nav.php'; ?>

    <?php require_once 'admin/db.php' ?>

    <div class="container rest mt-5">
        <div class="info">
            <div class="d-flex justify-content-center mb-2">
                <h3 class="second">Devenez membre du BCDA</h3>
            </div>
            <div class="d-flex justify-content-center">
                <a class="btn btn-lg mt-2 bordur" href="condition.php">Inscrivez-vous maintenant</a>
            </div>
        </div>
    </div>

        <?php
        $req = $pdo->query("SELECT * FROM annonces ORDER BY create_at = 'DESC' LIMIT 3");
        ?>

    <div class="before-footer mt-5 mb-4">
                <h1 class="text-center pt-3 pb-2 annonce" style="color: white">Annonces</h1>
        <div class="container">
            <div class="row justify-content-center">
                <?php
                while ($donnee = $req->fetch())
                {
                    ?>

                        <div class="col-md-3 mb-3 ml-3  mr-3 container">
                            <div class="card carl" style="opacity: 0.5;">
                                <?= "<img src='admin/files/".$donnee['image']."' alt='image' class='img-fluid image-admin' style='width:100%; border: white solid 6px'/>"?>
                                <div class="card-body">
                                    <p class="text-center mt-2 annon" style="color: black"><?= $donnee['title'] ?></p>
                                </div>
                            </div>
                            <!--                            <p class="text-center"> le : --><?//= $donnee['create_at'] ?><!--</p>-->
                        </div>

                    <?php
                }
                $req->closeCursor();
                ?>
            </div>
        </div>
    </div>

    <?php require_once 'partials/before_footer.php'; ?>

    <div style="width: auto; height: 40px;">

    </div>
</div>
<div class="bg-white">
    <?php require_once 'partials/footer.php'; ?>
</div>

<script src="js/style.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js" integrity="sha512-z4OUqw38qNLpn1libAN9BsoDx6nbNFio5lA6CuTp9NlK83b89hgyCVq+N5FdBJptINztxn1Z3SaKSKUS5UP60Q==" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>

</html>