<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnTrxDescriptionToTblCounterDocNumber extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_sys_counter_doc_number', function (Blueprint $table) {
            $table->string('trx_description')
                  ->nullable()
                  ->after('trx_curr_doc_number');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_sys_counter_doc_number', function (Blueprint $table) {
            $table->dropColumn('trx_description');
        });
    }
}
