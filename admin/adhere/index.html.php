<?php
session_start();

if(empty($_SESSION['login'])){
    header('Location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8"/>
        <title>BCDA-CONGO | Admin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/style.css">
    </head>

    <body>

    <?php if(!empty($_SESSION['flash'])): ?>
        <?php foreach ($_SESSION['flash'] as $type => $message): ?>
            <div class="alert alert-<?= $type ?>">
               <p class="text-center"> <?= $message ?> </p>
            </div>
        <?php endforeach; ?>
    <?php unset($_SESSION['flash']) ?>
    <?php endif; ?>


    <?php require_once '../title.php'; ?>
    <?php require_once '../db.php'; ?>

    <div class="container rounded bg-white pl-5 pb-3 pt-2 pr-5 mt-5">
        <div class="row mt-3 mb-4">
            <h1 class="mx-auto">Tous les Adhere</h1>
            <a href="new.html.php" class="btn btn-outline-secondary btn-lg ml-auto">Ajouter</a>
        </div>

        <?php
            $req = $pdo->query("SELECT * FROM adhere");
        ?>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th class="text-center">Numero</th>
                <th class="text-center">Noms et Prenoms</th>
                <th class="text-center">Date d'Adhesion</th>
                <th class="text-center">Numero de carte</th>
                <th class="text-center">Cygle</th>
                <th class="text-center">actions</th>
            </tr>
            </thead>
            <tbody>
            <?php while($donnee = $req->fetch()): ?>
                <tr>
                    <td class="text-center"><?php echo $donnee['id']; ?></td>
                    <td class="text-center"><?php echo $donnee['nom']; ?></td>
                    <td class="text-center"><?php echo $donnee['date']; ?></td>
                    <td class="text-center"><?php echo $donnee['numero']; ?></td>
                    <td class="text-center"><?php echo $donnee['cygle']; ?></td>
                    <td class="text-center">
                        <a href="edit.html.php?edit=<?php echo $donnee['id'] ?>" class="btn btn-sm btn-primary">modifier</a>
                        <a href="delete_form.php?delete=<?php echo $donnee['id'] ?>" class="btn btn-sm btn-danger">supprimer</a>
                    </td>
                </tr>
            <?php endwhile;
            $req->closeCursor();
            ?>
            </tbody>
        </table>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    </body>
</html>