<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewTblMstRawMaterial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement("
            CREATE VIEW view_mst_raw_material 
            AS
            SELECT 
                tbl_mst_raw_material.*,
                tbl_mst_unit_buying.unit_code AS unit_code_buying,
                tbl_mst_unit_buying.unit_name AS unit_name_buying,
                tbl_mst_unit_usage.unit_code AS unit_code_usage,
                tbl_mst_unit_usage.unit_name AS unit_name_usage,
                tbl_mst_supplier.supplier_code,
                tbl_mst_supplier.supplier_name,
                'RAW_MATERIAL' AS type_product
            FROM
                tbl_mst_raw_material
                LEFT OUTER JOIN tbl_mst_unit AS tbl_mst_unit_buying ON tbl_mst_raw_material.id_unit_buying = tbl_mst_unit_buying.id
                LEFT OUTER JOIN tbl_mst_unit AS tbl_mst_unit_usage ON tbl_mst_raw_material.id_unit_usage = tbl_mst_unit_usage.id
                LEFT OUTER JOIN tbl_mst_supplier ON tbl_mst_raw_material.id_supplier = tbl_mst_supplier.id
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement("DROP VIEW view_mst_raw_material");
    }
}
