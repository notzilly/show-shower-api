<?php

namespace App\Http\Controllers;

use App\Models\Credit;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
}
