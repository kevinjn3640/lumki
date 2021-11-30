<?php

namespace Lumki\Lumki\Http\Controllers;

use Illuminate\Support\Facades\View;
use Inertia\Inertia;

class PostController
{

    /**
     * Show the billing portal.
     *
     * @param  string|null  $type
     * @param  mixed  $id
     * @return \Inertia\Response
     */
    public function __invoke($type = null, $id = null)
    {

        Inertia::setRootView('lumki::lumki');

        View::share([
            'cssPath' => __DIR__.'/../../../public/css/app.css',
            'jsPath' => __DIR__.'/../../../public/js/app.js',
//            'translations' => static::getTranslations(),
        ]);

//        Inertia::share(app(FrontendState::class)->current($type, $billable));

        return Inertia::render('User');
    }
//
//    /**
//     * Get the Spark translations from the appropriate language file.
//     *
//     * @return string
//     */
//    private static function getTranslations()
//    {
//        if (! is_readable($file = resource_path('lang/spark/'.app()->getLocale().'.json'))) {
//            $file = resource_path('lang/spark/'.app('translator')->getFallback().'.json');
//        }
//
//        return is_readable($file) ? file_get_contents($file) : '{}';
//    }
}
