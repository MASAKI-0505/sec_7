<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Mail\TestMail;

class MailController extends Controller
{
    public function send(Request $request)
    {
      $info = $request->all();
      $data_check = \DB::table('users_data')
        ->where('email', $info["email"])
        ->count();
      if ($data_check == 0) {
        echo "このメールアドレスのユーザーは存在しません。";
      }
      $password = rand(10000000, 99999999);
      $email = $info["email"];
      
      \DB::table('users_data')
                ->where('email', $email)
                ->update([
                    'password' => password_hash($password, PASSWORD_DEFAULT)
                ]);

      Mail::send(new TestMail($password, $email));
      echo $password;
      echo "パスワードを再設定しました。";
      echo "</br>";
      echo "新しいパスワードはメールで送られています。";
      return view('players.login');
    }
}