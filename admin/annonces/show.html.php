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
        <title>BCDA-CONGO | Admin </title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/style.css">
        <style>
            .image-admin{
                height: 300px;
                object-fit: cover;
                width: 100%;
                position: center;
            }
        </style>
    </head>
    <body>

    <?php require_once '../title.php'; ?>
    <?php require_once '../db.php';
                
        $image = '';
        $title = '';

        if(isset($_GET['show'])){
            $id = $_GET['show'];
            $req = $pdo->query("SELECT * FROM annonces WHERE id='$id'");
            if(!empty($id)){
                $donnees = $req->fetch();
                $image = $donnees['image'];
                $title = $donnees['title'];
            }
            $req->closeCursor();
        }

    ?>

<div class="row justify-content-center mt-5 mb-5">
    <div class="col-md-4 rounded bg-white pl-3 pr-3 pt-3 pb-3">
        <h1 class="text-center">Annonces</h1>

        <div class="mb-3">
            <?php
            echo "<img src='../files/".$image."' alt='image' class='img-fluid image-admin' /> "
            ?>
        </div>

    <table class="table">
        <tbody>
            <tr>
                <th>Numero : </th>
                <td><?php echo $id ?></td>
            </tr>
            <tr>
                <th>Contenu :</th>
                <td><?php echo $title ?></td>
            </tr>
        </tbody>
    </table>
        <div class="row pb-2 pl-3 pr-3 justify-content-between">
            <a href="index.html.php" class="btn btn-outline-secondary">Annuler</a>
<!--            <a href="edit.html.php?edit=--><?php //echo $donnees['id'] ?><!--" class="btn btn-outline-secondary">Modifier</a>-->
            <a href="delete_form.php?delete=<?php echo $donnees['id'] ?>" class="btn btn-outline-secondary">supprimer</a>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>
