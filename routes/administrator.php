<?php

Route::group(['middleware' => 'administrator.guest'], function () {
  Route::get('/administratoronly', 'AdministratorAuth\LoginController@showLogin');
  Route::get('/administratoronly/login', 'AdministratorAuth\LoginController@showLogin');
  Route::post('/administratoronly/login', 'AdministratorAuth\LoginController@login');
});

Route::group(['middleware' => 'administrator'], function () {
  Route::any('administratoronly/logout', 'AdministratorAuth\LogoutController@logoutToPath');
  Route::get('/administratoronly/dashboard', function () {return view('administratoronly/dashboard');});


  Route::get('/administratoronly/website/contact/index', function () {return view('administratoronly/website/contact/index');});
  Route::get('/administratoronly/website/gallery/index', function () {return view('administratoronly/website/gallery/index');});
  Route::get('/administratoronly/website/slider/index', function () {return view('administratoronly/website/slider/index');});

  /*services*/
  Route::get('/administratoronly/website/service/index', function () {return view('administratoronly/website/service/index');});
  Route::get('/administratoronly/website/service/add', function () {return view('administratoronly/website/service/add');});
  Route::get('/administratoronly/website/service/edit', function () {return view('administratoronly/website/service/edit');});
  Route::get('/administratoronly/website/service/view', function () {return view('administratoronly/website/service/view');});

  /*review*/
  Route::get('/administratoronly/website/review/index', function () {return view('administratoronly/website/review/index');});
  Route::get('/administratoronly/website/review/add', function () {return view('administratoronly/website/review/add');});
  Route::get('/administratoronly/website/review/edit', function () {return view('administratoronly/website/review/edit');});
  Route::get('/administratoronly/website/review/view', function () {return view('administratoronly/website/review/view');});

  /*pages*/
  Route::get('/administratoronly/website/pages/index', function () {return view('administratoronly/website/pages/index');});
  Route::get('/administratoronly/website/pages/view', function () {return view('administratoronly/website/pages/view');});
  Route::get('/administratoronly/website/pages/edit', function () {return view('administratoronly/website/pages/edit');});

  /*settings*/
  Route::get('/administratoronly/settings/metadata/index', function () {return view('administratoronly/settings/metadata/index');});
  Route::get('/administratoronly/settings/social-media/index', function () {return view('administratoronly/settings/social-media/index');});
  Route::get('/administratoronly/settings/tools/index', function () {return view('administratoronly/settings/tools/index');});
  Route::get('/administratoronly/settings/change-password/index', function () {return view('administratoronly/settings/change-password/index');});
});
