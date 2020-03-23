<div class="list-group">
    <a href="{{ route('admin.borrowings.index') }}" class="list-group-item list-group-item-action {{ ($page == 'borrowings.index') ? 'active' : '' }}">Nouveaux emprunts</a>
    <a href="{{ route('admin.borrowings.current') }}" class="list-group-item list-group-item-action {{ ($page == 'borrowings.current') ? 'active' : '' }}">Emprunts en cours</a>
    <a href="{{ route('admin.borrowings.finished') }}" class="list-group-item list-group-item-action {{ ($page == 'borrowings.finished') ? 'active' : '' }}">Emprunts terminés</a>
</div>