<!-- <form method="post" action="{{ path('subscriber_delete', {'id': subscriber.id}) }}" onsubmit="return confirm('Are you sure you want to delete this item?');">
    <input type="hidden" name="_method" value="DELETE">
    <input type="hidden" name="_token" value="{{ csrf_token('delete' ~ subscriber.id) }}">
    <button class="btn btn-outline-secondary">Delete</button>
</form> -->

<?php
    require_once '../db.php';
    
    if(isset($_GET['delete'])){
         $id = $_GET['delete'];

        $req = $pdo->query("DELETE FROM abonnes WHERE id='$id'");
        header('Location:index.html.php');
        exit();

    }
?>

