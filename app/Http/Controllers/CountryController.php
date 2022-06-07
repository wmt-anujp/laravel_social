<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Image;
use App\Http\Traits\ImageTrait;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    use ImageTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function getData()
    {
        $country = Country::paginate(6);
        // $country->appends(['sort' => 'country_name']);
        return view('display', array('country' => $country));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('image');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function test()
    {
        return "some";
    }

    public function store(Request $request)
    {
        // try {
        //     $input = $request->all();
        //     $input['image'] = $this->verifyAndUpload($request, 'image', 'images');
        //     // dd($input['image']);
        //     Image::create($input);
        //     return redirect()->route('welomes')->with('success', 'record created successfully.');
        // } catch (\Exception $exception) {
        //     return redirect()->back()->with('error', 'Temprory server error.');
        // }
        try {
            $input = $request->all();
            $input['filename'] = $this->verifyAndUpload($request, "abc");
            Image::create($input);
            return redirect()->route('welcomes')->with('success', 'record created successfully.');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Temprory server error.');
        }
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->test();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
