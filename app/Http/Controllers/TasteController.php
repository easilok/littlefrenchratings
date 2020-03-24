<?php

namespace App\Http\Controllers;

use App\Models\Plate;
use App\Models\PlateRating;
use App\Models\Rating;
use App\Models\Taste;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class TasteController extends Controller
{
		public function index() {
			if (Gate::denies('demo')) {
				abort(403);
			}

			setlocale(LC_ALL, 'pt_PT');
			Carbon::setLocale('pt_PT');

			$nextTastes = Auth::user()->nextTastes();
			foreach($nextTastes as $key => $item) {
				$item->plate->averageRating();
				$item->plate->averagePrice();
				$item->plate->cover;
				$item->plate->establishment->location = $item->plate->establishment->name.",".$item->plate->establishment->parish;
				switch($item->plate->establishment->locationsource_id) {
					case 1: // By name
						break;
					case 2: // By address
						if ($item->plate->establishment->address) {
							$item->plate->establishment->location = $item->plate->establishment->address.','.$item->plate->establishment->parish;
						}
						break;
					case 3: // By gps
						if ($item->plate->establishment->gps) {
							$item->plate->establishment->location = $item->plate->establishment->gps;
						}
						break;
					default:
						break;
				}
			};
			$historyTastes = Auth::user()->historyTastes(true);
			$unratedTastes = Auth::user()->unratedTastes();

			return view('taste.index', compact(['nextTastes', 'historyTastes', 'unratedTastes']));
		}

		public function edit(Taste $taste) {
			if (Gate::denies('view')) {
				abort(403);
			}

			setlocale(LC_ALL, 'pt_PT');
			Carbon::setLocale('pt_PT');

			$taste->plate->establishment;
			$taste->ratings;

			return view('taste.edit', compact('taste'));
		}

		public function update (Taste $taste, Request $request) {
			if (Gate::denies('view')) {
				abort(403);
			}

			$request->validate([
				'visit' => 'required|date',
				'price' => strlen($request->input('price')) > 0 ? 'numeric' : '',
			]);

			$taste->visit_at = $request->input('visit');
			$taste->price = $request->input('price');
			$taste->save();

			return redirect('/my-tastes');
		}

		public function destroy (Taste $taste) {
			if (Gate::denies('view')) {
				abort(403);
			}

			$taste->delete();

			return redirect('/my-tastes');
		}

		public function create_rating(Taste $taste) {
			if (Gate::denies('view')) {
				abort(403);
			}

			$ratings = Rating::orderBy('order', 'ASC')->orderBy('name', 'ASC')->get();

			return view('rating.create', compact(['taste', 'ratings']));
		}

		public function store_rating(Taste $taste, Request $request) {
			if (Gate::denies('view')) {
				abort(403);
			}

			// Get all ratings
			$ratings = Rating::all();

			// Build validate array based on rating type
			$validateArray = [];

			foreach($ratings as $key => $rating) {
				if ($rating->type < 2) {
					$validateArray[$rating->slug."_value"] = 'required|numeric|min:1|max:5';
				}
				if ($rating->type > 0) {
					$validateArray[$rating->slug."_text"] = 'required|min:1|max:255';
				}
			}

			$request->validate($validateArray);

			try {
				// Save Rating
				foreach($ratings as $key => $rating) {
					PlateRating::Create([
						'plate_id' => $taste->plate->id,
						'rating_id' => $rating->id,
						'user_id' => Auth::id(),
						'taste_id' => $taste->id,
						'rating_value' => $rating->type < 2 ? $request->input($rating->slug.'_value') : 0,
						'rating_text' => $rating->type > 0 ? $request->input($rating->slug.'_text'): '',
					]);
				}
			} catch (Exception $e) {
				abort(403);
			}

			return redirect('/my-tastes');
		}
}
