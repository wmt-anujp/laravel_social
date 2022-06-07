<?php

namespace App\Http\Traits;

use Illuminate\Http\Request;

trait ImageTrait
{

    /**
     * @param Request $request
     * @return $this|false|string
     */
    // public function verifyAndUpload(Request $request, $fieldname = 'image')
    // {
    //     $files = $request->$fieldname;
    //     // dd($files);
    //     if ($request->hasFile($fieldname)) {
    //         // dd("enter");
    //         $folder = 'images';
    //         $filename = $files->getClientOriginalName();
    //         // dd($filename);
    //         if (!$request->file($fieldname)->isValid()) {
    //             dd("fail");
    //             return redirect()->back()->withInput()->with('error', 'Invalid Image');
    //         }
    //         return $request->file($filename)->storePubliclyAs($folder, 'public');
    //     }
    //     return null;
    // }

    public function verifyAndUpload(Request $request, $fieldname = 'image', $folder = 'images')
    {
        // dd($fieldname);
        // dd($request->all());
        if ($request->file($fieldname)) {
            if (!$request->file($fieldname)->isValid()) {
                return redirect()->back()->withInput()->with('error', 'Invalid Image');
            }
            $files = $request->file($fieldname);
            $filename = $files->getClientOriginalName();
            // dd($filename);
            // $filename = file($fieldname);
            // dd(file($fieldname));
            return $request->file($fieldname)->storePubliclyAs($folder, $filename, 'public');
        }

        return null;
    }
}
