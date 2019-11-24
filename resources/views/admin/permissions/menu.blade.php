<div class="list-group">
    <a href="{{ route('admin.perms.assign') }}" class="list-group-item list-group-item-action {{ ($page == 'index') ? 'active' : '' }}">Assigner des permissions</a>
    <a href="{{ route('admin.roles.index') }}" class="list-group-item list-group-item-action {{ ($page == 'roles.index') ? 'active' : '' }}">Liste des utilisateurs</a>
    <a href="{{ route('admin.perms.roles') }}" class="list-group-item list-group-item-action {{ ($page == 'roles') ? 'active' : '' }}">Ajouter des rôles</a>
    <a href="{{ route('admin.roles.assign') }}" class="list-group-item list-group-item-action {{ ($page == 'users') ? 'active' : '' }}">Assigner des rôles</a>
</div>