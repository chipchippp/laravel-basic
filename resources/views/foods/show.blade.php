@extends('layouts.app2')
@section('content')
    <h1>Show is detail food</h1>
    <h3> Name: {{$food->name}}</h3>
    <img src="{{asset('images/' .$food->image_path)}}" alt="" style="width: 300px; height: 300px;">
    <h3> Count: {{$food->count}}</h3>
    <h3> Description: {{$food->description}}</h3>
    <h3> CategoryId: {{$food->category_id}}</h3>
    <h3> Category Name: {{$food->category->name}}</h3>

@endsection
