<?php

namespace Lumki\Lumki\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Inertia\Inertia;
use Lumki\Lumki\FrontendState;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    public function index(): \Inertia\Response
    {
        Inertia::setRootView('lumki::lumki');

        View::share([
            'cssPath' => __DIR__ . '/../../../public/css/app.css',
            'jsPath' => __DIR__ . '/../../../public/js/app.js',
        ]);
        Inertia::share(app(FrontendState::class)->current());
        return Inertia::render('Lumki/Roles/Index');
    }

}
