<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Good;

class Travel extends Model
{
    use HasFactory;
    protected $table = 'travels';

    public function goods(){
        return $this->hasMany('App\Models\Good');
    }

    public function isGoodBy($user, $travel_id): bool{
        return Good::where('user_id', $user->id)->where('travel_id', $travel_id)->first() != null;
    }

    public function goodCount($travel_id){
        return DB::table('goods')
                    ->where('travel_id', $travel_id)
                    ->groupBy('travel_id')
                    ->count();
    }
}
