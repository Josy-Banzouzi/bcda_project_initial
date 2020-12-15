
        <!-- {{ form_start(form) }}
        {{ form_widget(form) }}
        <div class="row justify-content-center pl-3 pr-3">
                <button class="btn btn-outline-secondary mr-auto">{{ button_label|default('Save') }}</button>
                <a href="index.html.php" class="btn btn-outline-secondary btn-sm ml-auto">back to list</a>
        </div>
        {{ form_end(form) }} -->

        <form method="POST" action="new.html.php">
            <div class="form-group">
                <label for="nom">Noms et Prenoms</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>
            <div class="form-group">
                <label for="date">Date d'hadesion</label>
                <input type="text" class="form-control" id="date" name="date" required>
            </div>
            <div class="form-group">
                <label for="numero">Numero de carte</label>
                <input type="text" class="form-control" id="numero" name="numero"required>
            </div>
            <div class="form-group">
                <label for="cygle">Cygle</label>
                <input type="text" class="form-control" id="cygle" name="cygle"required>
            </div>
            <div class="row justify-content-center pr-2 pl-2">
                <button type="submit" class="btn btn-outline-secondary mr-auto">Inserer</button>
                <a href="index.html.php" class="btn btn-outline-secondary ml-auto">back to list</a>
            </div>
        </form>



