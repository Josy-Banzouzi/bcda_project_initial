<!-- <form method="post" action="{{ path('annonces_delete', {'id': annonce.id}) }}" onsubmit="return confirm('Are you sure you want to delete this item?');">
    <input type="hidden" name="_method" value="DELETE">
    <input type="hidden" name="_token" value="{{ csrf_token('delete' ~ annonce.id) }}">
    <button class="btn btn-outline-secondary">Delete</button>
</form> -->

<?php
    require_once '../db.php';
    
    if(isset($_GET['delete'])){
         $id = $_GET['delete'];

        $req = $pdo->query("DELETE FROM annonces WHERE id='$id'");
        header('Location:index.html.php');
        exit();

    }
?>