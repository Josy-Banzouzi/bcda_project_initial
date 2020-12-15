<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <title>BCDA-CONGO | Contacts </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css"/>
    <style>
        .image-admin {
            height: 200px;
            background-size: cover;
            object-fit: cover;
            width: 100%;
            position: center;
        }
        body{
            background-color: lightgrey;
        }
        .diaporama{
            margin: 0;
            top: 0;
            left: 0;
            width: 100%;
            height: 300px;
            background-position: center;
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
            33%{background-image: url("images/image4.jpg")}
            66%{background-image: url("images/image3.jpg")}
        }
    </style>
</head>
<body>

<div class="diaporama">
    <div class="row justify-content-center" style="padding: 100px;">
        <a class="legende text-center h1" href="index.php" style="color: white">Bureau Congolais du Droit d'Auteur</a>
    </div>
</div>

<div class="mt-5 mb-5">
    <h2 class="text-center annon">Retrouve ici Toutes les conditions pour devenir membre du BCDA-CONGO</h2>
</div>

<!--        <div class="row">-->
<!--        --><?php
//                $i = 4;
//            while($i < 4){
//         ?>
<!--            <div class="col-md-4 rounded bg-white">-->
<!--                <h1>Bonjour</h1>-->
<!--            </div>-->
<!--        --><?php
//                $i++;
//            }
//        ?>
<!--        </div>-->
<!--                <div class="row">-->
<!--                    <div class="col-md-4 rounded bg-white">-->
<!--                        <h1>Bonjour</h1>-->
<!--                    </div>-->
<!--                    <div class="col-md-4 rounded bg-white">-->
<!--                        <h1>Bonjour</h1>-->
<!--                    </div>-->
<!--                    <div class="col-md-4 rounded bg-white">-->
<!--                        <h1>Bonjour</h1>-->
<!--                    </div>-->
<!--                </div>-->



<?php
require_once 'admin/db.php';

$req = $pdo->query("SELECT file , file_url FROM adhesion ORDER BY create_at = 'DESC' ");
?>
<div class="container">
    <div class="row justify-content-center">
        <?php
        while ($donnee = $req->fetch())
        {
            ?>
            <div class="col-md-2 rounded ml-3 mr-3 mt-3 bg-light" style="border: 5px white;">
                <p class="pl-3 pr-3 pt-3 pb-3 text-center"><?= $donnee['file'];?></p>
                <img src="admin/files/pdf-logo.png" alt="pdf" class="img-fluid" style="width: 100%; height: 100px;">
                <p class="mt-3 text-center"><?= '<a href="admin/files/'.$donnee['file_url'].'"> Telecharger </a>'?></p>
            </div>
            <?php
        }
        $req->closeCursor();
        ?>
    </div>
</div>

<div class="mb-3">
    <?php require_once 'partials/before_footer.php' ?>
</div>

<div class="bg-white">
    <?php require_once 'partials/footer.php' ?>
</div>

<script src="js/style.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>