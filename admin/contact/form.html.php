<!-- {{ form_start(form) }}
    {{ form_widget(form) }}
    <div class="row justify-content-center pl-3 pr-3">
        <button class="btn btn-outline-secondary">{{ button_label|default('Save') }}</button>
        <a href="index.html.php" class="btn btn-outline-secondary btn-sm ml-auto">back to list</a>
    </div>
{{ form_end(form) }} -->

    <form method="POST" action="new.html.php" enctype="multipart/form-data">
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" id="image" name="image" required>
        </div>
        <div class="form-group">
            <label for="numero">Poste</label>
            <input type="text" class="form-control" id="poste" name="poste" required>
        </div>
        <div class="form-group">
            <label for="nom">Nom et Prenom</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
        </div>
        <div class="form-group">
            <label for="email">Addresse electronique</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="row justify-content-center pr-2 pl-2">
            <button type="submit" class="btn btn-outline-secondary mr-auto" name="upload">Inserer</button>
            <a href="index.html.php" class="btn btn-outline-secondary ml-auto">back to list</a>
        </div>
    </form>
