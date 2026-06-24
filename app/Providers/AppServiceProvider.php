<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        try {
            // Share setting variable to all views
            if (\Illuminate\Support\Facades\Schema::hasTable('settings')) {
                $global_setting = \App\Models\Setting::firstOrCreate(
                    ['id' => 1],
                    [
                        'website_name' => 'Arini Furniture',
                        'address' => 'Trade Centre, Udhana Darwaja',
                        'phone' => '(844)555-8386',
                        'email' => 'demo@harvest.com',
                        'copyright_text' => 'Furnicom HTML © 2019 Demo Store. All Rights Reserved.'
                    ]
                );
                view()->share('global_setting', $global_setting);
            }

            if (\Illuminate\Support\Facades\Schema::hasTable('categories')) {
                $megaMenuCategories = \App\Models\Category::with('children.children')
                                        ->whereNull('parent_id')
                                        ->orderBy('sort_order')
                                        ->get();
                view()->share('megaMenuCategories', $megaMenuCategories);
            }
        } catch (\Exception $e) {
            // Ignore DB errors during migration
        }
    }
}

