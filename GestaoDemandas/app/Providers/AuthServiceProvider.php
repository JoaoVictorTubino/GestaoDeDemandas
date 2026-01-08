<?php
namespace App\Providers;

use App\Models\Demanda;
use App\Policies\DemandaPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Demanda::class => DemandaPolicy::class,
    ];

    public function boot(): void{
        $this->registerPolicies();
    }
}
