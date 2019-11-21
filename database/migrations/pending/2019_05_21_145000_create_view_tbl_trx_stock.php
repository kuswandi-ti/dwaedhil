<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewTblTrxStock extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE VIEW view_trx_stock 
            AS
            SELECT
                tbl_trx_stock.*,
                view_mst_product_material_union.product_material_code,
                view_mst_product_material_union.product_material_name,
                view_mst_product_material_union.active,
                tbl_mst_unit.unit_code,
                tbl_mst_unit.unit_name
            FROM
                tbl_trx_stock
                LEFT OUTER JOIN view_mst_product_material_union ON tbl_trx_stock.id_product_material=view_mst_product_material_union.product_material_id AND tbl_trx_stock.type_product_material=view_mst_product_material_union.product_material_type
                LEFT OUTER JOIN tbl_mst_unit ON tbl_trx_stock.id_unit=tbl_mst_unit.id
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW view_trx_stock");
    }
}
