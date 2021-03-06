<?php
session_start();

if(empty($_SESSION['login'])){
    header('Location: ../index.php');
}
?>
<!DOCTYPE html>
<html>
        <head>
            <meta charset="utf-8"/>
            <title>BCDA-CONGO | Admin</title>
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
            <link rel="stylesheet" href="../css/style.css">
        </head>
        <body>
        
        <?php require_once '../title.php'; ?>
        <?php require_once '../db.php'; ?>


        <?php

                if(!empty($_POST)){
                    
                    $nom = htmlspecialchars($_POST['nom']);
                    $date = htmlspecialchars($_POST['date']);
                    $numero = htmlspecialchars($_POST['numero']);
                    $cygle = htmlspecialchars($_POST['cygle']);

                    $errors = [];

                    if(empty($nom) OR empty($date) OR empty($numero) OR empty($cygle)){
                        $errors[] = 'Veuillez remplir tous les champs';
                    }

                    if(empty($errors))
                    {
                        $req = $pdo->prepare("INSERT INTO adhere (nom,date,numero,cygle) VALUES (?,?,?,?)");
                        $req->execute(array($nom, $date, $numero,$cygle));
                        $_SESSION['flash']['success'] = "enregistre avec succes";
                        header('Location: index.html.php');
                        exit();
                    }
                    $req->closeCursor();
                }
            ?>

             <?php if(!empty($errors)) : ?>
                <div class="alert alert-danger">
                        <?php foreach ($errors as $error) : ?>
                          <p class="text-center"><?= $error; ?></p>
                        <?php endforeach;?>    
                </div>
            <?php endif; ?>
    
            <div class="row rounded justify-content-center mt-3">
                    <div class="col-md-4 pl-3 pr-3 pb-3 pt-3">
                            <h1 class="text-center pb-3">Create new Adhere</h1>

                            <?php require_once 'form.html.php'; ?>
                </div>
            </div>

            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
        </body>
</html>    
