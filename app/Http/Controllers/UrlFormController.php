<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UrlFormRequest;

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
          flash('Saved!');
        }
      } catch (\Exception $e) {
        flash('This URL does not seem to be active. Please check it.')->error();
      }

      return redirect()->route('url.form');
    }
}
