<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\BoardName;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 권한 체크를 해야되지만 모든 페이지에 다 작성해야되므로
        //  >> 미들웨어에서 관리함.
        // if(!Auth::check()) {
        //     return redirect()->route('get.login');
        // }


        // type 체크
        $type = 0;
        if($request->has('type')) {
            $type = $request->type;
        }

        // 게시글 조회
        $resultBoardList = Board::where('type', $type)
                            // Model에 SoftDeletes 트레이트가 없을 경우 데이터를 가져올때 where로 처리 해줘야됨
                            // ->whereNull('deleted_at')  
                            ->orderBy('created_at', 'DESC')
                            ->get();
        
        // 게시판 이름 조회
        $resultBoardName = BoardName::select('name', 'type')
                                        ->where('type', $type)
                                        ->first();

        return view('boardIndex')
                ->with('data', $resultBoardList)
                ->with('boardNameInfo', $resultBoardName);

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // var_dump($request->all());
        // $request->file('file')->store('img', 'public'); // TODO : 파일 업로드 처리(파일저장 경로 지정 불가)

        // 유효성 체크 // TODO

        // 파일 서버에 저장
        $filePath = $request->file('file')->store('img');

        // TODO : 파일 업로드 처리 
        $insertData = $request->only('title', 'content', 'type');
        $insertData['user_id'] = Auth::id();
        // $insertData['img'] = "/".$filePath; // TODO 완료 // TODO : 빈 파일 올리는 법
        
        Board::create($insertData);

        return redirect()->route('board.index', ['type' => $request->type]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 게시글 정보 획득
        $resultBoardInfo = Board::find($id); // find() : pk 번호로 검색하는 메소드

        $resultBoardData = $resultBoardInfo->getOriginal();
        $resultBoardData['auth_id'] = Auth::id();
        // Log::debug('json', $resultBoardData); // 라라벨에서 로그 기록하는 메소드

        return response()->json($resultBoardData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Board::destroy($id);
        $responseDate = [
            'errorFlg' => false
            ,'deletedId' => $id
        ];

        return response()->json($responseDate); //status = 200 정상(default 값)
    }
}
