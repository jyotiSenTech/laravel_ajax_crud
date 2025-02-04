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
        Schema::create('employee_master', function (Blueprint $table) {
            $table->id();
            $table->string('emp_full_name');
            $table->string('emp_email')->unique();
            $table->string('emp_phone');
            $table->string('emp_gender');
            $table->string('emp_username')->unique();
            $table->string('emp_password');
            $table->timestamps();
            $table->softDeletes('deleted_at', precision: 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_master');
    }
};
