<?php
namespace App\Http\Controllers;

// use App\Models\Travel_destination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Travel;

class TravelsController extends Controller
{
    public function index() {
        $travels = DB::table('travels as t')
                        ->select('t.id', 't.title', 't.sub_title', 't.message', 't.release_flg', 't.created_at', 'des.location_name', 'u.name')
                        ->join('travel_destinations as des', 't.destination_id', '=', 'des.id')
                        ->join('users as u', 'u.id', '=', 't.user_id')
                        ->where('t.release_flg', '=', '0')
                        ->orderByRaw('t.id DESC')
                        ->get();

        $post_count = DB::table('travels')
                            ->select('destination_id', DB::raw('COUNT(destination_id) as post'))
                            ->where('release_flg', '=', '0')
                            ->groupBy('destination_id');
        $prefectures = DB::table('travel_destinations as des')
                            ->leftJoinSub($post_count, 'c', function($join){
                                $join->on('c.destination_id', '=', 'des.id');
                            })
                            ->select('des.id', 'des.location_name', 'c.post')
                            ->groupBy('des.id')
                            ->get();
        $title_tag = '最近の投稿';



        return view('pages.index', compact('travels', 'prefectures', 'title_tag'));
    }

    public function prefecture(Request $request) {
        $travels = DB::table('travels as t')
                        ->select('t.id', 't.title', 't.sub_title', 't.message', 't.release_flg', 't.created_at', 'des.location_name', 'u.name')
                        ->join('travel_destinations as des', 't.destination_id', '=', 'des.id')
                        ->join('users as u', 'u.id', '=', 't.user_id')
                        ->where('des.location_name', $request['name'])
                        ->where('t.release_flg', '=', '0')
                        ->orderByRaw('t.id DESC')
                        ->get();

        $post_count = DB::table('travels')
                            ->select('destination_id', DB::raw('COUNT(destination_id) as post'))
                            ->where('release_flg', '=', '0')
                            ->groupBy('destination_id');
        $prefectures = DB::table('travel_destinations as des')
                            ->leftJoinSub($post_count, 'c', function($join){
                                $join->on('c.destination_id', '=', 'des.id');
                            })
                            ->select('des.id', 'des.location_name', 'c.post')
                            ->groupBy('des.id')
                            ->get();
        $title_tag = '#' . $request['name'];

        return view('pages.index', compact('travels', 'prefectures', 'title_tag'));
    }

    public function view(Request $request) {
        $travel = DB::table('travels as t')
                        ->select('d.location_name', 't.title', 't.sub_title', 't.message', 't.id')
                        ->join('travel_destinations as d', 't.destination_id', '=', 'd.id')
                        ->where('t.id', '=', $request->id)
                        ->first();

        $travel_brochures = DB::table('travel_brochures')
                                ->select('date', 'traffic_method', 'time', 'title', 'body')
                                ->where('travel_id', '=', $request->id)
                                ->get();

        // $brochure = [
        // [1day] => [0] => ['date' => '',]
        //           [1] => ['date' => '',]
        // [2day] => [0] ~~
        // ]
        $brochure_count = count($travel_brochures);
        $day = 1;
        for($i=0; $i < $brochure_count; $i++){
            if(isset($date)){
                if($date != $travel_brochures[$i]->date){
                    $day++;
                }
            }
            $brochures[$day][] = [
                'date' => $travel_brochures[$i]->date,
                'traffic_method' => $travel_brochures[$i]->traffic_method,
                'time' => date('H:i', strtotime($travel_brochures[$i]->time)),
                'title' => $travel_brochures[$i]->title,
                'body' => $travel_brochures[$i]->body,
            ];
            $date = $travel_brochures[$i]->date;
        }

        return view('pages.view', compact('travel', 'brochures'));
    }

    public function create(Request $request) {
        $destinations = DB::table('travel_destinations')
                            ->select('location_name')
                            ->orderByRaw('id')
                            ->get();

        $url = parse_url($request->headers->get('referer'));
        if($url['path'] == '/confirm'){
            parse_str($url['query'], $results);
            $guideTitle = [
                'title' => $results['guide-title'],
                'sub-title' => $results['guide-sub-title'],
            ];

            $noteCount = count($results['note-title']);
            for($i = 0; $i < $noteCount; $i++){
                $notes[$i] = [
                    'note-title' => $results['note-title'][$i],
                    'note-body' => $results['note-body'][$i],
                ];
            };

            $maxDay = $results['maxDay'];
            for ($day = 1; $day <= $maxDay; $day++) {
                $destination = $results["day{$day}destination"];
                $time = $results["day{$day}time"];
                $bodyTitle = $results["day{$day}bodyTitle"];
                $bodyDetail = $results["day{$day}bodyDetail"];
                $bodyCount = count($bodyTitle);
                for ($i = 0; $i < $bodyCount; $i++) {
                    ${"day" . $day . "bodies"} = [
                        'destination' => $destination[$i],
                        'time' => $time[$i],
                        'bodyTitle' => $bodyTitle[$i],
                        'bodyDetail' => $bodyDetail[$i],
                    ];
                    $days[$day][$i] = ${"day" . $day . "bodies"};
                };
            };

            $prefecture = $results['prefecture'];
            $dates = $results['date'];
            $maxDay = $results['maxDay'];
            return view('pages.create', compact('destinations', 'guideTitle', 'notes', 'days', 'prefecture', 'dates', 'maxDay', 'results'));

        } else {
            return view('pages.create', compact('destinations'));
        }
    }

