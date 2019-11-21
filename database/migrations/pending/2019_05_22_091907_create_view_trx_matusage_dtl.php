<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewTrxMatusageDtl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE VIEW view_trx_matusage_dtl 
            AS
            SELECT
                tbl_trx_matusage_dtl.*,
                view_mst_raw_material.material_code,
                view_mst_raw_material.material_name,
                view_mst_raw_material.vpn_no,
                tbl_mst_unit.unit_code,
                tbl_mst_unit.unit_name
            FROM
                tbl_trx_matusage_dtl
                LEFT OUTER JOIN view_mst_raw_material ON tbl_trx_matusage_dtl.id_raw_material = view_mst_raw_material.id
                LEFT OUTER JOIN tbl_mst_unit ON tbl_trx_matusage_dtl.id_unit = tbl_mst_unit.id
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW view_trx_matusage_dtl");
    }
}
