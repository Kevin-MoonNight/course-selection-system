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
        Schema::create('course_selection_records', function (Blueprint $table) {
            $table->string('student_id',5);
            $table->string('course_id',4);
            $table->integer('grade');
            $table->primary(['student_id', 'course_id']);
            $table->foreign('student_id')
                ->references('id')
                ->on('students')
                ->cascadeOnDelete();
            $table->foreign('course_id')
                ->references('id')
                ->on('courses')
                ->cascadeOnDelete();
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
        Schema::dropIfExists('course_selection_records');
    }
};
