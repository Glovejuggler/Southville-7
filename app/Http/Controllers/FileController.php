<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        // dd($request->file('file'));
        $request->validate([
            'file' => 'required',
            'file.*' => 'mimes:png,jpg,gif'
        ]);

        foreach ($request->file as $file) {
            $newFile = Storage::putFileAs(
                'pictures/'.$request->member_id,
                $file,
                Str::random(20).'.'.$file->getClientOriginalExtension()
            );

            $new = new File;

            $new->member_id = $request->member_id;
            $new->path = $newFile;

            $new->save();
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        if (Storage::exists($file->path)) {
            Storage::delete($file->path);
        }
        
        $file->delete();

        return redirect()->back();
    }

    /**
     * Download the file
     * 
     * @param id
     * @return \Illuminate\Http\Response
     */
    public function download($id)
    {
        // dd(Gate::allows('isAdmin'));
        if (Gate::allows('isAdmin')) {
            $file = File::find($id);
            if (Storage::exists($file->path)) {
                return response()->download($file->path);
            }
        }
    }
}
