@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ url('article/'.$model->id) }}">
                        @csrf
                        <input type="hidden" name="_method" value="PATCH">
                        Judul:      <input type="text" name="title" value="{{ $model->title }}"></br></br>
                        Isi:        <textarea type="text" name="content">{{ $model->content }}</textarea></br></br>
                        Image:      <input type="text" name="image" value="{{ $model->image }}"></br></br>
                        User:       <input type="text" name="user_id" value="{{ $model->user_id }}"></br></br>
                        Kategori:   <input type="text" name="category_id" value="{{ $model->category_id }}"></br></br>
                        <button type="submit" class="btn btn-success btn-lg">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection