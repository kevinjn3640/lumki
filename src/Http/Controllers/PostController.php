<?php

namespace Lumki\Lumki\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Support\Facades\View;
use App\Models\User;

class PostController
{
    public function index()
    {
//        dd("HI");
        Inertia::setRootView('lumki::lumki');

        View::share([
            'cssPath' => __DIR__.'/../../../public/css/app.css',
            'jsPath' => __DIR__.'/../../../public/js/app.js',
//            'manifestPath' => __DIR__.'/../../../public/js/manifest.js',
//            'vendorPath' => __DIR__.'/../../../public/js/vendor.js',
//            'translations' => static::getTranslations(),
        ]);

//        Inertia::share(app(FrontendState::class)->current($type, $billable));

        return Inertia::render('User', [
            'users' => User::find(1),
        ]);
    }

    public function show()
    {
        //
    }

    public function store()
    {
        // Let's assume we need to be authenticated
        // to create a new post
//        if (! auth()->check()) {
//            abort (403, 'Only authenticated users can create new posts.');
//        }
//
//        request()->validate([
//            'title' => 'required',
//            'body'  => 'required',
//        ]);
//
//        // Assume the authenticated user is the post's author
//        $author = auth()->user();
//
//        $post = $author->posts()->create([
//            'title'     => request('title'),
//            'body'      => request('body'),
//        ]);
//
//        return redirect(route('posts.show', $post));
    }
}
