<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRoleXrefTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_role_xref', function (Blueprint $table) {
            $table->integer('user_id');
            $table->integer('role_id');
            $table->timestamps();
            $table->primary(['user_id', 'role_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('roles');
    }
}
