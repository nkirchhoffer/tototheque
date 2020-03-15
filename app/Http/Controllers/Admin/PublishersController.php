<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePublisherRequest;
use App\Publisher;
use Exception;

class PublishersController extends Controller
{
    private $publishers;

    public function construct(Publisher $publishers)
    {
        $this->publishers = $publishers;

        $this->middleware('permisison:manage_publishers');
    }

    public function index()
    {
        return view('admin.publishers.index', [
            'publishers' => Publisher::paginate(10),
        ]);
    }

    public function create()
    {
        return view('admin.publishers.new');
    }

    public function submitCreate(CreatePublisherRequest $request)
    {
        $name = $request->get('name');
        $country = $request->get('country');
        $createdAt = $request->get('created_at');
        $closedAt = $request->get('closed_at');

        Publisher::insert([
            'name'         => $name,
            'country_code' => $country,
            'opened_at'    => $createdAt,
            'closed_at'    => $closedAt,
            'user_id'      => $request->user()->id,
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        $publisher = Publisher::where('name', '=', $name)->first();

        return redirect()->route('admin.publishers.index')->with('success', 'L\'éditeur '.$publisher->name.' a bien été créé !');
    }

    public function delete(Publisher $publisher)
    {
        try {
            $publisher->delete();
        } catch (Exception $e) {
            return redirect()->back()->withErrors('Une erreur est survenue lors de la suppression de l\'éditeur');
        }

        return redirect()->back()->with('success', 'Cet éditeur a bien été supprimé !');
    }

    public function update(Publisher $publisher)
    {
        return view('admin.publishers.edit', ['publisher' => $publisher]);
    }

    public function submitUpdate(CreatePublisherRequest $request, Publisher $publisher)
    {
        $name = $request->get('name');
        $country = $request->get('country');
        $createdAt = $request->get('createdAt');
        $closedAt = $request->get('closedAt');

        $publisher->name = $name;
        $publisher->country_code = $country;
        $publisher->opened_at = $createdAt;
        $publisher->closed_at = $closedAt;
        $publisher->save();

        return redirect()->route('admin.publishers.index')->with('success', 'L\'éditeur '.$publisher->name.' a bien été modifié !');
    }
}
