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

        if(isset($_POST['upload'])){

                $title = htmlspecialchars($_POST['title']);

                $errors = [];

                if(empty($title)){
                    $errors[] = 'Veuillez remplir tous les champs';
                }

                $file_name = $_FILES['image']['name'];
                $file_extension = strrchr($file_name, ".");
                $file_tmp_name = $_FILES['image']['tmp_name'];
                $file_dest = '../files/' .$file_name;
                $extensions_autorisees = array('.jpg', '.JPEG', '.jpeg' , '.png' , '.PNG');
                 if(in_array($file_extension, $extensions_autorisees)){
                    if (move_uploaded_file($file_tmp_name, $file_dest)) {
                        $req = $pdo->prepare("INSERT INTO annonces (image, image_url, title,create_at) VALUES (?,?,?,NOW())");
                        $req->execute(array($file_name, $file_dest, $title));
                        $_SESSION['flash']['success'] = "Enregistre avec succes";
                        header('Location: index.html.php');
                        exit();
                        echo 'Fichier envoyer avec succes';
                        }else{
                            $errors['iamge'] =  "une erreur est survenue lors de l'envoi du fichier";
                    }
                }
 
                // if(empty($errors)){
                //     $req = $pdo->prepare("INSERT INTO annonces (image, title) VALUES (?,?)");
                //     $req->execute(array($image, $title));
                //     header('Location: index.html.php');
                //     exit();
                // }
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
            <h1> Create new Annonces </h1>

            <?php require_once 'form.html.php'; ?>
            
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    </body>
</html>
