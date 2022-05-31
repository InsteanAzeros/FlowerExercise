<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FlowerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flowers = DB::select('SELECT * FROM flowers');
        return view('flowers-list', ['flo' => $flowers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('new-flower');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = DB::insert('INSERT INTO flowers(name, price)
        VALUES(?, ?)', [$request->name, $request->price]);

        if ($result)
            return redirect('flowers')->with('success', 'Inserted successfully');
        else
            return redirect('flowers')->with('error', 'Problem inserting. Try later');
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
        $flowers = DB::select('SELECT * FROM flowers WHERE id = ?', [$id]);
        return view('update-flower', ['flower' => $flowers[0]]);
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
        $result = DB::update('UPDATE flowers
        SET name = ?, price = ? WHERE id = ?', [$request->name, $request->price, $id]);

        if ($result)
            return redirect('flowers')->with('success', 'Updated successfully');
        else
            return redirect('flowers')->with('error', 'Problem inserting. Try later.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = DB::delete('DELETE FROM flowers WHERE id = ?', [$id]);

        if ($result)
            return redirect('flowers')->with('success', 'Deleted successfully');
        else
            return redirect('flowers')->with('error', 'Problem inserting. Try later.');
    }
}
