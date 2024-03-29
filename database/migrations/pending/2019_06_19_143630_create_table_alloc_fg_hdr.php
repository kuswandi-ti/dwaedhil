<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAllocFgHdr extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_trx_allocfg_hdr', function (Blueprint $table) {
            $table->bigIncrements('id', true, true);
            $table->uuid('uuid')->unique();
            $table->string('doc_no')->unique();
            $table->date('doc_date')->nullable();
            $table->string('doc_time')->nullable();
            $table->text('remarks')->nullable();
            $table->char('active', 1)->default('1');
            $table->string('user_created');
            $table->dateTime('datetime_created');
            $table->string('user_updated');
            $table->dateTime('datetime_updated');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_trx_allocfg_hdr');
    }
}
