<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewDoHeader extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE VIEW view_trx_do_hdr 
            AS
            SELECT
                tbl_trx_do_hdr.id,
                tbl_trx_do_hdr.uuid,
                tbl_trx_do_hdr.doc_no,
                tbl_trx_do_hdr.doc_date,
                tbl_trx_do_hdr.doc_time,
                tbl_trx_do_hdr.remarks,
                tbl_trx_do_hdr.active,
                tbl_trx_do_hdr.user_created,
                tbl_trx_do_hdr.datetime_created,
                tbl_trx_do_hdr.user_updated,
                tbl_trx_do_hdr.datetime_updated
            FROM
                tbl_trx_do_hdr
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW view_trx_do_hdr");
    }
}
