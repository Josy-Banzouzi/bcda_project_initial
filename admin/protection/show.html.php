{% extends 'base.html.twig' %}

{% block title %}Protection{% endblock %}

{% block body %}
    {{ include('admin/title.html.twig') }}
    <div class="row justify-content-center mt-5">
        <div class="col-md-4 rounded bg-white pl-3 pr-3 pt-3 pb-3">
    <h1 class="mx-auto">Protection des Oeuvres</h1>

    <table class="table">
        <tbody>
            <tr>
                <th>Id</th>
                <td>{{ protection.id }}</td>
            </tr>
            <tr>
                <th>Content</th>
                <td>{{ protection.content }}</td>
            </tr>
        </tbody>
    </table>
    <div class="row pb-2 pl-3 pr-3 justify-content-between">
        <a href="{{ path('protection_index') }}">back to list</a>
        <a href="{{ path('protection_edit', {'id': protection.id}) }}">edit</a>
        {{ include('admin/protection/_delete_form.html.twig') }}
    </div>
    </div>
    </div>
{% endblock %}
