@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ url('category/'.$model->id) }}">
                        @csrf
                        <input type="hidden" name="_method" value="PATCH">
                        Nama Kategori:  <input type="text" name="name" value="{{ $model->name }}"></br></br>
                        User:           <input type="text" name="user_id" value="{{ $model->user_id }}"></br></br>
                        <button type="submit" class="btn btn-success btn-lg">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection