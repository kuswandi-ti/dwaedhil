<?php

namespace App\Models\Transaction\Production;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

use App\Traits\Uuid;

class ProductionActualHdr extends Model
{
    protected $table = 'tbl_trx_prodactual_hdr';
    public $timestamps = false;
	
	use Notifiable;
    use Uuid;
	
	protected $fillable = [
        'doc_no', 'doc_date', 'doc_time', 'day', 'month', 'year', 'remarks', 'active', 
        'user_created', 'datetime_created', 'user_updated', 'datetime_updated'
    ];
}
