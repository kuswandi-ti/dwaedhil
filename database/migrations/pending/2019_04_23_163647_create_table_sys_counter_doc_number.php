<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSysCounterDocNumber extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_sys_counter_doc_number', function (Blueprint $table) {
            $table->string('trx_name')->nullable();
            $table->integer('trx_month')->nullable();
            $table->integer('trx_year')->nullable();
            $table->integer('trx_curr_doc_number')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_sys_counter_doc_number');
    }
}
