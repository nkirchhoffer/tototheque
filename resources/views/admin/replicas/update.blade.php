@extends('admin.layouts.master')

@section('content')
    <section class="new-replica">
        <div class="row">
            <div class="col-md-3">
                @include('admin.layouts.content', ['page' => 'replica.new'])
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        Modifier un replica
                    </div>
                    <form enctype="multipart/form-data" action="{{ route('admin.replicas.update', ['replica' => $replica]) }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="publisher">Editeur du réplica</label>
                                <select name="publisher" class="form-control" required id="publishers">
                                    @foreach ($publishers as $publisher)
                                        <option value="{{ $publisher->id }}" {{ ($publisher->id === $replica->publisher->id) ? 'selected' : '' }}>{{ $publisher->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="isbn">ISBN du replica</label>
                                <input type="text" class="form-control" name="isbn" value="{{ $replica->isbn }}" required />
                            </div>

                            <div class="form-group">
                                <label for="cover">Photo de couverture</label>
                                <input type="file" class="form-control" name="cover" accept="image/*" />
                            </div>

                            <div class="form-group">
                                <label for="state">État du replica</label>
                                <select name="state" class="form-control" required id="state">
                                    @for($i = 0; $i < 5; $i++)
                                        <option value="{{ $i }}" {{ ($i === $replica->state) ? 'selected' : '' }}>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="publishedAt">Date de publication</label>
                                <input type="date" class="form-control" name="publishedAt" value="{{ $replica->published_at->toDateString() }}" required />
                            </div>

                            <div class="form-group">
                                <label for="boughtAt">Date d'achat</label>
                                <input type="date" class="form-control" name="boughtAt" value="{{ $replica->bought_at->toDateString() }}" required />
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Valider</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script type="text/javascript">
        new Choices(document.getElementById('publishers'))
    </script>
@endsection