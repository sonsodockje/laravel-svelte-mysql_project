<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// 이 라우트는 /api/ 로 접근 가능합니다.
Route::get('/', function () {
    $users = DB::table('test')->get();
    return response()->json($users);
});