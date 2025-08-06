<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Comment;

class TestToCommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. 기존 test 테이블에서 모든 데이터를 가져옵니다.
        $old_comments = DB::table('test')->get();

        // 2. 가져온 데이터를 순회하며 comments 테이블에 삽입합니다.
        foreach ($old_comments as $old_comment) {
            Comment::create([
                'text' => $old_comment->text,
                'created_at' => $old_comment->created_at,
                'updated_at' => $old_comment->updated_at,
            ]);
        }
    }
}