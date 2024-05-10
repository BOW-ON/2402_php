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
    // 실행 : php artisan migrate
    public function up()
    {
        Schema::table('users', function(Blueprint $table){
            $table->char('gender', 1)->nullable()->after('password'); // password 뒤에 생성
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table){
            $table->dropColumn('gender');
        });
    }
};
