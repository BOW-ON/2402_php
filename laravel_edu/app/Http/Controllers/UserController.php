<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        // 1. SELECT
        // 1-1. users 테이블 모든 데이터 조회
        // SELECT * FROM users
        // $result = DB::table('users')->get();
        
        // 1-2. users 테이블 조건에 맞는 데이터 조회
        // SELECT * FROM users WHERE name = ?; ['홍길동']
        // $result = DB::table('users')->where('name','=','홍길동');

        // 1-3. users 테이블 데이터 조회 (or)
        // SELECT * FROM users WHERE id = ? OR id = ?; [3, 4]
        // $result = DB::table('users')
        //             ->where('id', 3)
        //             ->orWhere('id', 4)
        //             ->get();
        
        // 1-4. users 테이블 데이터 조회 (and)
        // SELECT * FROM users WHERE name = ? AND id = ?; ['홍길동', 3]
        // $result = DB::table('users')
        //             ->where('name', '홍길동')
        //             ->Where('id', 3)
        //             ->get();

        // 1-5. users 테이블 데이터 조회 (정렬)
        // SELECT name FROM users ORDER BY name ASC; 
        // $result = DB::table('users')
        //             ->select('name')
        //             ->orderBy('name', 'ASC')
        //             ->get();
        
        // 1-6. users 테이블 데이터 조회 (IN)
        // SELECT * FROM users WHERE id in (?, ?); [3, 4]
        // $result = DB::table('users')
        //             ->whereIn('id', [3, 4])
        //             ->get();

        // 1-7. users 테이블 데이터 조회 (NULL)
        // SELECT * FROM users WHERE deleted_at IS NULL;
        // $result = DB::table('users')
        //             ->whereNull('deleted_at')
        //             ->get();

        // 1-8. 2023년에 가입한 사람만 출력 (Year)
        // SELECT * FROM users WHERE year(created_at) = ?;
        // SELECT * FROM users created_at between 20230101000000 AND 20231231235959;
        // $result = DB::table('users')
        //             ->whereYear('created_at', '2023')
        //             ->get();


        // 1-9. 성별 회원의 수 출력 (그룹)
        // SELECT gender, COUNT(*) cnt FROM users GROUP BY gender;          
        // $result = DB::table('users')
        //                 ->select('gender', DB::raw('count(gender) cnt'))
        //                 ->groupBy('gender')
        //                 // ->having('gender', '=', 'M') // 성별이 M인 사람만 구할때
        //                 ->get();
        
        // 1-10. 성별 회원의 수 출력 (LIMIT)
        // SELECT id, name FROM users ORDER BY id LIMIT ?; [1]
        // $result = DB::table('users')
        //                 ->select('id', 'name')
        //                 ->orderBy('id')
        //                 ->limit(1)
        //                 ->offset(2)
        //                 ->get();
        
        // 1-11. when : 동적 쿼리 생성
        //  유저가 1 또는 빈값 데이터 전달
        // $reqData = 1; // $reqData = ''; : 빈값
        // $result = DB::table('users')
        //                 ->when($reqData, function($query, $reqData) {
        //                     $query->where('id', $reqData);
        //                 })
        //                 // ->dd(); // 동적쿼리 볼수 있음
        //                 ->get();
        
        // 1-12. 실행 메소드
        // 1-12-1. first() : 쿼리 결과에서 가장 첫번째 레코드만 반환
        // $result = DB::table('users')->first();
        // 1-12-2. count() : 쿼리 결과의 레코드 수를 반환
        // $result = DB::table('users')->count();
        // 1-12-3. find($id) : 지정된 기본키의 해당하는 레코드만 반환
        // $result = DB::table('users')->find(8);

        // 2. INSERT
        // $result = DB::table('users')->insert([
        //     'name' => '김영희'
        //     ,'email' => 'kim@kim.com'
        //     ,'password' => Hash::make('qwer1234!')
        //     ,'gender' => 'F'
        // ]);
     
        // 3. UPDATE
        // $result = DB::table('users')
        //         ->where('id', 8)
        //         ->update([
        //             'email' => 'yh@yh.com'
        //         ]);
        
        // 4. DELETE
        // $result = DB::table('users')
        //         ->where('id', 7)        
        //         ->delete();


        // ---------------------------
        // *Eloquent Model
        // ---------------------------
        
        // 1. 정보 가지고 오기
        // 1-1. all : 모든 정보 가지고 오기
        // $result = User::all();
        // return var_dump($result[0]->name); // 0번 인덱스의 name 가져오기
        // 1-2. find() : 특정 정보 가지고 오기
        // $result = User::find(3);
        // return var_dump($result->email); // email 가져오기

        // 2. upsert : 정보가 없으면 insert 처리, 있으면 update 처리
        // 2-1. insert
        // $data = [
        //     'name' => '김철수'
        //     ,'email' => 'cs@cs'
        //     ,'password' => Hash::make('qwer1234!')
        //     ,'gender' => 'F' 
        // ];
        // $result = User::create($data);
        
        // 2-2. update
        // DB::transaction();
        // $target = User::find(9);
        // $target->gender ='M';
        // $result = $target->save(); // save() : 수정된 정보 저장
        // DB::commit(); // 라라벨은 commit이 안될경우 자동으로 rollback을 해줌

        // 3. delete
        // 3-1. destroy() : 소프트딜리트 처리
        // $result = User::destroy(9);
        // 3-2. withTrashed() : 소프트 딜리트 포함 데이터 조회
        // $result = User::withTrashed()->get();
        // 3-3. onlyTrashed() : 소프트 딜리트만 데이터 조회
        // $result = User::onlyTrashed()->get();

        // 4. restore() : 소프트딜리트 된거 복원
        $result =User::where('id', 9)->restore();
        
        return var_dump($result);
    }
}
