<?php

namespace App\Http\Traits;

use App\Models\Country;

trait CountryTrait
{
    public function index()
    {
        $country = Country::all();
        return view('display', array('country' => $country));
    }
}
