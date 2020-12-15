<!-- <div class="row justify-content-center pl-3 pr-3">
    <button class="btn btn-outline-secondary">{{ button_label|default('Save') }}</button>
    <a href="index.html.php" class="btn btn-outline-secondary btn-sm ml-auto">back to list</a>
</div> -->
    <form method="POST" action="new.html.php" enctype="multipart/form-data">
        <div class="form-group">
            <label for="file">Entrer un fichier (PDF}</label>
            <input type="file" class="form-control" id="file" name="file">
        </div>
        <div class="form-group">
            <label for="title">Conditions pour </label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="row justify-content-center pr-2 pl-2">
            <button type="submit" class="btn btn-outline-secondary" name="upload">Soumettre</button>
            <a href="index.html.php" class="btn btn-outline-secondary ml-auto">back to list</a>
        </div>
    </form>
