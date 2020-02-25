<?php

namespace App\Http\Controllers;

use App\Models\Plate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PlateController extends Controller
{

	public function index() {
		if (Gate::denies('demo')) {
			abort(403);
		}

		$plates = Plate::with('establishment')->get()->each(function($item, $key) {
			$item->averageRating();
		});

		return view('plate.index', compact('plates'));
	}

	public function show(Plate $plate) {
		if (Gate::denies('demo')) {
			abort(403);
		}

		$plate->averageRating();
		$plate->averagePrice();
		$plate->establishment;
		$plate->images;
		$plate->establishment->location = $plate->establishment->name.",".$plate->establishment->parish;
		switch($plate->establishment->locationsource_id) {
			case 1: // By name
				break;
			case 2: // By address
				if ($plate->establishment->address) {
					$plate->establishment->location = $plate->establishment->address.','.$plate->establishment->parish;
				}
				break;
			case 3: // By gps
				if ($plate->establishment->gps) {
					$plate->establishment->location = $plate->establishment->gps;
				}
				break;
			default:
				break;
		}

		$latestRatings = $plate->latestRatings();

		return view('plate.show', compact('plate', 'latestRatings'));

	}

}
