<?php

namespace App\Models\Master\Partners;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

use App\Traits\Uuid;

class Supplier extends Model
{
    protected $table = 'tbl_mst_supplier';
    public $timestamps = false;
	
	use Notifiable;
    use Uuid;
	
	protected $fillable = [
        'supplier_code', 'supplier_name', 'active', 'user_created', 'datetime_created',
        'user_updated', 'datetime_updated'
    ];
}
