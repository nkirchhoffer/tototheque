@if (Auth::user()->hasPermission('manage_authors'))
    <div class="list-group">
        <a href="{{ route('admin.authors.index') }}" class="list-group-item list-group-item-action {{ ($page == 'authors.index') ? 'active' : '' }}">Liste des auteurs</a>
        <a href="{{ route('admin.authors.create') }}" class="list-group-item list-group-item-action {{ ($page == 'authors.new') ? 'active' : '' }}">Ajouter un auteur</a>
    </div>

    <div class="list-group" style="margin-top: 25px">
        <a href="{{ route('admin.categories.index') }}" class="list-group-item list-group-item-action {{ ($page == 'categories.index') ? 'active' : '' }}">Liste des catégories</a>
        <a href="{{ route('admin.categories.create') }}" class="list-group-item list-group-item-action {{ ($page == 'categories.create') ? 'active' : '' }}">Ajouter une catégorie</a>
    </div>

    <div class="list-group" style="margin-top: 25px">
        <a href="{{ route('admin.books.index') }}" class="list-group-item list-group-item-action {{ ($page == 'books.index') ? 'active' : '' }}">Liste des livres</a>
        <a href="{{ route('admin.books.create') }}" class="list-group-item list-group-item-action {{ ($page == 'books.new') ? 'active' : '' }}">Ajouter un livre</a>
    </div>

    <div class="list-group" style="margin-top: 25px">
        <a href="{{ route('admin.publishers.index') }}" class="list-group-item list-group-item-action {{ ($page == 'publishers.index') ? 'active' : '' }}">Liste des éditeurs</a>
        <a href="{{ route('admin.publishers.create') }}" class="list-group-item list-group-item-action {{ ($page == 'publishers.new') ? 'active' : '' }}">Ajouter un éditeur</a>
    </div>
@endif