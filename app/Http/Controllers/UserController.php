<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Structure;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Nette\Utils\Random;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserContact;
use App\Mail\NewUser;

class UserController extends Controller
{
    public function add(Request $request) {
        $request->validate([
            'name' => ['max:30'],
            'firstname' => ['max:50'],
            'email' => ['unique:users'],
        ]);

        $userPassword = Random::generate(8);

        $data = ['name' => $request->name, 'firstname' => $request->firstname, 'email' => $request->email, 'password' => $userPassword];

        $user = User::where('role','ADMIN')->findOr(Auth::user()->id);

        foreach ([$request->email, $user->email] as $recipient) {
            Mail::to($recipient)->send(new NewUser($data));
        }

        DB::table('users')->insert([
            'name' => $request->name,
            'firstname' => $request->firstname,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => $request->role==0 ? 'USER' : 'ADMIN',
            'structure_id' => intval($request->structure),
            'password' => Hash::make($userPassword),
        ]);
        
        return redirect()->route('utilisateurs');
    }

    public function edit(Request $request, $id) {
        $request->validate([
            'name' => ['max:30'],
            'firstname' => ['max:50'],
            'email' =>  Rule::unique('users')->ignore($id),
        ]);

        DB::table('users')
            ->where('id', $id)
            ->update([
                'name' => $request->name,
                'firstname' => $request->firstname,
                'email' => $request->email,
                'phone' => $request->phone,
                'role' => $request->role==0 ? 'USER' : 'ADMIN',
                'structure_id' => intval($request->structure),
                'password' => Hash::make(Random::generate(7)),
        ]);
        
        return redirect()->route('utilisateurs');
    }

    public function seeMyAccount() {
        $user = User::findOrFail(Auth::user()->id);
        return view('admin.myaccount', ['user' => $user]);
    }

    public function getAllUsers(Request $request) {
        $users = User::orderBy('id')->paginate(10)->fragment('board');
        if($request->ajax()) {
            echo view('layout.adminUserBoardAndBlocPagination', compact('users'))->render();
        } else {
            return view('admin.seeUser', ['users' => $users]);
        }
    }

    public function seeAddForm() {
        $structures = Structure::all();
        $categories = Category::all(); 
        return view('admin.addOrUpdateUser', ['structures' => $structures, 'categories' => $categories]);
    }

    public function seeEditForm($id) {
        $user = User::findOrFail($id);
        $structures = Structure::all();
        $categories = Category::all(); 
        return view('admin.addOrUpdateUser', ['user' => $user, 'structures' => $structures, 'categories' => $categories]);
    }

    public function adminSearchUser(Request $request) {
        $users = User::where([['firstname', 'like', '%'.$request->search.'%']])
                        ->orWhere([['firstname', 'like', '%'.$request->search.'%']])
                        ->paginate(10)->fragment('board');
        echo view('layout.adminUserBoardAndBlocPagination', compact('users'))->render();
    }


    public function sendMail(Request $request) {
        $request->validate([
            'lastname' => ['max:30'],
            'firstname' => ['max:50'],
            'object' => ['max:225'],
        ]);

        $status = Mail::to("Gkpedjo@gouv.bj")->send(new UserContact($request->all()));

        
        return back()->with('status', 'Mail envoyé avec succes !');
    }

}
