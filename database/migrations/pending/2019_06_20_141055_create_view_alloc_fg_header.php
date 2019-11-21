<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewAllocFgHeader extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE VIEW view_trx_allocfg_hdr 
            AS
            SELECT
                tbl_trx_allocfg_hdr.id,
                tbl_trx_allocfg_hdr.uuid,
                tbl_trx_allocfg_hdr.doc_no,
                tbl_trx_allocfg_hdr.doc_date,
                tbl_trx_allocfg_hdr.doc_time,
                tbl_trx_allocfg_hdr.remarks,
                tbl_trx_allocfg_hdr.active,
                tbl_trx_allocfg_hdr.user_created,
                tbl_trx_allocfg_hdr.datetime_created,
                tbl_trx_allocfg_hdr.user_updated,
                tbl_trx_allocfg_hdr.datetime_updated
            FROM
                tbl_trx_allocfg_hdr
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW view_trx_allocfg_hdr");
    }
}
