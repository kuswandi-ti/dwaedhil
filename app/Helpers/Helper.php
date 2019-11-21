<?php
/* https://stackoverflow.com/questions/43179978/how-to-call-custom-helper-in-laravel-5 */
/* https://devdojo.com/tutorials/custom-global-helpers-in-laravel */
namespace App\Helpers;

use DB;

class Helper {
    /**
     * Create document number
     *
     * @param  string $trx_init = Initialization of Transaction
     * @param  int $trx_month = Month of Transaction
     * @param  int $trx_year = Year of Transaction
     * @param  int $trx_year = Year of Transaction
     * @param  int $trx_description = Description of Transaction
     * @return string
     */
    public static function create_doc_no($trx_init, $trx_month, $trx_year, $trx_description)
    {
        $count = DB::table('tbl_sys_counter_doc_number')
                     ->where([['trx_name', $trx_init], ['trx_month', $trx_month], ['trx_year', $trx_year]])
                     ->count();
        if ($count == 0) {
            $curr_doc_number = 1;
            DB::table('tbl_sys_counter_doc_number')->insert([
                [
                    'trx_name' => $trx_init, 
                    'trx_month' => $trx_month, 
                    'trx_year' => $trx_year, 
                    'trx_curr_doc_number' => $curr_doc_number, 
                    'trx_description' => $trx_description
                ]
            ]);
        } else {
            $current_no = DB::table('tbl_sys_counter_doc_number')
			              ->select('trx_curr_doc_number')
						  ->where([['trx_name', $trx_init], ['trx_month', $trx_month], ['trx_year', $trx_year]])
						  ->value('trx_curr_doc_number'); //$count + 1;
			$curr_doc_number = $current_no + 1;
            DB::table('tbl_sys_counter_doc_number')
                ->where([['trx_name', $trx_init], ['trx_month', $trx_month], ['trx_year', $trx_year]])
                ->update(['trx_curr_doc_number' => $curr_doc_number]
            );
        }
        return $trx_init.'-'.substr('00'.$trx_year, -2).substr('00'.$trx_month, -2).'-'.substr('0000'.$curr_doc_number, -4); // XX-YYMM-XXXX
    }

    /**
     * Get Stock Onhand
     *
     * @param  int $id_product_material
     * @param  string $type_product_material
     * @param  string $location
     * @return float
     */
    public static function get_stock_onhand($id_product_material, $type_product_material, $location)
    {
        return DB::table('view_trx_stock_onhand')
                   ->select('qty_balance')
                   ->where([['id_product_material', $id_product_material], ['type_product_material', $type_product_material], ['location', $location]])
                   ->get();
    }
}