<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class LanguageController extends Controller
{
    protected array $supported = ['id', 'en'];

    public function switch(string $locale): RedirectResponse
    {
        if (!in_array($locale, $this->supported, true)) {
            abort(400);
        }

        session(['locale' => $locale]);

        return redirect()->back();
    }
}
