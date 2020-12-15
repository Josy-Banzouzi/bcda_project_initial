<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>BCDA-CONGO | Connexion</title>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/style.css">
</head>
<body>

            <?php
            require_once 'db.php';

            if (!empty($_POST)) {

                $email = htmlspecialchars(trim($_POST['email']));
                $password = htmlspecialchars(trim($_POST['password']));
                $name = htmlspecialchars($_POST['name']);
                $errors = [];

                if(empty($email) OR empty($password) OR empty($name)){

                    $errors [] = 'Veuillez remolir tous les champs';
                }
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $errors ['email'] = 'Email nom valide';
                }else{
                    $sql = "SELECT * FROM user WHERE email = ?";
                    $req = $pdo->prepare($sql);
                    $req->execute(array($email));
                    $user = $req->fetch();
                    if($user){
                        $errors[] = 'cet email est deja utiliser pour un autre compte';
                    }
                }

                if (empty($errors)) {
                    $hash = password_hash($password, PASSWORD_DEFAULT);
                    $sql = "INSERT INTO user(email, password, name) VALUES(?,?,?) ";
                    $req = $pdo->prepare($sql);
                    $req->execute(array($email,$hash,$name));
                    $_SESSION['flash']['success'] = "Compte cree avec succes";
                    header('Location:index.php');
                    exit();
                }
            }

            ?>


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

                        <div class="form-group">
                            <label for="name">Entre votre nom</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-outline-secondary mr-auto">Connexion</button>
                        </div>
                    </form>
                </div>
            </div>
        

 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>