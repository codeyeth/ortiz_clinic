<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentListsTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('appointment_lists', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('mobile_no');
            $table->string('branch');
            $table->string('service');
            $table->string('date');
            $table->string('remarks', '200')->nullable();
            
            $table->boolean('is_done')->nullable()->default(false);
            $table->string('is_done_by_id')->nullable();
            $table->string('is_done_by')->nullable();
            $table->string('is_done_at')->nullable();
            
            $table->boolean('is_confirmed')->nullable()->default(false);
            $table->string('is_confirmed_by_id')->nullable();
            $table->string('is_confirmed_by')->nullable();
            $table->string('is_confirmed_at')->nullable();
            
            $table->boolean('is_replied')->nullable()->default(false);
            $table->string('is_replied_by_id')->nullable();
            $table->string('is_replied_by')->nullable();
            $table->string('is_replied_at')->nullable();
            
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
        Schema::dropIfExists('appointment_lists');
    }
}
