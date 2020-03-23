<div class="list-group">
    <a href="{{ route('admin.borrowings.index') }}" class="list-group-item list-group-item-action {{ ($page == 'borrowings.index') ? 'active' : '' }}">Nouveaux emprunts</a>
    <a href="{{ route('admin.authors.create') }}" class="list-group-item list-group-item-action {{ ($page == 'authors.new') ? 'active' : '' }}">Emprunts en cours</a>
</div>