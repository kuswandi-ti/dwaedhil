<?php

namespace App\Models\Transaction\Warehouse;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

use App\Traits\Uuid;

class GoodsReceiveHdr extends Model
{
    protected $table = 'tbl_trx_gr_hdr';
    public $timestamps = false;
	
	use Notifiable;
    use Uuid;
	
	protected $fillable = [
        'doc_no', 'doc_date', 'doc_time', 'reff_no', 'id_supplier', 
        'remarks', 'active', 'user_created', 'datetime_created',
        'user_updated', 'datetime_updated'
    ];
}
