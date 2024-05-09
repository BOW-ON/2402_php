<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index() {
        return 'TestController -> index()';
    }

    public function create() {
        return 'TestController -> create()';
    }

    // 뷰로 연결 해보기
    public function view() {
        return view('test');
    }
    
}
