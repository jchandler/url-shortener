<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'UrlFormController@form')->name('url.form');
Route::post('/', 'UrlFormController@save')->name('url.save');

Route::get('{shortUrl}', function($shortUrl)
{
    $url = App\Url::where('short_url', $shortUrl)->first();

    if ($url) {
      return Redirect::to($url->long_url);
    } else {
      flash('The URL you tried does not redirect.')->error();
      return redirect()->route('url.form');
    }
});
