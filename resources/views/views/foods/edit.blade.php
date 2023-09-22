@extends('layouts.app2')
@section('content')
    <h1>Update a Foods</h1>
    <form action="/foods/{{$food->id}}" method="post">
        @csrf
        {{--the key í generated at every session start--}}
        {{--  only apply to no-read routes      --}}
        {{--        if some hacker acess to this site from hist/her site--}}
        @method('PUT')
        <input class="form-control"
               type="text"
               name="name"
               value="{{$food->name}}"
               placeholder="Enter food's name">
        <input class="form-control"
               type="text"
               name="description"
               value="{{$food->description}}"
               placeholder="Enter food's description">
        <input class="form-control"
               type="text"
               name="count"
               value="{{$food->count}}"
               placeholder="Enter food's count">
        <button class="btn btn-primary" type="submit">
            Update Food</button>
    </form>
@endsection
