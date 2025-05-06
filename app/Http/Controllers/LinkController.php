<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'original_url' => 'required|url|unique:links,original_url'
        ]);

        // Check if URL already exists
        $existing = Link::where('original_url', $request->original_url)->first();

        if ($existing) {
        return redirect()->back()
               ->withInput()
               ->with('info', 'This URL is already shortened: '.url('/'.$existing->shortened_url));
    }

    do {
        $shortened = Str::random(6);
    } while (Link::where('shortened_url', $shortened)->exists());

    Link::create([
        'original_url' => $request->original_url,
        'shortened_url' => $shortened
    ]);

    return redirect()->route('home')
           ->with('success', 'Short URL: '.url('/'.$shortened));
    }

    public function redirect($shortened)
    {
        $link = Link::where('shortened_url', $shortened)->firstOrFail();
        return redirect($link->original_url);
    }
}
