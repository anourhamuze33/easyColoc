<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class colocationActiveMiddlware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = User::find(Auth::id());
        if ($user->colocations()->count() === 0) {
            return redirect()->route('colocation.premier')
                ->withErrors([
                    'colocation' => 'Vous n\'avez pas de colocation.'
                ]);
        }
        $colocationActive = $user->colocations()->where('colocations.role', 'active')->first();
        if (!$colocationActive) {
            return redirect()->route('colocation.premier')
                ->withErrors([
                    'colocation' => "Vous n'avez pas de colocation active."
                ]);
        }
        return $next($request);
    }
}