    public function confirm(Request $request){
            // array:2 [
            //     day1 =>
            //         [0] => array,
            //         [1] => array,
            //     day2 =>
            //         [0] => array,
            //         [1] => array,
            // ];
        $maxDay = $request->input('maxDay');
        for($day = 1; $day <= $maxDay; $day++){
            $destination = $request->input("day{$day}destination");
            $time = $request->input("day{$day}time");
            $bodyTitle = $request->input("day{$day}bodyTitle");
            $bodyDetail = $request->input("day{$day}bodyDetail");
            $bodyCount = count($bodyTitle);
            for($i = 0; $i < $bodyCount; $i++) {
                ${"day" . $day . "bodies"} = [
                    'destination' => $destination[$i],
                    'time' => $time[$i],
                    'bodyTitle' => $bodyTitle[$i],
                    'bodyDetail' => $bodyDetail[$i],
                ];
                $days[$day][$i] = ${"day" . $day . "bodies"};
            };
        };

        $noteTitle = $request->input('note-title');
        $noteBody = $request->input('note-body');
        $notes = array_combine($noteTitle, $noteBody);
        $guideTitle = $request->input('guide-title');
        $guideSubTitle = $request->input('guide-sub-title');
        $dates = $request->input('date');
        $prefecture = $request->input('prefecture');

        return view('pages.confirm', compact('guideTitle', 'guideSubTitle', 'notes', 'dates', 'prefecture', 'days'));
    }

    public function complete(Request $request) {
        $request->message = isset($request->message)? $request->message : '';
        $url = parse_url($request->headers->get('referer'));
        if ($url['path'] == '/confirm') {
            parse_str($url['query'], $results);

            try {
                DB::beginTransaction();

                $prefecture_id = DB::table('travel_destinations')
                                ->where('location_name', '=', $results['prefecture'])
                                ->value('id');

                $travel_id = DB::table('travels')->insertGetId([
                    'user_id' => Auth::id(),
                    'destination_id' => $prefecture_id,
                    'title' => $results['guide-title'],
                    'sub_title' => $results['guide-sub-title'],
                    'message' => $request->message,
                    'release_flg' => $request->isPublic,
                ]);

                $noteCount = count($results['note-title']);
                for ($i = 0; $i < $noteCount; $i++) {
                    DB::table('travel_note')->insert([
                        'travel_id' => $travel_id,
                        'title' => $results['note-title'][$i],
                        'body' => $results['note-body'][$i],
                    ]);
                };

                $maxDay = $results['maxDay'];
                for($day = 1; $day <= $maxDay; $day++){
                    $bodyCount = count($results["day{$day}bodyTitle"]);
                    for($count = 0; $count < $bodyCount; $count++){
                        DB::table('travel_brochures')->insert([
                            'travel_id' => $travel_id,
                            'date' => $results['date'][$day-1],
                            'traffic_method' => $results["day{$day}destination"][$count],
                            'time' => $results["day{$day}time"][$count],
                            'title' => $results["day{$day}bodyTitle"][$count],
                            'body' => $results["day{$day}bodyDetail"][$count],
                        ]);
                    }
                };

                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
            }

            return redirect('/');
        } else {
            return redirect('/');
        }
    }

    public function mypage(){
        $my_brochures = DB::table('travels as t')
                        ->select('t.id', 't.title', 't.sub_title', 't.message', 't.release_flg', 't.created_at', 'des.location_name', 'u.name')
                        ->join('travel_destinations as des', 't.destination_id', '=', 'des.id')
                        ->join('users as u', 'u.id', '=', 't.user_id')
                        ->where('user_id', '=', Auth::id())
                        ->orderByRaw('t.id DESC')
                        ->get();

        $good_brochures = DB::table('travels as t')
                                ->select('t.id', 't.title', 't.sub_title', 't.message', 't.created_at', 'des.location_name', 'u.name')
                                ->join('travel_destinations as des', 't.destination_id', '=', 'des.id')
                                ->join('users as u', 'u.id', '=', 't.user_id')
                                ->join('goods as g', 'g.travel_id', '=', 't.id')
                                ->where('g.user_id', Auth::id())
                                ->orderByRaw('g.updated_at DESC')
                                ->get();

        $post_count = DB::table('travels')
                        ->where('user_id', '=', Auth::id())
                        ->groupBy('user_id')
                        ->count('id');

        if (Auth::check()) {
            // ログイン済みならば
            return view('pages.mypage', compact('my_brochures', 'post_count', 'good_brochures'));
        } else {
            // ログインをしていなければ
            return redirect('login');
        }
    }

    public function deleteBrochure(Request $request){
        $travel_id = $request->travel_id;
        try {
            DB::beginTransaction();

            DB::table('travels')
                ->where('id', $travel_id)
                ->delete();

            DB::table('travel_note')
                ->where('travel_id', $travel_id)
                ->delete();

            DB::table('travel_brochures')
                ->where('travel_id', $travel_id)
                ->delete();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json($e);
        }

        $post_count = DB::table('travels')
                            ->where('user_id', '=', Auth::id())
                            ->groupBy('user_id')
                            ->count('id');
        $param = [
            'post_count' => $post_count,
        ];
        return response()->json($param);
    }

    public function updatePassword(){
        return view('pages.update-password');
    }

    public function deleteAccount() {
        DB::table('users as u')
            ->leftJoin('travels as t', 'u.id', '=', 't.user_id')
            ->leftJoin('travel_note as n', 't.id', '=', 'n.travel_id')
            ->leftJoin('travel_brochures as b', 't.id', '=', 'b.travel_id')
            ->where('u.id', '=', Auth::id())
            ->delete();
        return redirect('/');
    }

    public function release_flg(Request $request) {
        $flg = DB::table('travels')->select('release_flg')->find($request->id);
        if($flg->release_flg){
            $flg = 0;
        } else {
            $flg = 1;
        }

        DB::table('travels')
            ->where('id', $request->id)
            ->update(['release_flg' => $flg]);

        return back();
    }

}
