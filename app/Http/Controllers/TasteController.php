<?php

namespace App\Http\Controllers;

use App\Models\Plate;
use App\Models\Taste;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class TasteController extends Controller
{
		public function index() {
			if (Gate::denies('demo')) {
				abort(403);
			}

			$nextTastes = Auth::user()->nextTastes();
			$historyTastes = Auth::user()->historyTastes();

			return view('taste.index', compact(['nextTastes', 'historyTastes']));
		}
}
