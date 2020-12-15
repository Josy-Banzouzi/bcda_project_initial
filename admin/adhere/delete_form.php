<!-- <form method="post" action="{{ path('adhere_delete', {'id': adhere.id}) }}" onsubmit="return confirm('Are you sure you want to delete this item?');">
    <input type="hidden" name="_method" value="DELETE">
    <input type="hidden" name="_token" value="{{ csrf_token('delete' ~ adhere.id) }}">
    <button class="btn btn-outline-secondary">Delete</button>
</form> -->

<?php
    require_once '../db.php';
    
    if(isset($_GET['delete'])){
         $id = $_GET['delete'];

        $req = $pdo->query("DELETE FROM adhere WHERE id='$id'");
        header('Location:index.html.php');
        exit();

    }
?>
