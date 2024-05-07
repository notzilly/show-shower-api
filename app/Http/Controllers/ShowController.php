<?php

namespace App\Http\Controllers;

use App\Models\Show;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    /**
     * Shows all shows
     *
     * @return \Illuminate\Support\Collection
     */
    public function index()
    {
        return view('shows', ['shows' => Show::paginate(25)]);
    }

    // /**
    //  * Shows all shows
    //  *
    //  * @return \Illuminate\Support\Collection
    //  */
    // public function store()
    // {
    //     return Show::all()->slice(0, 50);
    // }

    /**
     * Returns show by its id
     *
     * @param  string  $id
     * @return Show
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function show($id)
    {
        return view('show', ['show' => Show::findOrFail($id)]);
    }

    // /**
    //  * Shows all shows
    //  *
    //  * @return \Illuminate\Support\Collection
    //  */
    // public function update()
    // {
    //     return Show::all()->slice(0, 50);
    // }

    // /**
    //  * Shows all shows
    //  *
    //  * @return \Illuminate\Support\Collection
    //  */
    // public function destroy()
    // {
    //     return Show::all()->slice(0, 50);
    // }
}
