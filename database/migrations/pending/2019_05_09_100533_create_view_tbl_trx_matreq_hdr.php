<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewTblTrxMatreqHdr extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement("
            CREATE VIEW view_trx_matreq_hdr 
            AS
            SELECT 
                tbl_trx_matreq_hdr.*
            FROM
                tbl_trx_matreq_hdr
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement("DROP VIEW view_trx_matreq_hdr");
    }
}
