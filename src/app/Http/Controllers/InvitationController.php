<?php

namespace App\Http\Controllers;

use App\Mail\InvitationMail;
use App\Models\Invitation;
use App\Models\Colocation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Mime\Email;

class InvitationController extends Controller
{
    public function sendInvitation(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
            ]);
            $user = User::find(Auth::id());
        $colocation = $user->colocations()->first();

        $token = rand(100000, 999999);
        $invitation = Invitation::updateOrCreate([
            'colocation_id' => $colocation->id,
            'email' => $request->email,
            'token' => $token,
            'status' => 'pending',
            'expires_at' => '2026-02-25 15:16:26'
        ]);

        return back();

        try {

            Mail::to($request->email)->send(new InvitationMail($invitation));
        } catch (\Exception  $e) {
            info('Eroor: ' . $e->getMessage());
            dd($e);
        }
    }
    public function joinByCode(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('user.viewLogin');
        }
        $user = User::find(Auth::id());
        $invitation = Invitation::where('token', $request->token)->where('status', 'pending')->where('email', $user->email)->first();

        $user->colocations()->attach($invitation->colocation_id);
        
        $invitation->update([
            'status' => 'accepted'
        ]);

        return redirect()->route('index');
    }
}
