<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use App\User;
use App\Models\Role;
use App\Models\RoleUser;

class UserController extends Controller
{
    use SendsPasswordResetEmails;

    public function index() {
      if (Gate::denies('master')) {
        abort(403);
      }

      $users = User::orderBy('name', 'ASC')->get();
      return view('user.index', compact('users'));;
    }

    public function create() {
     if (Gate::denies('master')) {
        abort(403);
      }

			$loginRole = Auth::user()->role()->first()->role;
			$roles = Role::all()->where('role', '<=', $loginRole);

       return view('user.register', compact('roles'));
    }

    public function store(Request $request) {
     if (Gate::denies('master')) {
        abort(403);
      }

     $request->validate([
			  'name' => 'required|max:255',
			  'email' => 'required|email',
				'role' => 'required|exists:roles,id'
		  ]);

      $user = User::create([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'password' => bcrypt(Str::random(10))
      ]);

			$user->role()->attach($request->input('role'));

      $this->sendResetLinkEmail($request);

		  return redirect("/");

    }

		public function edit($id) {
     if (Gate::denies('master')) {
        abort(403);
      }

			$user = User::findOrFail($id);
			$userRole = $user->role->first();
			$loginRole = Auth::user()->role()->first()->role;
			$roles = Role::all()->where('role', '<=', $loginRole);

			return view('user.edit', compact(['user', 'roles', 'userRole']));

		}

    public function update($id, Request $request) {
     if (Gate::denies('master')) {
        abort(403);
      }

			$user = User::findOrFail($id);

			$request->validate([
				'role' => 'required|exists:roles,id',
				'name' => 'required|min:3|max:255'
			]);

			if ($request->has('password')) {
				if(strlen($request->input('password')) > 0) {
					$request->validate([
						'password' => 'required|min:8|max:15|same:password-confirm',
					]);

					$user->password = bcrypt($request->input('password'));
				}
			}

			$user->name = $request->input('name');
			$user->save();

			$user->role()->detach();
			$user->role()->attach($request->input('role'));

			session()->flash('status', "Dados de Utilizador Alterados");
			return back();
    }

    public function changePassword(Request $request) {
        $user = Auth::user();
        if ($request->has('password')) {
          $request->validate([
            'user_id' => 'required|in:'.$user->id,
            'password' => 'required|min:8|max:15|same:password-confirm'
          ]);

          $user->password = bcrypt($request->input('password'));
          $user->save();

          session()->flash('status', "Password Atualizada.");
          return back();
        }
    }

    public function password() {
      $user = Auth::user();
      return view('user.change_password', compact('user'));
    }
}
