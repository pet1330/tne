<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::isAdmin()->orderBy('university_email')->get();

        return view('backend.admin.index', compact('users'));
    }

    public function store(Request $request)
    {
        request()->validate([
            'first_name'       => 'required|max:255',
            'last_name'        => 'required|max:255',
            'university_email' => 'required|email|max:255',

        ]);
        $u = User::firstOrCreate([
            'first_name'       => request()->first_name,
            'last_name'        => request()->last_name,
            'university_email' => request()->university_email,
        ])->update(['is_admin' => true]);

        return redirect()->route('users.index')->with('flash', $u.' has been promoted to admin');
    }

    public function destroy(User $user)
    {
        if (User::isAdmin()->count() > 1 || $user->id === auth()->id()) {
            $user->update(['is_admin' => false]);

            return redirect()->route('users.index')
            ->with('flash', $user->first_name.'\'s admin rights removed');
        }

        return redirect()->route('users.index');
    }
}
