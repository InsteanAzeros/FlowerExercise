<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFlowerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Flower;
use Illuminate\Support\Facades\Validator;

class FlowerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flowers = Flower::all();
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
        $validations = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'price' => 'required',
        ]);

        if ($validations->fails())
            return response()->json(['errors' => $validations->errors()->all()]);


        $flower = new Flower;

        $flower->name = $request->name;
        $flower->price = $request->price;

        $result = $flower->save();


        if ($result)
            return response()->json(['success' => 'Inserted successfully']);
        else
            return response()->json(['error' => 'Problem inserting. Try later']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $flower = Flower::find($id);
        // $flower = Flower::where('id', $id)->first();

        return view('flower-details', ['flower' => $flower]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $flower = Flower::find($id);
        return view('update-flower', ['flower' => $flower]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreFlowerRequest $request, $id)
    {
        $request->validated();

        // $result = DB::update('UPDATE flowers
        // SET name = ?, price = ? WHERE id = ?', [$request->name, $request->price, $id]);

        $flower = Flower::find($id);

        $flower->name = $request->name;
        $flower->price = $request->price;

        $result = $flower->save();

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
        $result = Flower::destroy($id);

        if ($result)
            return redirect('flowers')->with('success', 'Deleted successfully');
        else
            return redirect('flowers')->with('error', 'Problem inserting. Try later.');
    }
}
