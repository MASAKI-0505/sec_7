<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\TestMail;
class PlayerController extends Controller
{
    public function login(Request $request) {
        // $request->session()->flush();
        $request->session()->forget('id');
        return view('players.login');
    }

    //サインアップ画面(getで受け取ったとき)
    public function sign_up() {
        $info['name'] = "";
        $info['email'] = "";
        $info['password'] = "";
        return view('players.sign_up', compact('info'));
    }
    public function password_reset() {
        return view('players.password_reset');
    }
    public function index(Request $request) {

        $data = session()->all();
        $id = 0;
        $id = session()->get('id');
        $calender['year'] = date('Y');
        $calender['month'] = date('m');
        $calender['day'] = date('j');
        $calender['weekday'] = date('w');  
        if ($id == 0) {
            return view('players.login');
        } else {
            $review = \DB::table('movies_review')
            ->where('user_id', $id)
            ->select('*', 'movies_review.id as review_id')
            ->join('movies_data', 'movies_review.movie_id', '=', 'movies_data.id')
            ->limit(3)
            ->orderBy('created_at', 'desc')
            ->get();
            $plan = \DB::table('plans')
            ->where('user_id', $id)
            ->get();
            return view('index', compact('id', 'review', 'plan'));
        }
    }
    public function friend_index(Request $request) {
        $id = 0;
        $id = session()->get('id');
        if ($id == 0) {
            return redirect()->route('login');
        }
        
        $data = session()->all();
        $user_id = $request->input('user_id');
        $add = session()->get('add');
        $data_check = \DB::table('users_data')
        ->where('id', $user_id)
        ->count();
        if (empty($add)) {
            if ($data_check == 0 || empty($data_check)){
                return redirect()->route('index');
            } else {
                $review = \DB::table('movies_review')
                ->where('user_id', $user_id)
                ->select('*', 'movies_review.id as review_id')
                ->join('movies_data', 'movies_review.movie_id', '=', 'movies_data.id')
                ->limit(3)
                ->orderBy('created_at', 'desc')
                ->get();
                $name = \DB::table('users_data')
                ->where('id', $user_id)
                ->first('name');
                return view('Players.friend_index', compact('id', 'review', 'user_id', 'name'));
            }
        } else {
            $user_id = $add;
            $review = \DB::table('movies_review')
            ->where('user_id', $user_id)
            ->select('*', 'movies_review.id as review_id')
            ->join('movies_data', 'movies_review.movie_id', '=', 'movies_data.id')
            ->limit(3)
            ->orderBy('created_at', 'desc')
            ->get();
            return view('Players.friend_index', compact('id', 'review', 'user_id', 'name'));
        }
    }
    public function post(Request $request) {
        $id = 0;
        $error = session()->get('error');
        $id = session()->get('id');
        if ($id == 0) {
            return redirect()->route('login');
        } else {
            if (!empty($error)) {
                // echo $error;
            }
            $data = session()->all();
            if (empty($data["title"])) {
                $data["title"] = "";
            }
            if (empty($data["story"])) {
                $data["story"] = "";
            }
            if (empty($data["impression"])) {
                $data["impression"] = "";
            }
            
            $request->session()->flash('title', $data['title']);
            // $request->session()->flash('category', $data['category']);
            // $request->session()->flash('age', $data['age']);
            // $request->session()->flash('evaluation', $data['evaluation']);
            $request->session()->flash('story', $data['story']);
            $request->session()->flash('impression', $data['impression']);
            // $data = session()->all();
            return view('players.post', compact('id', 'data', 'error'));
        }

    }
    public function post_confirm(Request $request) {
        $id = 0;
        $id = session()->get('id');
        if ($id == 0) {
            return redirect()->route('login');
        } else {

            $info = $request->all();
            if (empty($info["story"])) {
                $info["story"] = "";
            }
            if (empty($info["impression"])) {
                $info["impression"] = "";
            }

            if($info["title"] == "") {
                $error = "タイトルを記入してください。";
                session()->flash('error', $error);
                $data = session()->all();

                // if (empty($data["title"])) {
                //     $request->session()->flash('title', $info['title']);
                // }
                if (empty($data["story"])) {
                    $request->session()->flash('story', $info['story']);
                }
                if (empty($data["impression"])) {
                    $request->session()->flash('impression', $info['impression']);
                }
                $data = session()->all();
                $request->session()->flash('day', $info['day']);
                $request->session()->flash('title', $data['title']);
                $request->session()->flash('category', $info['category']);
                $request->session()->flash('age', $info['age']);
                $request->session()->flash('evaluation', $info['evaluation']);
                $request->session()->flash('story', $data['story']);
                $request->session()->flash('impression', $data['impression']);
                // return view('Players.post', compact('error', 'data', 'id'));
                return redirect()->route('post');
            }

            $data = session()->all();
            $request->session()->flash('day', $info['day']);
            $request->session()->flash('title', $info['title']);
            $request->session()->flash('category', $info['category']);
            $request->session()->flash('age', $info['age']);
            $request->session()->flash('evaluation', $info['evaluation']);
            $request->session()->flash('story', $info['story']);
            $request->session()->flash('impression', $info['impression']);
            
            return view('Players.post_confirm', compact('info', 'id'));
        }
    }
    public function post_complete(Request $request) {
        $id = 0;
        $comp = session()->get('comp');
        $id = session()->get('id');
        if ($id == 0) {
            return redirect()->route('login');
        } 
        if (!empty($comp)) {
            return redirect()->route('index');
        }
        $data = session()->all();
        $data_check = \DB::table('movies_data')
        ->where('title', $data["title"])
        ->count();
        if ($data_check == 0) {
            \DB::table('movies_data')->insert([
                'title' => $data['title'],
            ]);
        }
        $movie_id = \DB::table('movies_data')
        ->where('title', $data["title"])
        ->first();
        \DB::table('movies_review')->insert([
            'day' => $data['day'],
            'user_id' => $data['id'],
            'movie_id' => $movie_id->id,
            'category' => $data['category'],
            'age' => $data['age'],
            'evaluation' => $data['evaluation'],
            'story' => $data['story'],
            'impression' => $data['impression'],
            'created_at' => now(),
        ]);
        session()->flash('comp', 1);
        return view('Players.post_complete', compact('id'));
    }
    public function old_review_list(Request $request) {
        $data = session()->all();
        $id = 0;
        $id = session()->get('id');
        if ($id == 0) {
            return redirect()->route('login');
        } else {
            $user_id = $request->input('user_id');
            $data_check = \DB::table('users_data')
            ->where('id', $user_id)
            ->count();
            if ($data_check == 0){
                    return redirect()->route('index');
                }
            if ($data_check == 1) {
                $id = $user_id;
            }

            $review = \DB::table('movies_review')
            ->where('user_id', $id)
            ->select('*', 'movies_review.id as review_id')
            ->join('movies_data', 'movies_review.movie_id', '=', 'movies_data.id')
            ->orderBy('created_at', 'desc')
            ->get();
            $name = \DB::table('users_data')
            ->where('id', $id)
            ->first();
            $id = session()->get('id');
            return view('Players.old_review_list', compact('id', 'review', 'name'));
        }
    }
    
