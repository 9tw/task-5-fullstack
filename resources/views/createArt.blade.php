@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ url('article') }}">
                        @csrf
                        Judul:      <input type="text" name="title"></br></br>
                        Isi:        <textarea type="text" name="content"></textarea></br></br>
                        Image:      <input type="text" name="image"></br></br>
                        User:   <input type="text" name="user_id"></br></br>
                        Kategori:   <input type="text" name="category_id"></br></br>
                        <button type="submit" class="btn btn-success btn-lg">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection