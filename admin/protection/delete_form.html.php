<form method="post" action="{{ path('protection_delete', {'id': protection.id}) }}" onsubmit="return confirm('Are you sure you want to delete this item?');">
    <input type="hidden" name="_method" value="DELETE">
    <input type="hidden" name="_token" value="{{ csrf_token('delete' ~ protection.id) }}">
    <button class="btn btn-outline-secondary">Delete</button>
</form>
