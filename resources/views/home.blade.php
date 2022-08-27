@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @foreach($dtAll as $item)
            <div class="card">
                <div class="card-header"><h1>{{$item->title}}</h1></div>
                <div class="card-body">
                    <p>{{$item->image}}</p>
                    <h3>by {{$item->user->name}}, on {{$item->category->name}}</h3>
                    <p>{{$item->content}}</p>
                    <p>{{$item->created_at}}</p>
                    <!-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <table class="table table-hover">
                    <thead>
                            <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Title</th>
                            <th scope="col">Content</th>
                            <th scope="col">Image</th>
                            <th scope="col">Category</th>
                            <th scope="col">Uploaded by</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach($dtAll as $item)
                            <tr>
                            <th scope="row">{{$i++}}</th>
                            <td>{{$item->title}}</td>
                            <td>{{$item->content}}</td>
                            <td>{{$item->image}}</td>
                            <td>{{$item->category->name}}</td>
                            <td>{{$item->user->name}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table> -->
                </div>
            </div>
            </br>
            @endforeach
        </div>
    </div>
</div>
@endsection
