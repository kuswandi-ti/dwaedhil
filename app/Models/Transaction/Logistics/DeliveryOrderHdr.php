<?php

namespace App\Models\Transaction\Logistics;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

use App\Traits\Uuid;

class DeliveryOrderHdr extends Model
{
    protected $table = 'tbl_trx_do_hdr';
    public $timestamps = false;
	
	use Notifiable;
    use Uuid;
	
	protected $fillable = [
        'doc_no', 'doc_date', 'doc_time', 'vehicle_number', 'driver_name', 'loading_time', 
		'remarks', 'active', 'user_created', 'datetime_created', 'user_updated', 'datetime_updated'
    ];
}