    public function add_friend(Request $request) {
        $data = session()->all();
        $id = 0;
        $id = session()->get('id');
        if ($id == 0) {
            return redirect()->route('login');
        } else {
            $user_id = $request->input('user_id');
            session()->flash('add', $user_id);
            $data_check = \DB::table('friends')
            ->where('user_id', $id)
            ->where('friend_user_id', $user_id)
            ->count();

            if($data_check == 0) {
                \DB::table('friends')->insert([
                    'user_id' => $id,
                    'friend_user_id' => $user_id,
                ]);
                return redirect()->route('friend_index');
            } else {
                return redirect()->route('friend_index');
            }
        }
    }
    public function old_review(Request $request) {
        $data = session()->all();
        $id = 0;
        $id = session()->get('id');
        if ($id == 0) {
            return redirect()->route('login');
        } else {
            $user_id = $request->input('user_id');
            $review_id = $request->input('review_id');
            $data_check = \DB::table('users_data')
            ->where('id', $user_id)
            ->count();
            $review_check = \DB::table('movies_review')
            ->where('user_id', $user_id)
            ->where('id', $review_id)
            ->count();
            // echo $user_id;
            // echo $review_id;
            if ($review_check == 0) {
                return redirect()->route('index');
            }
            if ($data_check == 0){
                return redirect()->route('index');
            }
            // if ($data_check == 1) {
            //     $user_id = $id;
            // }
            $review = \DB::table('movies_review')
            ->where('user_id', $user_id)
            ->where('id', $review_id)
            ->first();
            $name = \DB::table('movies_data')
            ->where('id', $review->movie_id)
            ->first();
            $user_name = \DB::table('users_data')
            ->where('id', $user_id)
            ->first('name');
        return view('Players.old_review', compact('id', 'review', 'name', 'user_name'));
    }
    }
    public function calendar() {
        $data = session()->all();
        $id = 0;
        $id = session()->get('id');
        if ($id == 0) {
            return view('players.login');
        } else {
            $calender['year'] = date('Y');
            $calender['month'] = date('m');
            $calender['day'] = date('j');
            $calender['first_weekday'] = date("w", mktime(0, 0, 0, $calender['month'], 1, $calender['year']));
            $plan = \DB::table('plans')
            ->where('user_id', $id)
            ->get();
            // print_r($plan);
            return view('Players.calendar', compact('calender', 'plan', 'id'));
        }
    }
    public function plan() {
        $data = session()->all();
        $id = 0;
        $id = session()->get('id');
        if ($id == 0) {
            return view('players.login');
        } else {
            $plan_comp = 0;
            $plan_comp = session()->get('plan_comp');
            if ($plan_comp == 1) {
                return view('players.index');
            }

            return view('Players.plan', compact('id'));
        }
    }
    public function friends_list(Request $request) {
        $id = 0;
        $id = session()->get('id');
        if ($id == 0) {
            return redirect()->route('login');
        }
        $user_id = $request->input('user_id');
        $review = \DB::table('friends')
        ->where('user_id', $user_id)
        ->join('users_data', 'users_data.id', '=', 'friends.friend_user_id')
        ->get();
        

        return view('Players.friends_list', compact('id', 'review'));
    }

    public function user_setting() {
        $id = 0;
        $id = session()->get('id');
        if ($id == 0) {
            return redirect()->route('login');
        }
        return view('Players.user_setting',  compact('id'));
    }
    // public function send(Request $request)
    // {
    //     $name = 'テスト ユーザー';
    //     $email = 'bvlwp05@yahoo.co.jp';

    //     Mail::send(new TestMail($name, $email));

    //     return view('index');
        
    // }
}