<?php

namespace App\Providers;

use App\Models\Page;
use Illuminate\Support\ServiceProvider;

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
        $pages = Page::where('parent_id', 0)->get();
        if($pages->count() === 0){
            $pages = Page::where('parent_id', 1)->get();
        } 


        $html = "<ul>";
        foreach ($pages as $page) {
            $html .= "<li>$page->title</li>";
            if($page->childPages){
                $html .= "<ul>";
                foreach($page->childPages as $child){
                    $html .= "<li>$child->title</li>";
                    if($child->childPages){
                        $html .= "<ul>";
                        foreach($child->childPages as $ch){
                            $html .= "<li>$ch->title</li>";
                            if($ch->childPages){
                                $html .= "<ul>";
                                foreach($ch->childPages as $c){
                                    $html .= "<li>$c->title</li>";
                                }
                                $html .= "</ul>";
                            }
                        }
                        $html .= "</ul>";
                    }
                }
                $html .= "</ul>";
            }
        }

        $html .= "</ul>";
        // echo $html;
        // dd($html);
        view()->composer('layouts.navigation', function ($view) use ($pages) {
            $view->with('menuItems',
                $pages
            );
        });
    }
}
