<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RelatorioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        if (\Gate::allows('isAdmin') || \Gate::allows('isAuthor')) {
            return User::latest()->paginate(30);
        }
    }
}
