<?php

namespace App\Http\Controllers;

use App\Models\Exponse;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExponsesController extends Controller
{
    public function create()
    {
        return view('Exponses.addExponses');
    }
    public function store(Request $request)
    {
        $vaidated = $request->validate([
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'amount_for_one' => 'required|numeric',
            'date' => 'required|date',
            'category_id' => 'required|integer'
        ]);

        $user = User::find(Auth::id());
        $colocation_id = $user->colocations()->first()->id;
        //select user where user.id = id & select colocation & id
        //$colocation_id = User::with('colocation')->find(Auth::id());
        // select join where user.id = id

        Exponse::create([
            'colocation_id'=>$colocation_id,
            'payer_id' => Auth::id(),
            'category_id'=> $vaidated['category_id'],
            'title' => $vaidated['title'],
            'amount' => $vaidated['amount'],
            'date' => $vaidated['date'],
            'amount_for_one'=>$vaidated['amount_for_one'],
        ]);
        return redirect()->route('colocation.index');
    }
}
