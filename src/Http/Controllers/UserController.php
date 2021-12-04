<?php

namespace Lumki\Lumki\Http\Controllers;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Illuminate\Support\Facades\View;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Lumki\Lumki\FrontendState;
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
        Inertia::share(app(FrontendState::class)->current());
        return Inertia::render('Lumki/Users/Index');
    }

    public function edit($id): \Inertia\Response
    {
        return Inertia::render('Lumki/Users/Edit', [
            'editingUser' => \App\Models\User::find($id),
            'editingUserRoles' => \App\Models\User::find($id)->getRoleNames(),
            'availableRoles' => Role::all(),
//            'custom_fields' => config('lumki.custom_fields')
        ]);
    }

    public function update(Request $request, $roles)
    {
        $user = User::find(\request('id'));
        $rules = [];

        if ($request->has('name')) {
            $rules['name'] = ['required', 'string', 'max:255'];
        }

        if ($request->has('email')) {
            $rules['email'] = ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id];
        }

        if ($request->filled('password')) {
            $rules['password'] = ['sometimes', 'required', 'string', 'min:8', 'confirmed'];
        }

        $validatedData = $request->validate($rules);
        if ($request->filled('password')) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        }
//        foreach (config('lumki.custom_fields') as $item) {
//            $validatedData[$item['name']] = $request->{$item['name']};
//        }

        $user->update($validatedData);
        $user->syncRoles(request('roles'));
        return redirect()->route('lumki.users.index');
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
