<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    // foreign키 생성
    public function up()
    {
        Schema::table('boards', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    
     // foreign키 삭제
    public function down()
    {
        Schema::table('boards', function(Blueprint $table) {
            // $table->dropForeign('boards_user_id_foreign'); // 제약조건 명으로 삭제
            $table->dropForeign(['user_id']); // 컬럼 명으로 삭제
        });
    }
};
