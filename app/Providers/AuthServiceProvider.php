<?php

namespace App\Providers;

use App\Category;
use App\Policies\CategoryPolicy;
use App\Policies\ProductPolicy;
use App\Product;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
       // Category::class=>CategoryPolicy::class
        Product::class=>ProductPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function ($user,$ability){
            if ($user->super_admin)
                return true;
        });
       /* Gate::resource('category','App\Policies\CategoryPolicy');
        Gate::resource('product','App\Policies\ProductPolicy',[
            'index'=>'index'
        ]);
        Gate::resource('manufactory','App\Policies\ManufactoryPolicy');
        Gate::resource('account','App\Policies\AccountPolicy',[
            'permissions'=>'permissions',
            'permissions'=>'updatePermissions'
        ]);*/

    }
}
