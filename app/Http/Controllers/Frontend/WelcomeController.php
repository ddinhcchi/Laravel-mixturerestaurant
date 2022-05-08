<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function index()
    {
        $specials = Category::where('name', 'quay')->first();

        $cmts = DB::select('select * from `comments` where `show` = 1');

        $count = count($cmts);

        $sum = 0;

        foreach($cmts as $cmt) {
            $sum += $cmt->rating_star;
        }

        $avg = 0;
        
        if($count!=0){
            $avg = (double)($sum / $count);
        }

        return view('welcome', compact('specials', 'cmts', 'count', 'avg'));
    }
    public function thankyou()
    {
        return view('thankyou');
    }
}
