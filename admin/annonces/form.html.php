<!-- {{ form_start(form) }}
    {{ form_widget(form)}}
    <div class="row justify-content-center pl-3 pr-3">
        <button class="btn btn-outline-secondary">{{ button_label|default('Save') }}</button>
        <a href="index.html,twig" class="btn btn-outline-secondary btn-sm ml-auto">back to list</a>
    </div>
{{ form_end(form) }} -->

        <form method="POST" action="new.html.php" enctype="multipart/form-data">
        <div class="form-group">
            <label for="image">Entrer une image</label>
            <input type="file" class="form-control" id="image" name="image" required>
        </div>
        <div class="form-group">
            <label for="title">Titre</label>
            <textarea class="form-control" id="title" name="title" required rows="3"></textarea>
        </div>
        <div class="row justify-content-center pr-2 pl-2">
            <button type="submit" class="btn btn-outline-secondary" name="upload">Inserer</button>
            <a href="index.html.php" class="btn btn-outline-secondary ml-auto">back to list</a>
        </div>
        </form>
