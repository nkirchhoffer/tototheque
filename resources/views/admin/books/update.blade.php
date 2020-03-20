@extends('admin.layouts.master')

@section('content')
    <section class="edit-author">
        <div class="row">
            <div class="col-md-3">
                @include('admin.layouts.content', ['page' => 'books.index'])
            </div>

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        Modifier le livre {{ $book->title }}
                    </div>
                    <form enctype="multipart/form-data" action="{{ route('admin.books.update', ['book' => $book]) }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Titre du livre</label>
                                <input type="text" class="form-control" name="title" id="title" value="{{ $book->title }}" required />
                            </div>

                            <div class="form-group">
                                <label for="description">Description du livre</label>
                                <textarea name="description" id="description" class="form-control" cols="30" rows="4" required>{{ $book->description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="authors">Auteur(s) du livre</label>
                                <select name="authors[]" id="authors" multiple required>
                                    @foreach($authors as $author)
                                        <option value="{{ $author->id }}" {{ $book->authors->contains($author) ? 'selected' : '' }}>{{ $author->getFullName() }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="categories">Catégorie(s) du livre</label>
                                <select name="categories[]" id="categories" multiple required>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $book->categories->contains($category) ? 'selected' : ''  }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="cover">Photo de couverture</label>
                                <input type="file" name="cover" id="cover" accept="image/*" class="form-control" />
                            </div>

                            <div class="form-group">
                                <label for="publishedAt">Date de publication</label>
                                <input type="date" class="form-control" name="publishedAt" value="{{ $book->published_at->toDateString() }}" required />
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Publier</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script type="text/javascript">
        new Choices(document.getElementById('authors'))
        new Choices(document.getElementById('categories'))
    </script>
@endsection