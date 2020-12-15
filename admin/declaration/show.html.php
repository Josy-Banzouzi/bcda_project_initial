<!DOCTYPE html>
    <html>
        <head>
            <mata charset="utf-8"/>
            <title> </title>
        </head>
        <body>
            <?php require_once '../title.php'; ?>
            <div class="row justify-content-center mt-5">
                <div class="col-md-4 rounded bg-white pl-3 pr-3 pt-3 pb-3">
                <h1 class="mx-auto">Declaration des oeuvres</h1>

                <table class="table">
                    <tbody>
                        <tr>
                            <th>Id</th>
                            <td>{{ declaration.id }}</td>
                        </tr>
                        <tr>
                            <th>Content</th>
                            <td>{{ declaration.content }}</td>
                        </tr>
                    </tbody>
                </table>
                    <div class="row pb-2 pl-3 pr-3 justify-content-between">
                        <a href="{{ path('declaration_index') }}">back to list</a>
                        <a href="{{ path('declaration_edit', {'id': declaration.id}) }}">edit</a>
                        {{ include('admin/declaration/_delete_form.html.twig') }}
                    </div>
                </div>
            </div>
        </body>
    </html>
