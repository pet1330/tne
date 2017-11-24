<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SAMLController extends Controller
{
    public function login()
    {
        return \Auth::guest() ? redirect('saml2/login') : \Redirect::intended('/');
    }

    public function logout()
    {
        return redirect()->route('saml_logout', [
            'returnTo'=> config('saml2_settings.logoutRoute'),
            'nameId'=> session()->get('nameId'),
            'sessionIndex'=> session()->get('sessionIndex')
        ]);
    }
    public function loggedin()
    {
        return view('welcome');
    }
}