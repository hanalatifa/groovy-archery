<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    protected array $supported = ['id', 'en'];

    public function switch(Request $request, string $locale): RedirectResponse
    {
        if (!in_array($locale, $this->supported, true)) {
            abort(400);
        }

        session(['locale' => $locale]);

        $referer = $request->headers->get('referer', '');
        $host    = $request->getHost();

        if ($referer && str_contains($referer, $host)) {
            return redirect($referer);
        }

        return redirect(route('welcome'));
    }
}
