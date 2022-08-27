<?php

namespace App\Http\Controllers;

use App\Models\webArticle;
use Illuminate\Http\Request;

class articleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dtArticle = webArticle::all();
        return view('article', compact('dtArticle'));
    }

    public function apindex()
    {
        $data = webArticle::with([
            'category',
            'user'
        ])-> paginate(10);

        return response()->json($data, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new webArticle;
        return view('createArt', compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new webArticle;
        $model->title = $request->title;
        $model->content = $request->content;
        $model->image = $request->image;
        $model->user_id = $request->user_id;
        $model->category_id = $request->category_id;
        $model->save();

        return redirect('article');
    }

    public function api_store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'required|string',
            'user_id' => 'required',
            'category_id' => 'required',
        ]);

        $data = new webArticle([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $request->image,
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,
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
    public function show(Request $request)
    {
        $data = webArticle::find($request->id);
        return response()->json($data, 200); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = webArticle::find($id);
        return view('updateArt', compact('model'));
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
        $model = webArticle::find($id);
        $model->title = $request->title;
        $model->content = $request->content;
        $model->image = $request->image;
        $model->user_id = $request->user_id;
        $model->category_id = $request->category_id;
        $model->save();

        return redirect('article');
    }

    public function api_update(Request $request, articles $articles)
    {
        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'required|string',
            'user_id' => 'required',
            'category_id' => 'required',
        ]);

        $data = webArticle::find($request->id);

        $data->title = $request->title;
        $data->content = $request->content;
        $data->image = $request->image;
        $data->user_id = $request->user_id;
        $data->category_id = $request->category_id;

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
        $model = webArticle::find($id);
        $model->delete();
        return redirect('article');
    }

    public function delete(Request $request, articles $articles)
    {
        $data = webArticle::find($request->id);

        $data->delete();

        return response()->json(202); 
    }
}
