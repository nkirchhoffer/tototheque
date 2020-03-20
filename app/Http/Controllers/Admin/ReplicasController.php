<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateReplicaRequest;
use App\Http\Requests\UpdateReplicaRequest;
use App\Publisher;
use App\Replica;
use Illuminate\Auth\AuthManager;
use Illuminate\Support\Facades\Storage;

class ReplicasController extends Controller
{
    public function __construct(AuthManager $auth)
    {
        $this->auth = $auth;

        $this->middleware('permission:manage_books');
    }

    public function index(Book $book)
    {
        return view('admin.replicas.index', [
            'book'     => $book,
            'replicas' => $book->replicas()->paginate(10),
        ]);
    }

    public function create(Book $book)
    {
        return view('admin.replicas.new', [
            'book'       => $book,
            'publishers' => Publisher::all(),
        ]);
    }

    public function submitCreate(CreateReplicaRequest $request, Book $book)
    {
        $publisher = $request->get('publisher');
        $isbn = $request->get('isbn');
        $cover = $request->file('cover');
        $state = $request->get('state');
        $publishedAt = $request->get('publishedAt');
        $boughtAt = $request->get('boughtAt');

        if (!$cover->isValid()) {
            return redirect()->back()->withErrors('Une erreur a été rencontrée lors de l\'upload de la couverture.');
        }

        if ($state < 0 || $state > 4) {
            return redirect()->back()->withErrors('L\'état du réplica doit être compris entre 0 et 4.');
        }

        $name = uniqid().'.'.$cover->extension();
        $path = $cover->storeAs('covers', $name, 's3');
        Storage::disk('s3')->setVisibility($path, 'public');

        $replica = new Replica();
        $replica->book_id = $book->id;
        $replica->publisher_id = $publisher;
        $replica->isbn = $isbn;
        $replica->cover_url = $path;
        $replica->state = $state;
        $replica->published_at = $publishedAt;
        $replica->bought_at = $boughtAt;
        $replica->save();

        return redirect()->route('admin.replicas.index', ['book' => $book])->with('success', 'Un replica de '.$book->title.' a bien été créé.');
    }

    public function update(Replica $replica)
    {
        return view('admin.replicas.update', [
            'replica'    => $replica,
            'publishers' => Publisher::all(),
        ]);
    }

    public function submitUpdate(UpdateReplicaRequest $request, Replica $replica)
    {
        $publisher = $request->get('publisher');
        $isbn = $request->get('isbn');
        $cover = $request->file('cover');
        $state = $request->get('state');
        $publishedAt = $request->get('publishedAt');
        $boughtAt = $request->get('boughtAt');

        if (!is_null($cover)) {
            if (!$cover->isValid()) {
                return redirect()->back()->withErrors('Une erreur a été rencontrée lors de l\'upload de la couverture.');
            }

            $name = uniqid().'.'.$cover->extension();
            $path = $cover->storeAs('covers', $name, 's3');
            Storage::disk('s3')->setVisibility($path, 'public');

            $replica->cover_url = $path;
        }

        if ($state < 0 || $state > 4) {
            return redirect()->back()->withErrors('L\'état du réplica doit être compris entre 0 et 4.');
        }

        $replica->publisher_id = $publisher;
        $replica->isbn = $isbn;
        $replica->state = $state;
        $replica->published_at = $publishedAt;
        $replica->bought_at = $boughtAt;
        $replica->save();

        return redirect()->route('admin.replicas.index', ['book' => $replica->book])->with('success', 'Un replica de '.$replica->book->title.' a bien été modifié.');
    }

    public function delete(Replica $replica)
    {
        $replica->delete();

        return redirect()->back()->with('success', 'Ce replica a bien été supprimé.');
    }
}
