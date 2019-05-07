<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVersion1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('version1', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->timestamps();
        // });
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->text('icon_path');
            $table->text('hash_id');
            $table->text('token');
            $table->boolean('gender');
            $table->timestamp('born_at');
            $table->timestamps();
        });

        Schema::create('timecapsules', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('age');
            $table->unsignedInteger('money');
            $table->timestamps();
        });

        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('timecapsule_id');
            $table->bigInteger('posted_user_id');
            $table->bigInteger('target_user_id');
            $table->text('comment_text');
            $table->timestamps();
        });

        Schema::create('user_timecapsules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
            $table->bigInteger('timecapsule_id');
            $table->timestamps();
        });

        Schema::create('user_follows', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
            $table->bigInteger('following_user_id');
            $table->timestamps();
        });

        Schema::create('user_timecapsule_goods', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('timecapsule_id');
            $table->bigInteger('gooded_user_id');
            $table->timestamps();
        });

        Schema::create('user_moneys', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('user_id');
            $table->unsignedInteger('money');
            $table->timestamps();
        });

        Schema::create('timecapsule_files', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('timecapsule_id');
            $table->text('file_path');
            $table->unsignedInteger('order_number');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('timecapsules');
        Schema::dropIfExists('comments');
        Schema::dropIfExists('user_timecapsules');
        Schema::dropIfExists('user_follows');
        Schema::dropIfExists('user_timecapsule_goods');
        Schema::dropIfExists('user_moneys');
        Schema::dropIfExists('timecapsule_files');
    }
}
