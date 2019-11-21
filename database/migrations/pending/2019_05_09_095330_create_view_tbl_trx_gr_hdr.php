<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewTblTrxGrHdr extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement("
            CREATE VIEW view_trx_gr_hdr 
            AS
            SELECT 
                tbl_trx_gr_hdr.*,
                tbl_mst_supplier.supplier_code,
                tbl_mst_supplier.supplier_name
            FROM
                tbl_trx_gr_hdr
                LEFT OUTER JOIN tbl_mst_supplier ON tbl_trx_gr_hdr.id_supplier = tbl_mst_supplier.id
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement("DROP VIEW view_trx_gr_hdr");
    }
}
