<?php

namespace App\Http\Controllers;

use App\Models\Credit;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Collection;

class CreditController extends Controller
{
    /**
     * Shows all credits
     * 
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Credit::paginate(25);
    }

     /**
     * Returns credit by its id
     * 
     * @param  string  $id
     * @return \Illuminate\Database\Eloquent\Collection
     * 
     * @throws ModelNotFoundException
     */
    public function show($id)
    {
        /**
         * @var  \Illuminate\Database\Eloquent\Collection
         */
        $credits = Credit::where('id', (int)$id)->get();

        if($credits->count())
        {
            return $credits;
        }
        throw new ModelNotFoundException();
    }

     /**
     * Returns characters of a given credit
     * 
     * @param  string  $id
     * @return \Illuminate\Support\Collection
     * 
     * @throws ModelNotFoundException
     */
    public function characters($id)
    {
        /**
         * @var  \Illuminate\Database\Eloquent\Collection
         */
        $credits = Credit::where('id', (int)$id)->get();

        if($credits->count()) {
            return collect([
                'id' => $credits->first()->id,
                'name' => $credits->first()->name,
                'characters' => $credits->map->only(['title_id', 'character', 'role'])->toArray(),
            ]);
        }

        throw new ModelNotFoundException();
    }
}
