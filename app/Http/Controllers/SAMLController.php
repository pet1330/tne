<?php

namespace App\Http\Controllers;

class SAMLController extends Controller
{
    public function login()
    {
        return auth()->guest() ? redirect('saml2/login') : redirect()->intended('/');
    }

    public function logout()
    {
        return redirect()->route('saml_logout', [
            'returnTo'    => config('saml2_settings.logoutRoute'),
            'nameId'      => session()->get('nameId'),
            'sessionIndex'=> session()->get('sessionIndex'),
        ]);
    }
}
