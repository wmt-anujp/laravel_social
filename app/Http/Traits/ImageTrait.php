<?php

namespace App\Http\Traits;

use Illuminate\Http\Request;

trait ImageTrait
{
    public function imageUpload(Request $request, $fieldname, $folder)
    {
        if ($request->file($fieldname)) {
            if (!$request->file($fieldname)->isValid()) {
                return redirect()->back()->withInput()->with('error', 'Invalid Image');
            }
            $files = $request->file($fieldname);
            $filename = $files->getClientOriginalName();
            return $request->file($fieldname)->storePubliclyAs($folder, $filename, 'public');
        }
        return null;
    }
}
