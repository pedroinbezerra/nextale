<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FileController extends Controller
{



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //store file into document folder
        $fileUrl = $request->file->store(env('STORE_FILE_FOLDER'));

        //store file into database
        return response(
            DB::table('files')->insert([
                'fk_tale_id' => $request->fk_tale_id,
                'title' => $request->title || $_FILES['file']['name'],
                'fileUrl' => $fileUrl,
                'type' => $_FILES['file']['type'],
                'is_enabled' => $request->is_enabled,
                'size' => $_FILES['file']['size'],
                'created_at' => now(env('TIMEZONE'))
            ]),
            201
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        return DB::table('files')
            ->select('title')
            ->where('fk_tale_id', '=', $id)
            ->get();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fileUrl = DB::table('files')
            ->select('fileUrl')
            ->where('id', $id)
            ->get();    
   
        Storage::delete($fileUrl[0]->fileUrl);

        return DB::table('files')->where('id', '=', $id)->delete();
    }
}
