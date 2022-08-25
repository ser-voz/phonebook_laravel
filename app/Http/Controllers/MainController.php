<?php

namespace App\Http\Controllers;

use App\Models\Phonebook;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index() {
        $users = Phonebook::query()->orderBy('id', 'desc')->paginate(10);
        return view('home', compact('users'));
    }
    public function search(Request $request) {
        $s = $request->s;
        $users = Phonebook::query()->where('name', 'LIKE', "%{$s}%")->orderBy('name')->paginate(10);
        return view('home', compact('users'));
    }

    public function create() {
        request()->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        Phonebook::query()->create([
            'name'  => request('name'),
            'email' => request('email'),
            'phone' => request('phone'),
        ]);
        return redirect('/');
    }

    public function delete($id) {
        Phonebook::query()->find($id)->delete();
        return redirect()->back();
    }

    public function getChange($id) {
        $userChange = Phonebook::query()->find($id);
        $users = Phonebook::query()->orderBy('id', 'desc')->paginate(10);
        return view('home', compact('users','userChange'));
    }

    public function update() {
        request()->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        Phonebook::query()->find(request()->id)->update([
            'name'  => request('name'),
            'email' => request('email'),
            'phone' => request('phone'),
        ]);
        return redirect('/');
    }

}
