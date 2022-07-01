<?php

namespace App\Http\Controllers;

use App\Models\Credit;
use Illuminate\Http\Request;

class CreditController extends Controller
{
    /**
     * Shows all credits
     * 
     * @return \Illuminate\Support\Collection
     */
    public function index()
    {
        return Credit::paginate(25);
    }

     /**
     * Returns credit by its id
     * 
     * @param  string  $id
     * @return Credit
     * 
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function show($id)
    {
        return Credit::where('id', $id)->get();
    }
}
