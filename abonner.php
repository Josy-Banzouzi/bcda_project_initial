<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">
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
        </style>
    </head>
    <body>

            <div class="abonner">
                <img src="images/image4.jpg" alt="image" class="image img-fluid" style="background-attachment: fixed;">
                <a class="legende text-center h1" href="index.php" style="color: white">Bureau Congolais du Droit d'Auteur</a>
            </div>

            <?php

            if(!empty($_POST)){

                require_once 'admin/db.php';

                $nom = htmlspecialchars($_POST['nom']);
                $email = htmlspecialchars($_POST['email']);

                $errors = [];

                if(empty($nom) OR empty($email)){
                    $errors[] = 'Veuillez remplir tous les champs';
                }
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $errors[] = 'Email n\'est pas valide ';
                }else{
                    $sql = "SELECT * FROM abonnes WHERE email = ?";
                    $req = $pdo->prepare($sql);
                    $req->execute(array($email));
                    $user = $req->fetch();
                    if($user){
                        $errors['email'] = "Cet email est dela utiliser pour un autre compte";
                    }
                }

                if(empty($errors)){
                    $req = $pdo->query("INSERT INTO abonnes(nom, email) VALUES('$nom','$email')");
                    $_SESSION['flash']['success'] = "abonnement effectue avec succes";
                    header('Location:index.php');
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

            <h4 class="text-center mt-5 mr-3 ml-3 annon">Abonnez-vous afin de recevoir toutes nos annonces directement dans votre boîte de courriels.</h4>

            <div class="col-md-4 mx-auto rounded shadow mt-5 ml-3 mr-3 before-footer subscribe" style="padding: 30px;">
                <div class="pt-3 pb-3 pr-3 pl-3">
                    <form method="POST" action="">
                        <div class="form-group">
                            <label for="nom">Entre votre nom</label>
                            <input type="text" class="form-control" id="nom" name="nom" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Addresse electronique ou Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-secondary">S'Abonner</button>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="mt-3 mb-5">
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