<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\URL;

class UrlController extends Controller
{
    public function index()
    {
        $title = 'URL Shortener';
        return view('home', compact('title'));
    }

    public function shortUrl(Request $request)
    {
        $request->validate([
            'url' => ['required','url']
        ]);

        $originalUrl = $request->get('url');
        
        $redirectUrl = Str::random(6);

        $shortenUrl = URL::create([
            'original_url' => $originalUrl,
            'shortened_url' => $redirectUrl,
        ]);

        return redirect()->route('home')->with([
            'message' => 'Short URL has been created.',
            'URL' => url('/' . $shortenUrl->shortened_url)
        ]);
    }

    public function redirect(string $shortenedUrl)
    {
        $url = URL::where(['shortened_url' => $shortenedUrl, 'status' => true])->firstOrFail();

        return redirect($url->original_url);
    }
}
