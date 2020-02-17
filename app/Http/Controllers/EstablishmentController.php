<?php

namespace App\Http\Controllers;

use App\Models\Establishment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class EstablishmentController extends Controller
{

	public function index() {
		if (Gate::denies('demo')) {
			abort(403);
		}

		$establishments = Establishment::all()->each(function($item, $key) {
			$item->averageRating();
		});

		return view('establishment.index', compact('establishments'));
	}

	public function create() {
      if (Gate::denies('add')) {
        abort(403);
      }

			return view('establishment.create');
	}

	public function show(Establishment $store) {
		if (Gate::denies('demo')) {
			abort(403);
		}

		$store->plates;

		$establishment = $store;

		return view('establishment.show', compact('establishment'));
	}

	public function store(Request $request) {
		if (Gate::denies('add')) {
			abort(403);
		}

		/* Todo: create custom validation for telephone */
		$request->validate([
			'name' => 'required|max:255',
			'address' => 'max:255',
			'parish' => 'required|max:255',
			'city' => 'max:255',
			'gps' => 'max:255',
			'telephone1' => 'max:255',
			'telephone2' => 'max:255',
			'telephone3' => 'max:255',
			'email' => strlen($request->input('email')) > 0 ? 'email' : '',
			'timetable' => 'max:255',
			'obs' => 'max:255'
		]);

		Establishment::Create([
			'name' => $request->input('name'),
			'address' => $request->input('address'),
			'parish' => $request->input('parish'),
			'city' => $request->input('city'),
			'gps' => $request->input('gps'),
			'telephone1' => $request->input('telephone1'),
			'telephone2' => $request->input('telephone2'),
			'telephone3' => $request->input('telephone3'),
			'email' => $request->input('email'),
			'card' => $request->has('card'),
			'timetable' => $request->input('timetable'),
			'obs' => $request->input('obs'),
			'user_id' => Auth::id()
		]);

		return redirect('/establishment');

	}
}
