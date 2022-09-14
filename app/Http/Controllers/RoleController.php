<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Auth\Access\Gate;

class RoleController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('can:read')->only('index');
    // }
    public function admin_dash(Request $request)
    {
        // $this->authorize('read');
        // return redirect()->route('admin.dashboard');
        // if(!Gate::allows('read role')){
        //     abort(403, 'unauthorized');
        // }
    } 
    public function admin_data(Request $request)
    {
        // $this->authorize('datadiri');
        // return redirect()->route('admin.datadiri');
    }
    
}
