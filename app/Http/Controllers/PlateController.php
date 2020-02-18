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
}
