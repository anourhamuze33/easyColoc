<?php

namespace App\Http\Controllers;

use App\Models\Colocation;
use App\Models\Exponse;
use App\Models\Settelment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ExponsesController extends Controller
{
    public function getinfos()
    {
        $now = Carbon::now();
        $user = User::find(Auth::id());
        $colocation_name = $user->colocations()->first()->name;
        $colocation = $user->colocations()->where('colocations.role', 'active')->first();
        $infos['currentColocated'] = $colocation->members()->count();
        $infos['totalThisMonth'] = Exponse::whereYear('date', $now->year)->whereMonth('date', $now->month)->sum('amount');
        $infos['totalDeponseMonth'] = Exponse::whereYear('date', $now->year)->whereMonth('date', $now->month)->count('id');
        $infos['currentMonthName'] = Carbon::now()->format('F');
        $infos['currentYear'] = Carbon::now()->year;
        $infos['currentColocation'] = $colocation_name;
        $infos['currentRole'] = DB::table('members')->where('user_id', $user->id)->where('colocation_id', $colocation->id)->value('role');
        $infos['currentSold'] = $user->expenses()->sum('amount');
        $infos['remboursementTotal'] = 0;
        return $infos;
    }

    public function getColorsChanged()
    {
        $colorsProfile = [
            'av-a','av-b','av-c','av-d','av-e','av-f','av-g','av-h','av-i',
            'av-j','av-k','av-l','av-m','av-n','av-o','av-p','av-q','av-r',
            'av-s','av-t','av-u','av-v','av-w','av-x','av-y','av-z',
        ];
    }
    public function index()
    {
        $exponses = Exponse::with('category')->withCount(['settelments as nbrPayed' => function ($q) {
            $q->where('is_payed', 'yes');
        }])->get();
        $user = User::find(Auth::id());
        $fromUsers = Settelment::with('fromUser')->where('to_user_id', $user->id)->get();

        // $nbrTotalForExponses = DB::table('settelments')->select('exponse_id', DB::raw('COUNT(id) as nbrRemboursement'))->where('is_payed', 'yes')->groupBy('exponse_id')->get();
        // $nbrTotalForExponse = DB::table('settelments')->where('is_payed', 'yes')->groupBy('exponse_id')->selectRaw('exponse_id, COUNT(*) as nbrRemboursement')->get();
        $infos = $this->getinfos();

        // @foreach ($nbrTotalForExponses as $nbrTotalForExponse) {

        // }

        return view('Exponses.index', compact('infos', 'exponses', 'fromUsers', 'user'));
    }
    public function create()
    {
        return view('Exponses.addExponses');
    }
    public function store(Request $request)
    {
        $user = User::find(Auth::id());
        $colocation = $user->colocations()->first();
        $vaidated = $request->validate([
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'amount_for_one' => 'required|numeric',
            'date' => 'required|date',
            'category_id' => 'required|integer'
        ]);

        //select user where user.id = id & select colocation & id
        //$colocation_id = User::with('colocation')->find(Auth::id());
        // select join where user.id = id

        $exponse = Exponse::create([
            'colocation_id' => $colocation->id,
            'payer_id' => Auth::id(),
            'category_id' => $vaidated['category_id'],
            'title' => $vaidated['title'],
            'amount' => $vaidated['amount'],
            'date' => $vaidated['date'],
            'amount_for_one' => $vaidated['amount_for_one'],
        ]);

        $colo_members_id = $colocation->members()->pluck('members.id')->toArray();
        foreach ($colo_members_id as $member_id) {
            if ($member_id == $user->id) continue;
            Settelment::create([
                'colocation_id' => $colocation->id,
                'from_user_id' => $member_id,
                'to_user_id' => $user->id,
                'amount' => $vaidated['amount_for_one'],
                'exponse_id' => $exponse->id,
                'is_payed' => 'no'
            ]);
        }
        return redirect()->route('colocation.index');
    }
}
