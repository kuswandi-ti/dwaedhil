<?php

namespace App\Models\Transaction\Warehouse;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

use App\Traits\Uuid;

class GoodsReceiveDtl extends Model
{
    protected $table = 'tbl_trx_gr_dtl';
    public $timestamps = false;
	
	use Notifiable;
    use Uuid;
	
	protected $fillable = [
        'id_hdr', 'id_raw_material', 'qty_gr', 'user_created', 'datetime_created',
        'user_updated', 'datetime_updated'
    ];
}
