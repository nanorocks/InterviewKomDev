<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_project', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(\App\Models\User::RELATION_USER_ID);
            $table->unsignedBigInteger(\App\Models\Project::RELATION_PROJECT_ID);

            $table->foreign(\App\Models\Project::RELATION_PROJECT_ID)
                ->references('id')
                ->on('projects')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign(\App\Models\User::RELATION_USER_ID)
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

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
        Schema::dropIfExists('users_project');
    }
}
