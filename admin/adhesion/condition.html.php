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
        <title></title>
    </head>
    <body>
    <div class="container mb-4">
        {% for adhesion in adhesions %}

        {% endfor %}
        
    </div>

    <?php require_once 'before_footer.php'; ?>
    
    </body>
</html>