<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReportsAttended extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports_attended', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id'); //the field is filled when it is attended by an user_employee
            $table->string('evidence')->nullable();
            $table->string('comments')->nullable();
            $table->integer('report_id');
            $table->integer('user_employee_id');
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
        Schema::dropIfExists('reports_attended');
    }
}
