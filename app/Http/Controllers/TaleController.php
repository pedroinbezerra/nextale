<?php

namespace App\Http\Controllers;
use App\Http\Requests\TaleStore;
use Illuminate\Support\Facades\DB;

class TaleController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DB::table('tales')
            ->orderBy('created_at', 'asc')
            ->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaleStore $request)
    {
        return response(
            DB::table('tales')->insert([
                'title' => $request->title,
                'body' => $request->body,
                'is_enabled' => $request->is_enabled,
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
        return DB::table('tales')->find($id);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TaleStore $request, $id)
    {
        DB::table('tales')
            ->where('id', $id)
            ->update([
                'title' => $request->title,
                'body' => $request->body,
                'is_enabled' => $request->is_enabled,
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return DB::table('tales')->where('id', '=', $id)->delete();
    }
}
