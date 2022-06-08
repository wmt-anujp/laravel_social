<?php

namespace App\Http\Traits;

use Illuminate\Http\Request;

trait SignupTrait
{
    public function name(Request $request)
    {
        // dd($request->name);
        $input = $request->name;
        return $input;
    }
}
