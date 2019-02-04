<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UrlFormRequest;
use App\Url;

class UrlFormController extends Controller
{
    public function form()
    {
      return view('url.form');
    }

    public function save(UrlFormRequest $request)
    {
      $validated = $request->validated();

      $longUrl = $request->get('longUrl');

      // Test for active URL
      try {
        $checkUrlResponse = get_headers($longUrl, 1);
        if ($checkUrlResponse[0] != "HTTP/1.0 200 OK") {
          flash('This URL does not seem to be active. Please check it.')->error();
        } else {
          // Everything looks good - save to db
          $url = new Url;
          $url->long_url = $longUrl;
          $url->short_url = substr(md5(rand()), 0, 7);
          $url->save();

          flash('Saved! You can now use the URL "https://short.io/' . $url->short_url . '" to access your submitted URL.');
        }
      } catch (\Exception $e) {
        flash('An error has occurred. Please try again.')->error();
      }

      return redirect()->route('url.form');
    }
}
