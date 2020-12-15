<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <title>BCDA-CONGO | Connexion</title>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
</head>
<body>
        <?php
                require_once 'db.php';

            if (!empty($_POST)) {

                $email = htmlspecialchars(trim($_POST['email']));
                $password = htmlspecialchars(trim($_POST['password']));

                $errors = [];

                if (empty($email) or empty($password)) {

                    $errors [] = 'Veuillez remolir tous les champs';
                }
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errors ['email'] = 'Email nom valide';
                }


                if (empty($errors)) {

                    $sql = "SELECT * FROM user WHERE email = ?";
                    $req = $pdo->prepare($sql);
                    $req->execute(array($email));
                    $user = $req->fetch();
                    if ($user) {
                        if (password_verify($password, $user['password'])) {
                            $_SESSION['login'] = $email;
                            $_SESSION['flash']['success'] = "Bienvenu sur le tableau de bord ";
                            header('Location: dashboard.php');
                            exit();
                        } else {
                            $errors[] = 'email ou mot de passe incorecte';
                        }
                    }else{
                        $errors[] = 'Aucun utilisateur trouve';
                    }
                }
            }
        ?>

        <?php if(isset($_SESSION['flash'])): ?>
            <?php foreach ($_SESSION['flash'] as $type => $message): ?>
                <div class="alert alert-<?= $type ?>">
                    <?= $message ?>
                </div>
            <?php endforeach; ?>
            <?php unset($_SESSION['flash']) ?>
        <?php endif; ?>


        <?php if(!empty($errors)) : ?>
          <div class="alert alert-danger">
              <?php foreach($errors as $error):?>
                <p class="text-center"><?= $error ; ?></p>
              <?php endforeach; ?>
          </div>    
        <?php endif; ?>  

      <div class="row rounded justify-content-center mt-3">
         <div class="col-md-4 pl-3 pr-3 pb-3 pt-3">
                <h1 class="text-center mt-3 mb-3">Connexion</h1>
            <form method="POST" action="">
                 <div class="form-group">
                    <label for="email">Addresse electronique</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="row justify-content-center">
                    <button type="submit" class="btn btn-secondary">Connexion</button>
                </div>
            </form>
        </div>
      </div>


     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>