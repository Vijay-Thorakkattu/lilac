<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

class listController extends Controller
{
    //

    public function listView()
    {
        $users = Users::orderBy('id', 'desc')->get();
        return view('lists.index',compact('users')); 
    }

    public function search(Request $request){

        $query = $request->input('query');
        $users = Users::where('name', 'like', "%$query%")
                        ->orWhereHas('department', function ($q) use ($query) {
                            $q->where('name', 'like', "%$query%");
                        })
                        ->orWhereHas('designation', function ($q) use ($query) {
                            $q->where('name', 'like', "%$query%");
                        })
                        ->orderBy('id', 'desc')
                        ->get();

        $searchResults = view('lists.search-results', compact('users'))->render();
        return response()->json(['searchResults' => $searchResults]);
    }
}
