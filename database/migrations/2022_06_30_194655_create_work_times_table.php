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
    public function up()
    {
        Schema::create('work_times', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->unsignedInteger('project_id');
            $table->foreign('project_id')
                ->references('id')
                ->on('projects')
                ->onDelete('cascade');

            // $table->foreign('project_id')
            //     ->references('id')
            //     ->on('projects')
            //     ->onDelete(0);

            // $table->foreign('project_id')
            //     ->references('id')
            //     ->on('projects')
            //      ->nullOnDelete()


            $table->string('project_name');

            $table->string('job');
            $table->string('employee');
            $table->float('hours');
            $table->float('money_per_hour')->default(0);

            $table->date('date');

            $table->timestamps();
        });
    }

    /*
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_times');
    }
};
