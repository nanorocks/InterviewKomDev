<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->id();
            $table->string(\App\Models\Todo::DESCRIPTION);
            $table->boolean(\App\Models\Todo::STATUS)->default(true);
            $table->boolean(\App\Models\Todo::IS_DONE)->default(true);
            $table->integer(\App\Models\Todo::TRACK_COUNTER)->default(0);
            $table->unsignedBigInteger(\App\Models\Project::RELATION_PROJECT_ID);

            $table->foreign(\App\Models\Project::RELATION_PROJECT_ID)
                ->references('id')
                ->on('projects')
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
        Schema::dropIfExists('todos');
    }
}
