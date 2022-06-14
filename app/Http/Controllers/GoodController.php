<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Good;
use App\Models\Travel;

class GoodController extends Controller
{
    public function good(Request $request)
    {
        $user_id = Auth::user()->id;
        $travel_id = $request->travel_id;
        $already_liked = Good::where('user_id', $user_id)->where('travel_id', $travel_id)->first();

        if(!$already_liked){
            $good = new Good;
            $good->travel_id = $travel_id;
            $good->user_id = $user_id;
            $good->save();
        } else {
            Good::where('travel_id', $travel_id)->where('user_id', $user_id)->delete();
        }

        $travel_goods_count = Travel::withCount('goods')->findOrFail($travel_id)->goods_count;
        $param = [
            'travel_goods_count' => $travel_goods_count,
        ];

        return response()->json($param);
    }
}
