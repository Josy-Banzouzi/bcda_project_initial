{% extends 'base.html.twig' %}

{% block title %}New Protection{% endblock %}

{% block body %}
<div class="row rounded justify-content-center mt-3">
    <div class="col-md-4 pl-3 pr-3 pb-3 pt-3">
    <h1>Create new Protection</h1>
    {{ include('admin/protection/_form.html.twig') }}
    </div>
</div>
{% endblock %}
