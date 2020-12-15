<?php
    session_start();

    if(empty($_SESSION['login'])){
        header('Location: index.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>BCDA-CONGO | Connexion</title>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
</head>
<body>

        <?php require_once 'db.php'?>

        <div class="row container">
            <div class="container mt-3 mb-3 titre ml-5">
                <a class="text-left h1" href="dashboard.php">BCDA-CONGO</a>
            </div>



            <a href="deconnexion.php" class="btn btn-secondary ml-auto">Deconnexion</a>
        </div>

        <?php if(isset($_SESSION['flash'])): ?>
            <?php foreach ($_SESSION['flash'] as $type => $message): ?>
                <div class="alert alert-<?= $type ?>">
                    <?= $message ?>
                </div>
            <?php endforeach; ?>
            <?php unset($_SESSION['flash']) ?>
        <?php endif; ?>

        <div class="container mt-5">
            <h1 class="text-center mt-5 mb-5">Tableau de Bord</h1>
            <div class="row justify-content-center">
                <a href="adhere/index.html.php" class="col-md-3 rounded shadow bg-white ml-2">
                    <div>
                        <h4 class="text-center pt-3">Adheres</h4>
                        <?php $req = $pdo->query('SELECT COUNT(*) AS nb FROM adhere');
                            while($count = $req->fetch()){
                            ?>
                                <h1 class="pb-3 text-center"> <?php echo $count['nb']; ?> </h1>
                        <?php
                            }
                        ?>

                    </div>
                </a>
                <a href="adhesion/index.html.php"  class="col-md-3 rounded shadow bg-white ml-2">
                    <div>
                        <h4 class="text-center pt-3">Adhesions</h4>
                        <?php $req = $pdo->query('SELECT COUNT(*) AS nb FROM adhesion');
                        while($count = $req->fetch()){
                            ?>
                            <h1 class="pb-3 text-center"> <?php echo $count['nb']; ?> </h1>
                            <?php
                        }
                        ?>

                    </div>
                </a>
                <a href="annonces/index.html.php" class="col-md-3 rounded shadow bg-white ml-2">
                    <div>
                        <h4 class="text-center pt-3">Annonces</h4>
                        <?php $req = $pdo->query('SELECT COUNT(*) AS nb FROM annonces');
                        while($count = $req->fetch()){
                            ?>
                            <h1 class="pb-3 text-center"> <?php echo $count['nb']; ?> </h1>
                            <?php
                        }
                        ?>

                    </div>
                </a>
            </div>
            <div class="row justify-content-center mt-3">
                <a href="contact/index.html.php" class="col-md-3 rounded shadow bg-white ml-2">
                    <div>
                        <h4 class="text-center pt-3">Contacts</h4>
                        <?php $req = $pdo->query('SELECT COUNT(*) AS nb FROM contacts');
                        while($count = $req->fetch()){
                            ?>
                            <h1 class="pb-3 text-center"> <?php echo $count['nb']; ?> </h1>
                            <?php
                        }
                        ?>

                    </div>
                </a>
                <a href="subscriber/index.html.php" class="col-md-3 rounded shadow bg-white ml-2"">
                    <div>
                        <h4 class="text-center pt-3">Abonnne</h4>
                        <?php $req = $pdo->query('SELECT COUNT(*) AS nb FROM abonnes');
                        while($count = $req->fetch()){
                            ?>
                            <h1 class="pb-3 text-center"> <?php echo $count['nb']; ?> </h1>
                            <?php
                        }
                        ?>

                    </div>
                </a>
                <a href="" class="col-md-3 rounded shadow bg-white ml-2">
                    <div>
                            <h4 class="text-center pt-3">Administrateurs</h4>
                        <?php $req = $pdo->query('SELECT COUNT(*) AS nb FROM user');
                        while($count = $req->fetch()){
                            ?>
                            <h1 class="pb-3 text-center"> <?php echo $count['nb']; ?> </h1>
                            <?php
                        }
                        ?>
                    </div>
                </a>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>