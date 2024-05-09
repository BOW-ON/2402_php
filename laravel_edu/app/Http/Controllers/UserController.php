<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function eduUser() {
        // -----------------------
        // *쿼리 빌더
        // -----------------------
        // 1. SELECT

        // $result = DB::select('SELECT * FROM users');
        // $result = DB::select(
        //     "SELECT * FROM users WHERE name = :name"
        //     ,['name' => '갑돌이']
        // );
        // $result = DB::select(
        //     "SELECT * FROM users WHERE name = ? or name = ?"
        //     ,['갑돌이', '갑순이']
        // );
        // $result = DB::select(
        //     "SELECT * FROM users WHERE deleted_at is NOT NULL"
        // );

        // 2. INSERT
        // $sql = "INSERT INTO users(name, email, password) VALUES(?, ?, ?)";
        // $data = ['김철수', 'ad@ad.com', Hash::make('qwer1234!')];
        // DB::beginTransaction(); // 트랜잭션 시작
        // $result = DB::insert($sql, $data);
        // if(!$result) {
        //     DB::rollBack(); // 롤백
        // } else {
        //     DB::commit(); // 커밋
        // }
        
        // 3. UPDATE
        // $sql = "UPDATE users SET deleted_at = NULL WHERE id = ?";
        // $data = [5];
        // $result = DB::update($sql, $data);
        
        // 4. DELETE
        // $sql = "DELETE FROM users WHERE id = ?";
        // $data = [5];
        // $result = DB::delete($sql, $data);
        
        // -----------------------
        // *쿼리 빌더 체이닝
        // -----------------------
        // 1. users 테이블 모든 데이터 조회
        // SELECT * FROM users
        // $result = DB::table('users')->get();
        
        // 2. users 테이블 조건에 맞는 데이터 조회
        // SELECT * FROM users WHERE name = ?; ['홍길동']
        // $result = DB::table('users')->where('name','=','홍길동');

        // 3. users 테이블 데이터 조회 (or)
        // SELECT * FROM users WHERE id = ? OR id = ?; [3, 4]
        // $result = DB::table('users')
        //             ->where('id', 3)
        //             ->orWhere('id', 4)
        //             ->get();
        
        // 3. users 테이블 데이터 조회 (and)
        // SELECT * FROM users WHERE name = ? AND id = ?; ['홍길동', 3]
        // $result = DB::table('users')
        //             ->where('name', '홍길동')
        //             ->Where('id', 3)
        //             ->get();

        // 4. users 테이블 데이터 조회 (정렬)
        // SELECT name FROM users ORDER BY name ASC; 
        $result = DB::table('users')
                    ->select('name')
                    ->orderBy('name', 'ASC')
                    ->get();
        
        // 5. where 

        return var_dump($result);
    }
}
