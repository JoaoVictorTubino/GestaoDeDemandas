<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class SideBarViewProvider extends ServiceProvider
{
    public function boot(): void
    {
        View::composer('layouts.partials.sidebar', function ($view) {

            if (!Auth::check()) {
                return;
            }

            $user = Auth::user();

            $foto = $user->foto
                ? asset('storage/' . $user->foto)
                : 'https://www.gravatar.com/avatar/' .
                  md5(strtolower(trim($user->email))) .
                  '?s=80&d=mp';

            $view->with([
                'authUserNome' => $user->nome,
                'authUserFoto' => $foto,
            ]);
        });
    }
}
