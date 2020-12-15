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

    <?php require_once '../db.php';
    
    $id = 0;
    $nom = '';
    $date= '';
    $numero = '';
    $cygle = '';

        if(isset($_GET['edit'])){
            $id = $_GET['edit'];
            $req = $pdo->query("SELECT * FROM adhere WHERE id='$id'");
            if(!empty($id)){
                $donnees = $req->fetch();
                $nom = $donnees['nom'];
                $date= $donnees['date'];
                $numero = $donnees['numero'];
                $cygle = $donnees['cygle'];
            }
            $req->closeCursor();
        }

        if(isset($_POST['update'])){
            $id = $_POST['id'];
            $nom = htmlspecialchars($_POST['nom']);
            $date = htmlspecialchars($_POST['date']);
            $numero = htmlspecialchars($_POST['numero']);
            $cygle = htmlspecialchars($_POST['cygle']);

            $req = $pdo->prepare("UPDATE adhere SET nom=?, date=?, numero=?,cygle=? WHERE id=$id");
            $req->execute(array($nom, $date, $numero, $cygle));
            $_SESSION['flash']['success'] = "Modifier avec succes";
            header('Location: index.html.php');
        }
    ?>
    
        <div class="row justify-content-center">
            <div class="col-md-4">
                <h1 class="text-center">Edit</h1>
                <form action="" method="POST">
                     <input type="hidden" name="id" value="<?php echo $id ?>">
                    <div class="form-group">
                        <label for="nom">Noms et Prenoms</label>
                        <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $nom ?>">
                    </div>
                    <div class="form-group">
                        <label for="date">Date d'hadesion</label>
                        <input type="text" class="form-control" id="date" name="date" value="<?php echo $date ?>">
                    </div>
                    <div class="form-group">
                        <label for="numero">Numero de carte</label>
                        <input type="text" class="form-control" id="numero" name="numero" value="<?php echo $numero ?>">
                    </div>
                    <div class="form-group">
                        <label for="cygle">Cygle</label>
                        <input type="text" class="form-control" id="cygle" name="cygle" value="<?php echo $cygle ?>">
                    </div>
                    <div class="row justify-content-center pr-2 pl-2">
                        <button type="submit" class="btn btn-outline-secondary mr-auto" name ="update">Inserer</button>
                        <a href="index.html.php" class="btn btn-outline-secondary ml-auto">back to list</a>
                    </div>
                </form>

            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    </body>
<html>
