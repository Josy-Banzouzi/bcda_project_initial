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
        <title>BCDA-CONG | Admin </title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <?php require_once '../title.php'; ?>
        <?php require_once '../db.php';
        
        $nom = '';
        $email = '';

        if(isset($_GET['show'])){
            $id = $_GET['show'];
            $req = $pdo->query("SELECT * FROM abonnes WHERE id=$id");
            if(!empty($id)){
                $donnees = $req->fetch();
                $nom = $donnees['nom'];
                $email = $donnees['email'];
            }
            $req->closeCursor();
        }
        
        ?>
        
        <div class="row justify-content-center mt-5">
            <div class="col-md-4 rounded bg-white pl-3 pr-3 pt-3 pb-3">
            <h1 class="mx-auto text-center mb-3"><?php echo $nom; ?></h1>

        <table class="table">
            <tbody>
            <tr>
                <th>numero :</th>
                <td><?php echo $id ?></td>
            </tr>
            <tr>
                <th>Nom : </th>
                <td><?php echo $nom ; ?></td>
            </tr>
            <tr>
                <th>Email : </th>
                <td><?php echo $email ; ?></td>
            </tr>
            </tbody>
        </table>

    <div class="row pb-2 pl-3 pr-3 justify-content-between">
            <a href="index.html.php" class="btn btn-outline-secondary">back to list</a>
            <a href="edit.html.php?edit=<?php echo $donnees['id']; ?>" class="btn btn-outline-secondary">Modifier</a>
            <a href="delete_form.html.php?delete=<?php echo $donnees['id']; ?>" class="btn btn-outline-secondary">supprimer</a>
        <?php require_once 'delete_form.html.php'; ?>
    </div>
        </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>
