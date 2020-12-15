{% extends 'base.html.twig' %}

{% block title %}Protection index{% endblock %}

{% block body %}
        {{ include('admin/title.html.twig') }}
<div class="container rounded bg-white pt-2 pr-5 mt-5">
    <div class="row mt-3 mb-4">
        <h1 class="mx-auto">Liste ouevres Protege</h1>
        <a href="new.html.php" class="btn btn-outline-secondary btn-lg ml-auto">Ajouter</a>
    </div>
    {% if protections | length > 0 %}
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Content</th>
                <th>actions</th>
            </tr>
        </thead>
        <tbody>
        {% for protection in protections %}
            <tr>
                <td>{{ protection.id }}</td>
                <td>{{ protection.content }}</td>
                <td>
                    <a href="{{ path('protection_show', {'id': protection.id}) }}">show</a>
                    <a href="{{ path('protection_edit', {'id': protection.id}) }}">edit</a>
                </td>
            </tr>
        {% endfor %}
        </tbody>
    </table>
    {% else %}
        <h1 class="text-center"> Aucune information disponnible</h1>
    {% endif %}
</div>
{% endblock %}
