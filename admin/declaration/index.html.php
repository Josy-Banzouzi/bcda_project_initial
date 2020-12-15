<!DOCTYPE html>
    <html>
        <head>
            <mata charset="utf-8"/>
            <title> </title>
        </head>
        <body>
            <?php require_once '../title.php'; ?>
            <div class="container rounded bg-white pt-2 pr-5 mt-5">
                <div class="row mt-3 mb-4">
                    <h1 class="mx-auto">Liste des Declarations</h1>
                    <a href="new.html.php" class="btn btn-outline-secondary btn-lg ml-auto">Ajouter</a>
                </div>
                {% if declarations | length > 0 %}
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Content</th>
                            <th>actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    {% for declaration in declarations %}
                        <tr>
                            <td>{{ declaration.id }}</td>
                            <td>{{ declaration.content }}</td>
                            <td>
                                <!-- <a href="{{ path('declaration_show', {'id': declaration.id}) }}">show</a>
                                <a href="{{ path('declaration_edit', {'id': declaration.id}) }}">edit</a> -->
                            </td>
                        </tr>
                    {% endfor %}
                    </tbody>
                </table>
                {% else %}
                    <h1 class="text-center"> Aucune information disponible</h1>
                {% endif %}
            </div>
        </body>
    </html>
