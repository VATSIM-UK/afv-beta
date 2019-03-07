<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_first');
            $table->string('name_last');
            $table->string('rating_atc');
            $table->string('rating_pilot');
            $table->string('email');
            $table->string('region');
            $table->string('division');
            $table->string('subdivision')->nullable();
            $table->rememberToken();
            $table->timestamp('last_login');
            $table->string('last_login_ip');
            $table->timestamp('joined_at')->default(Carbon::now());
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
    }
}
