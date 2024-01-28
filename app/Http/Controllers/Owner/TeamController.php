<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:owners');
    }

    public function index()
    {
        $ownerId = Auth::id(); //ログインしているIDを取得
        $teams = Team::where('owner_id', $ownerId)->get();// Teamモデルでowner_idを検索して取得

        return view('owner.teams.index', // 取得した変数をviewに渡す
        compact('teams')); //compactで変数を渡せる
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }
}
