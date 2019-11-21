<?php

namespace App\Models\Transaction\Logistics;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

use App\Traits\Uuid;

class DeliveryOrderDtl extends Model
{
    protected $table = 'tbl_trx_do_dtl';
    public $timestamps = false;
	
	use Notifiable;
    use Uuid;
	
	protected $fillable = [
        'id_hdr', 'id_product', 'qty_do', 'user_created', 'datetime_created', 
        'user_updated', 'datetime_updated'
    ];
}
