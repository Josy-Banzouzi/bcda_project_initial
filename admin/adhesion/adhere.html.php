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
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
    <div class="abonner">
        <img src="images/image4.jpg" alt="image" class="image img-fluid">
        <div class="legende text">Bureau Congolais du Droit d'Auteur</div>
    </div>

    <div class="container rounded bg-white pt-2 pr-5 mt-5">
        <div class="row mt-3 mb-4">
            <h1 class="mx-auto">Tous les Adhere</h1>
        </div>
        {% if adheres | length > 0 %}
            <table class="table">
                <thead>
                <tr>
                    <th>Noms et Prenoms</th>
                    <th>Date d'Adhesion</th>
                    <th>Numero de carte</th>
                    <th>Cygle</th>
                </tr>
                </thead>
                <tbody>
                {% for adhere in adheres %}
                    <tr>
                        <td>{{ adhere.name }}</td>
                        <td>{{ adhere.dateAdhesion }}</td>
                        <td>{{ adhere.numeroCarte }}</td>
                        <td>{{ adhere.cygle }}</td>
                    </tr>
                {% endfor %}
                </tbody>
            </table>
        {% else %}
            <h1 class="text-center"> Aucune information disponible</h1>
        {% endif %}
    </div>
    
    <?php require_once '../before_footer.php'; ?>
    

    <?php require_once '../footer.php';?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    </body>
</html>    