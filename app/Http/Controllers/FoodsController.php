<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Food;
use App\Rules\Uppercase;
use App\Http\Requests\CreateValidationRequest;

class FoodsController extends Controller
{
    public function index(){

        $foods = Food::all();
//        $food = Food::where('name', '=', 'aaaa')
////        ->get()
//        ->firstOrFail();
//        dd($foods); // dd die dump
        return view("foods.index", ['foods' => $foods]);
    }

    public function create(){
        //insert new food
//        return view("foods.create");
        $categories = Category::all();
        return view('foods.create', [
            'categories' => $categories
        ]);

    }

    public function  store(Request $request){
    //dd($request->all());
        // image -> input
//       dd($request->file('image')->guessExtension()); // lấy đuôi file jpg,png,jpeg...
//        dd($request->file('image')->getMimeType());
//        dd($request->file('image')->getClientOriginalName());
//        dd($request->file('image')->getSize()); // kilobytes
//        dd($request->file('image')->getError());
//        dd($request->file('image')->isValid());

        $request->validate([
            'name' => 'required|unique:foods',
            'count' => 'required|min:0|max:1000',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);
        //client image name and sever image name
        //must be different why??
        $generatedImageName = 'image'.time().'-'
            .$request->name.'-'
            .$request->image->extension();
//        dd($generatedImageName);
        // move to a folder
        $request->image->move(public_path('images'), $generatedImageName);

        //        dd('this is store function');
//        $food = new Food();
//        $food->name = $request ->input('name');
        //$food->count = $request ->input('count');
//        $food->description = $request ->input('description');
//        $request->validated();
//        dd($request);
//        $request->validate([
//            'name' => 'required|unique:foods',
//            'name' => new Uppercase(),
//            'count' => 'required|min:0|max:1000',
//            'category_id' => 'required',
//        ]);
        $food = Food::create([
            // if the validate is pass , it will come here
            // otherwise it will throw an exception (validationException)
            'name' => $request->input('name'),
            'count' => $request->input('count'),
            'description' => $request->input('description'),
            'category_id' => $request->input('category_id'),
            'image_path' => $generatedImageName
        ]);
        $food->save();
        return redirect('/foods');
    }
    public function edit($id){
//        dd($id);
        $food = Food::find($id);
//        dd($food);
        return view("foods.edit")->with('food', $food);

    }
    public function update(CreateValidationRequest $request, $id){
        $request->validated();

        //        $request->validate([
////            'name' => 'required|unique:foods',
//            'name' => new Uppercase(),
//            'count' => 'required|min:0|max:1000',
//            'category_id' => 'required',
//        ]);
        $food = Food::where('id', $id)
            ->update([
               'name'=> $request->input('name'),
               'count' => $request->input('count'),
                'description' => $request->input('description'),
            ]);
        return redirect('/foods');
    }

    public function destroy($id){
        $food = Food::find($id);
        $food -> delete();
//        dd($id);
       return redirect('/foods');
    }

    public function show($id){
//        dd('this is show id = ' .$id);
        $food =Food::find($id);
      //  dd($food);
        $category = Category::find($food->category_id);
//        dd($category);
        $food->category = $category;
//        dd($food);
        return view('foods.show')->with('food', $food);
    }
}
