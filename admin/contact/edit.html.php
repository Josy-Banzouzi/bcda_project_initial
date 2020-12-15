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
        <title> BCDA-CONG | Admin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
    <?php require_once '../title.php'; ?>
    <?php require_once '../db.php';

        $id = 0;
        $poste = '';
        $image = '';
        $nom= '';
        $email = '';

            if(isset($_GET['edit'])){
                $id = $_GET['edit'];
                $req = $pdo->query("SELECT * FROM contacts WHERE id='$id'");
                if(!empty($id)){
                    $donnees = $req->fetch();
                    $poste = $donnees['poste'];
                    $image = $donnees['image'];
                    $nom= $donnees['nom'];
                    $email = $donnees['email'];
                }
                $req->closeCursor();
            }

            if(isset($_POST['update'])){
                $id = $_POST['id'];
                $image = htmlspecialchars($_POST['image']);
                $nom = htmlspecialchars($_POST['nom']);
                $poste = htmlspecialchars($_POST['poste']);
                $email = htmlspecialchars($_POST['email']);

                $req = $pdo->query("UPDATE contacts SET image='$image', nom='$nom', poste='$poste',email='$email' WHERE id=$id");
                $_SESSION['flash']['success'] = "Modifie avec succes";
                header('Location: index.html.php');
            }

    ?>
    
    <div class="row justify-content-center">
        <div class="col-md-4">
            <h1 class="text-center">Modifier</h1>
        <!-- {{ include('admin/contact/_form.html.twig', {'button_label': 'Update'}) }} -->
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" id="image" name="image" value="<?php echo $image ?>">
                </div>
                <div class="form-group">
                    <label for="poste">Poste</label>
                    <input type="text" class="form-control" id="poste" name="poste" value="<?php echo $poste ?>">
                </div>
                <div class="form-group">
                    <label for="nom">Nom et Prenom </label>
                    <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $nom ?>">
                </div>

                <div class="form-group">
                    <label for="email">Addresse electronique</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $email ?>">
                </div>
                <div class="row justify-content-center pr-2 pl-2">
                    <button type="submit" class="btn btn-outline-secondary mr-auto" name="update">Inserer</button>
                    <a href="index.html.php" class="btn btn-outline-secondary ml-auto">Annuler</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    </body>
</html>
