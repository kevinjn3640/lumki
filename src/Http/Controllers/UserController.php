<?php

namespace Lumki\Lumki\Http\Controllers;

//use Illuminate\Foundation\Auth\User;
use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Illuminate\Support\Facades\View;

//use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(): \Inertia\Response
    {
        Inertia::setRootView('lumki::lumki');

        View::share([
            'cssPath' => __DIR__ . '/../../../public/css/app.css',
            'jsPath' => __DIR__ . '/../../../public/js/app.js',
        ]);

        return Inertia::render('Lumki/Users/Index');
    }

    public function edit(\App\Models\User $user): \Inertia\Response
    {
        return Inertia::render('Lumki/Users/Edit', [
            'user' => $user,
            'roles' => Role::all(),
//            'custom_fields' => config('lumki.custom_fields')
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
