<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // 마이그레이션 파일 생성 : php artisan make:miaration 파일명
    //  마이그레이션 실행 : php artisan migrate
    //  마이그레이션 롤백(직전의 마이그레이션 작업 되돌리기) : php artisan migrate:rollback
    //  마이그레이션 리셋(모든 마이그레이션 작업 되돌리기) : php artisan migrate:reset

    /**
     * Run the migrations.
     *
     * @return void
     */

     // 마이그레이션 실행할때 실행되는 파일
    public function up()
    {
        Schema::create('boards', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50);
            $table->string('content', 1000);
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->useCurrent();
            $table->dateTime('deleted_at')->nullable(); // null 허용
            // $table->softDeletes('deleted_at')->nullable(); // softdelete도 있다는 정도만 참고
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    // 마이그레이션 롤백할때 실행되는 파일
    public function down()
    {
        Schema::dropIfExists('boards');
    }
};
