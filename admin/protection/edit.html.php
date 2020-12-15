{% extends 'base.html.twig' %}

{% block title %}Edit Protection{% endblock %}

{% block body %}
     {{ include('admin/title.html.twig') }}
<div class="row justify-content-center">
    <div class="col-md-4">
        <h1 class="text-center">Edit</h1>
        {{ include('admin/protection/_form.html.twig', {'button_label': 'Update'}) }}
        <a href="{{ path('protection_index') }}">back to list</a>
    </div>
</div>
{% endblock %}
