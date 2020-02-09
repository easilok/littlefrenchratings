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
			
			$navbarMenus = [
				'title' => [
					'name' => config('app.name', 'Avaliação de Francesinhas'),
					'link' => '/',
				],
				'mainMenus' => [
					[
						'title' => 'Provas',
						'link' => '',
						'login' => true,
						'lockLogin' => true,
						'menus' => [
							[
								'title' => 'Minhas Provas',
								'link' => '/my-tastes',
								'permission' => 'demo',
							],
							[
								'title' => 'Explorar Provas',
								'link' => '/taste',
								'permission' => 'view',
							],
							[
								'title' => 'Criar Provas',
								'link' => '/taste/create',
								'permission' => 'add',
							],
						]
					],
					[
						'title' => 'Pratos',
						'link' => '',
						'login' => true,
						'lockLogin' => true,
						'menus' => [
							[
								'title' => 'Ver Pratos',
								'link' => '/plate',
								'permission' => 'demo',
							],
							[
								'title' => 'Criar pratos',
								'link' => '/plate/create',
								'permission' => 'add',
							],
						],
					],
					[
						'title' => 'Estabelecimentos',
						'link' => '',
						'login' => true,
						'lockLogin' => true,
						'menus' => [
							[
								'title' => 'Ver Estabelecimentos',
								'link' => '/establishment',
								'permission' => 'demo',
							],
							[
								'title' => 'Criar Estabelecimento',
								'link' => '/establishment/create',
								'permission' => 'add',
							],
						],
					]
				],
				'rightMenus' => [
					[
						'title' => 'Entrar',
						'link' => '/login',
						'login' => false,
						'lockLogin' => true,
						'menus' => []
					],
					[
						'title' => $loggedUser ? $loggedUser->name : 'Utilizador',
						'link' => '',
						'login' => true,
						'lockLogin' => true,
						'menus' => [
							[
								'title' => 'Mudar Password',
								'link' => '/user/password',
								'permission' => 'demo',
							],
							[
								'title' => 'Utilizadores',
								'link' => '/users',
								'permission' => 'master',
							],
							[
								'title' => 'Registar',
								'link' => '/user/register',
								'permission' => 'master',
							],
							[
								'title' => 'Sair',
								'link' => '/logout',
								'permission' => 'demo',
							]
						]
					]
				]
			];


			foreach ($navbarMenus['mainMenus'] as $i => $menu) {
				$tmpMenu = [];
				foreach ($menu['menus'] as $j => $submenu) {
					if($userData['permissions'][$submenu['permission']]) {
						$tmpMenu[] = $submenu;
					}
				}
				$navbarMenus['mainMenus'][$i]['menus'] = $tmpMenu;
			}

			foreach ($navbarMenus['rightMenus'] as $i => $menu) {
				$tmpMenu = [];
				foreach ($menu['menus'] as $j => $submenu) {
					if($userData['permissions'][$submenu['permission']]) {
						$tmpMenu[] = $submenu;
					}
				}
				$navbarMenus['rightMenus'][$i]['menus'] = $tmpMenu;
			}
     $view->with('navbar', $navbarMenus)->with('appData', $appData)->with('layoutTheme', '');
  }
}
