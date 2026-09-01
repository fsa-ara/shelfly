<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $data = [
            'heading' => strtoupper('home'),
            'description' => 'This page is currently under construction...'
        ];

        return view('pages.coming-soon', $data);
    }
}
