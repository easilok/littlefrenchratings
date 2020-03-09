<?php

namespace App\Http\Controllers;

use App\Models\Establishment;
use App\Models\Images;
use App\Models\Plate;
use App\Models\Taste;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PlateController extends Controller
{

	private $Plate_Photo_Folder = "public/uploads";

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
		$plate->cover;
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

	public function edit (Plate $plate) {
		if (Gate::denies('edit')) {
			abort(403);
		}

		$establishments = Establishment::orderBy('name')->get();

		return view('plate.edit', compact(['plate', 'establishments']));
	}

	public function update (Plate $plate, Request $request) {
		if (Gate::denies('edit')) {
			abort(403);
		}

		$request->validate([
			'name' => 'required|min:1|max:255',
			'price' => strlen($request->input('price')) > 0 ? 'numeric' : '',
			'obs' => 'max:255',
			'file' => $request->hasFile('photo') ? 'mimes:jpg, jpeg, png, bmp, svg' : '',

		]);

		try
		{
			$plate->name = $request->input('name');
			$plate->price = $request->input('price');
			$plate->establishment_id = $request->input('establishment');
			$plate->obs = $request->input('obs');

			$plate->save();

		} catch (Exception $e) {
			abort(403);
		}

		if ($request->hasFile('photo')) {
			$path = $request->photo->store($this->Plate_Photo_Folder); 

			Images::uncoverAll($plate->id);

			Images::Create([
				'path' => substr($path, strlen($this->Plate_Photo_Folder) + 1),
				'plate_id' => $plate->id,
				'user_id' => Auth::id(),
			]);
		}

		if ($request->hasFile('photos')) {
			foreach($request->file('photos') as $photo) {
				$path = $photo->store($this->Plate_Photo_Folder); 

				Images::Create([
					'path' => substr($path, strlen($this->Plate_Photo_Folder) + 1),
					'plate_id' => $plate->id,
					'user_id' => Auth::id(),
					'cover' => false,
				]);
			}
		}
		return redirect("/plate/$plate->id");
	}

	/* Plate Taste Handlers */
	public function create_taste(Plate $plate) {
      if (Gate::denies('add')) {
        abort(403);
      }

			$plate->establishment;
			$nextTastes = Auth::user()->nextTastes();
			/* $historyTastes = Auth::user()->historyTastes(); */
			if (Auth::id() === 1) {
				$users = User::orderBy('name')->get();
			} else {
				$users = User::where('id', '>', 1)->orderBy('name')->get();
			}

			return view('taste.create', compact(['plate', 'nextTastes', 'users']));
	}

	public function store_taste(Plate $plate, Request $request) {
		if (Gate::denies('add')) {
			abort(403);
		}

		/* Todo: create custom validation for telephone */
		$request->validate([
			'visit' => 'required|date',
			'price' => strlen($request->input('price')) > 0 ? 'numeric' : '',
		]);

		$taste = Taste::Create([
			'visit_at' => $request->input('visit'),
			'price' => $request->input('price'),
			'user_id' => Auth::id(),
			'plate_id' => $plate->id
		]);

		return redirect('/my-tastes');
	}
}
