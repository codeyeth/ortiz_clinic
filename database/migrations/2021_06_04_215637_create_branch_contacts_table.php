<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchContactsTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('branch_contacts', function (Blueprint $table) {
            $table->id();
            $table->string('branch_id');
            $table->string('contact_number');
            $table->string('created_by_id');
            $table->string('created_by');
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
        Schema::dropIfExists('branch_contacts');
    }
}
