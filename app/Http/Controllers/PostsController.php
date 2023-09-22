<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    public function posts(){
        //query builders
//        $posts = DB::select("select * from posts where id=?;",
//            [
//                'id' => 3
//            ]);
        $posts = DB::table("posts")
//            ->where('id', '=' , 4)
//            ->delete();
//            ->update([
//               'title' => 'haha title',
//                'body' => 'This is haha body'
//            ]);
            ->insert([
                'title' => 'haha',
                'body' => 'A new post hahahaha'
            ]);
//            ->avg("id"); // tong id vd: (1+ 2 + 3)/3
//            ->sum("id"); // tong id vd: 1+ 2 + 3 ...
//            ->min("id");
//            ->max("id");
//            ->count(); // dem ban ghi
//            ->find(3);
//            ->whereNotNull("body")
//            ->orderBy('id', 'desc') //asc theo thu tu tang dan
//                ->oldest()
//                ->latest()
//            ->whereBetween("id", [2,3] )
//            ->where("id", ">", now()->subDay())
//            ->orWhere('id', '>', 0)
//            ->select('body')
//                ->first()
//        ->get();
        dd($posts); // dd die dump

//        return view("posts.index");
    }
}


