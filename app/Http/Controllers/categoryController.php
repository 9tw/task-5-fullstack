<?php

namespace App\Http\Controllers;

use App\Models\webCategory;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dtCategory = webCategory::all();
        return view('categories', compact('dtCategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new webCategory;
        return view('createCat', compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new webCategory;
        $model->name = $request->name;
        $model->user_id = $request->user_id;
        $model->save();

        return redirect('category');
    }

    public function api_store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'user_id' => 'required',
        ]);

        $data = new webCategory([
            'name' => $request->name,
            'user_id' => $request->user_id,
        ]);

        $data->save();

        return response()->json($data, 201);
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
        $model = webCategory::find($id);
        return view('updateCat', compact('model'));
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
        $model = webCategory::find($id);
        $model->name = $request->name;
        $model->user_id = $request->user_id;
        $model->save();

        return redirect('category');
    }

    public function api_update(Request $request, categories $categories)
    {
        $request->validate([
            'name' => 'required|string',
            'user_id' => 'required',
        ]);

        $data = webCategory::find($request->id);

        $data->name = $request->name;
        $data->user_id = $request->user_id;

        $data->save();

        return response()->json($data, 202);  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = webCategory::find($id);
        $model->delete();
        return redirect('category');
    }

    public function delete(Request $request, categories $categories)
    {
        $data = webCategory::find($request->id);
        $data->delete();
        return response()->json(202); 
    }
}
