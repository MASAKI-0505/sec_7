<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ValidationController extends Controller
{
    //サインアップのバリデーション
    public function val_sign_up(Request $request) {
        $sign_up = session()->get('sign_up');
        $request->session()->forget('sign_up');
        // if ($sign_up == 1) {

            // header('Location:/');
            // echo $sign_up;
            // exit;
        // }
        $info = $request->all();
        echo "<br/>";
        $error = 0;
        // print_r($info);
        if ($info["name"] == "") {
            echo "名前が入力されていません。";
            echo "<br/>";
            $error = 1;
        } 
        if ($info["email"] == "") {
            echo "emailが入力されていません。";
            echo "<br/>";
            $error = 1;
        } else if (!preg_match('/^[a-z0-9._+^~-]+@[a-z0-9.-]+$/i', $info["email"])) {
            echo "emailの形式が間違っています。";
            echo "<br/>";
            $error = 1;
        }
        $data_check = \DB::table('users_data')
        ->where('email', $info["email"])
        ->count();
        if ($data_check == 1) {
            echo "このメールアドレスは既に登録されています。";
            echo "<br/>";
            $error = 1;
        }
        if ($info["password"] == "") {
            echo "パスワードが入力されていません。";
            echo "<br/>";
            $error = 1;
        }
        if ($error == 1) {
            return view('players.sign_up', compact('info', 'error'));
        } else {
            $request->session()->put('sign_up', 1);
            $info["password"] = password_hash($info["password"], PASSWORD_DEFAULT);
            \DB::table('users_data')->insert([
                'name' => $info['name'],
                'email' => $info['email'],
                'password' => $info['password'],
                'created_at' => now()
            ]);
            return view('players.sign_up_complete');
        }
    }
    //ログインのバリデーション
    public function val_login(Request $request) {
        // $request->session()->forget('id');
        $info = $request->all();
        $data_check = \DB::table('users_data')
        ->where('email', $info["email"])
        ->count();
        if ($data_check > 0 ) {
            $data = \DB::table('users_data')
            ->where('email', $info["email"])
            ->first();

            if (password_verify($info["password"], $data->password)){
                // return view('index?id='.$data->id);
                $request->session()->put('id', $data->id);
                $request->session()->put('name', $data->name);
                $request->session()->put('email', $data->email);
                $request->session()->put('password', $data->password);
                $id = session()->get('id');
                $review = \DB::table('movies_review')
                ->where('user_id', $id)
                ->join('movies_data', 'movies_data.id', '=', 'movies_review.movie_id')
                ->get();
                $plan = \DB::table('plans')
                ->where('user_id', $id)
                ->get();
                // return view('index', compact('id', 'review', 'plan'));
                // header('Location:/index');
                // exit;
                return redirect()->route('index');
            } else {
                echo "メールアドレスまたはパスワードが違います。";
                return view('players.login');
            }
        } else {
            echo "メールアドレスまたはパスワードが違います。";
            return view('players.login');
        }
    }
    public function plan_complete(Request $request) {
        $data = $request->all();
        $id = session()->get('id');
        if ($data["day"] == "" || $data["plan"] == "" ) {
            echo "日にちまたは予定が未記入です。";
            return view('players.plan', compact('id'));
        } else {
            \DB::table('plans')->insert([
                'user_id' => $id,
                'day' => $data['day'],
                'plan' => $data['plan'],
            ]);
            return view('players.plan_complete', compact('id'));
        }
    }
        public function user_setting_complete(Request $request) {
            $data = $request->all();
            $id = session()->get('id');
            if ($data["name"] == "" & $data["email"] == "" & $data["new_password"] == "") { 
                echo "入力してください。";
                return view('players.user_setting', compact('id'));
            }
            if (!$data["name"] == "") {
                \DB::table('users_data')
                ->where('id', $id)
                ->update([
                    'name' => $data["name"]
                ]);
            }
            if (!$data["email"] == "") {
                if (!preg_match('/^[a-z0-9._+^~-]+@[a-z0-9.-]+$/i', $data["email"])){
                    echo 'メールドレスの形式が違います。';
                    echo '</br>';
                    echo 'メールアドレスの変更はできていません。';
                    return view('players.user_setting', compact('id'));
                } else {
                    \DB::table('users_data')
                    ->where('id', $id)
                    ->update([
                    'email' => $data["email"]
                ]);
                }
            }
            if (!$data["new_password"] == "") {
                \DB::table('users_data')
                ->where('id', $id)
                ->update([
                    'password' => password_hash($data["new_password"], PASSWORD_DEFAULT)
                ]);
            }

            return view('players.user_setting_complete', compact('id'));
            }
    
    

}