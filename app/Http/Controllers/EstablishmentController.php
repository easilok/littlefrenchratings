<?php

namespace App\Http\Controllers;

use App\Models\Establishment;
use App\Models\LocationSource;
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
			$item->location = $item->name.",".$item->parish;
			switch($item->locationsource_id) {
				case 1: // By name
					break;
				case 2: // By Address
					if ($item->address) {
						$item->location = $item->address.",".$item->parish;
					}
					break;
				case 3: // By GPS
					if ($item->gps) {
						$item->location = $item->gps;
					}
					break;
				default:
					break;
			}
		});

		return view('establishment.index', compact('establishments'));
	}

	public function create() {
      if (Gate::denies('add')) {
        abort(403);
      }

			$sources = LocationSource::all();

			return view('establishment.create', compact('sources'));
	}

	public function show(Establishment $establishment) {
		if (Gate::denies('demo')) {
			abort(403);
		}

		$establishment->averageRating();
		$establishment->plates;
		$establishment->location = $establishment->name.",".$establishment->parish;
		switch($establishment->locationsource_id) {
			case 1: // By name
				break;
			case 2: // By Address
				if ($establishment->address) {
					$establishment->location = $establishment->address.",".$establishment->parish;
				}
				break;
			case 3: // By GPS
				if ($establishment->gps) {
					$establishment->location = $establishment->gps;
				}
				break;
			default:
				break;
		}

		$establishment->plates->each(function($plate, $key) {
			$plate->averageRating();
			$plate->cover;
		});

		$latestRatings = $establishment->latestRatings();

		return view('establishment.show', compact('establishment', 'latestRatings'));
	}

	public function store(Request $request) {
		if (Gate::denies('add')) {
			abort(403);
		}

		/* Todo: create custom validation for telephone */
		$request->validate([
			'name' => 'required|min:1|max:255',
			'address' => 'max:255',
			'parish' => 'required|min:1|max:255',
			'city' => 'max:255',
			'gps' => 'max:255',
			'telephone1' => 'max:255',
			'telephone2' => 'max:255',
			'telephone3' => 'max:255',
			'email' => strlen($request->input('email')) > 0 ? 'email' : '',
			'timetable' => 'max:255',
			'obs' => 'max:255',
			'source' => 'required|exists:location_sources,id'
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
			'user_id' => Auth::id(),
			'locationsource_id' => $request->input('source')
		]);

		return redirect('/establishment');

	}

	public function edit (Establishment $establishment) {
		if (Gate::denies('edit')) {
			abort(403);
		}

		$sources = LocationSource::all();

		return view('establishment.edit', compact(['establishment', 'sources']));
	}

	public function update (Establishment $establishment, Request $request) {
		if (Gate::denies('edit')) {
			abort(403);
		}

		/* Todo: create custom validation for telephone */
		$request->validate([
			'name' => 'required|min:1|max:255',
			'address' => 'max:255',
			'parish' => 'required|min:1|max:255',
			'city' => 'max:255',
			'gps' => 'max:255',
			'telephone1' => 'max:255',
			'telephone2' => 'max:255',
			'telephone3' => 'max:255',
			'email' => strlen($request->input('email')) > 0 ? 'email' : '',
			'timetable' => 'max:255',
			'obs' => 'max:255',
			'source' => 'required|exists:location_sources,id'
		]);

		try
		{
			$establishment->name = $request->input('name');
			$establishment->address = $request->input('address');
			$establishment->parish = $request->input('parish');
			$establishment->city = $request->input('city');
			$establishment->gps = $request->input('gps');
			$establishment->telephone1 = $request->input('telephone1');
			$establishment->telephone2 = $request->input('telephone2');
			$establishment->telephone3 = $request->input('telephone3');
			$establishment->email = $request->input('email');
			$establishment->timetable = $request->input('timetable');
			$establishment->obs = $request->input('obs');
			$establishment->locationsource_id = $request->input('source');

			$establishment->save();

		} catch (Exception $e) {
			abort(403);
		}

		return redirect("/establishment/$establishment->id");

	}

}
