<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewTblTrxGrDtl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement("
            CREATE VIEW view_trx_gr_dtl 
            AS
            SELECT 
                tbl_trx_gr_dtl.*,
                view_mst_raw_material.material_code,
                view_mst_raw_material.material_name,
                view_mst_raw_material.vpn_no,
                view_mst_raw_material.id_unit_buying,
                view_mst_raw_material.unit_code_buying,
                view_mst_raw_material.unit_name_buying,
                view_mst_raw_material.id_unit_usage,
                view_mst_raw_material.unit_code_usage,
                view_mst_raw_material.unit_name_usage,
                view_mst_raw_material.qty_conversion
            FROM
                tbl_trx_gr_dtl
                LEFT OUTER JOIN view_mst_raw_material ON tbl_trx_gr_dtl.id_raw_material = view_mst_raw_material.id
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement("DROP VIEW view_trx_gr_dtl");
    }
}
