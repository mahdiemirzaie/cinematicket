<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Section;
use App\Models\Ticket;
use App\Policies\SectionPolicy;
use App\Policies\TicketPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Section::class=>SectionPolicy::class,
        Ticket::class=>TicketPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
//        Gate::define('update_post', function ($user, $movie) {
//            if ($user->type === 'admin') {
//                return true;
//            }
//            if ($movie->user_id === $user->id) {
//                return true;
//            } else {
//                return false;
//            }
//        });

    }
}
