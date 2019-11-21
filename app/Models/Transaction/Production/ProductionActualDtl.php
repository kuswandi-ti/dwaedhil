<?php

namespace App\Models\Transaction\Production;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

use App\Traits\Uuid;

class ProductionActualDtl extends Model
{
    protected $table = 'tbl_trx_prodactual_dtl';
    public $timestamps = false;
	
	use Notifiable;
    use Uuid;
	
	protected $fillable = [
        'id_hdr', 'id_product', 'qty_ok', 'qty_reject', 'qty_rework', 'qty_total', 
        'user_created', 'datetime_created', 'user_updated', 'datetime_updated'
    ];
}
