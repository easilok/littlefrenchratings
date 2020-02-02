<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class GlobalComposer {

  /**
   * Bind data to the view.
   *
   * @param  View  $view
   * @return void
   */
  public function compose(View $view)
  {
      $loggedUser = Auth::user();

      if ($loggedUser) {
        $userData = $loggedUser->only(['name']);

        $userData['permissions']['demo'] = true;
        $userData['permissions']['view'] = Gate::allows('view');
        $userData['permissions']['update'] = Gate::allows('update');
        $userData['permissions']['edit'] = Gate::allows('edit');
        $userData['permissions']['add'] = Gate::allows('add');
        $userData['permissions']['master'] = Gate::allows('master');
      } else {

        $userData['permissions']['demo'] = false;
        $userData['permissions']['view'] = false;
        $userData['permissions']['update'] = false; 
        $userData['permissions']['edit'] = false; 
        $userData['permissions']['add'] = false;
        $userData['permissions']['master'] = false;
        
      }

      $appData = [
        'csrfToken' => csrf_token(), 
        'user' => $userData, //Auth::user()->only(['name']), 
        'signedIn' => Auth::check(),
      ];

     $navbarMenus = [];
     $view->with('navbar', $navbarMenus)->with('appData', $appData);
  }
}
