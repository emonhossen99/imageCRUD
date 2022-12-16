<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\imagecrudModel;
use Illuminate\Support\Facades\File;

class imagecrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = imagecrudModel::all();
        return view('home', compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = new imagecrudModel;
        $student->name = $request->input('name');

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extenstion;
            $file->move('uploads/students/', $filename);
            $student->image = $filename;
        }

        $student->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = imagecrudModel::find($id);
        return view('edit', compact('student'));
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
        $student = imagecrudModel::find($id);
        $student->name = $request->input('name');
        if ($request->hasfile('image')) {
            $detination = 'uploads/students/'.$student->image;
            if (File::exists($detination)) {
                File::delete($detination);
            }
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extenstion;
            $file->move('uploads/students/', $filename);
            $student->image = $filename;
        }
        $student->update();
        return redirect('/addimage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = imagecrudModel::find($id);
            $detination = 'uploads/students/'.$student->image;
            if (File::exists($detination)) {
                File::delete($detination);
            }
        $student->delete();
        return redirect('/addimage');
    }
}
