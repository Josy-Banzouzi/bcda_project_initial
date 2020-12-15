<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>BCDA-CONGO | S'Abonner</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href= "css/style.css"/>
    <style>
        body{
            background-color: lightgrey;
        }
        .img-logo{
            width: 150px;
            height: 150px;
            background-size: cover;
        }
    </style>
</head>
<body>

 <?php require_once 'partials/nav.php'?>

<?php require_once 'admin/db.php'; ?>

<div class="container pb-5 pt-2 pr-5 pl-5 mt-5" style="background-color: darkgrey">
    <div class="row mt-3 mb-4">
        <h1 class="mx-auto membre">Membres du BCDA-CONGO</h1>
    </div>

    <?php
    $req = $pdo->query("SELECT * FROM adhere");
    ?>

    <table class="table table-bordered" style="border: solid">
        <thead>
        <tr>
            <th class="text-center">Noms et Prenoms</th>
            <th class="text-center">Date d'Adhesion</th>
            <th class="text-center">Numero de carte</th>
            <th class="text-center">Cygle</th>
        </tr>
        </thead>
        <tbody>
        <?php while($donnee = $req->fetch()): ?>
            <tr>
                <td class="text-center"><?php echo $donnee['nom']; ?></td>
                <td class="text-center"><?php echo $donnee['date']; ?></td>
                <td class="text-center"><?php echo $donnee['numero']; ?></td>
                <td class="text-center"><?php echo $donnee['cygle']; ?></td>
            </tr>
        <?php endwhile;
        $req->closeCursor();
        ?>
        </tbody>
    </table>
</div

<div class="mt-3 mb-5">
    <?php require_once 'partials/before_footer.php' ?>
</div>
<div style="background-color: lightgrey" class="mt-3">
    <?php require_once 'partials/footer.php' ?>
</div>

<script src="js/style.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>