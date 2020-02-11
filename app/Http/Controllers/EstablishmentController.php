<?php

namespace App\Http\Controllers;

use App\Models\Establishment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class EstablishmentController extends Controller
{
	public function create() {
      if (Gate::denies('add')) {
        abort(403);
      }

			return view('establishment.create');
	}
}
