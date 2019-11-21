<?php

namespace App\Models\Master\Products;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

use App\Traits\Uuid;

use App\Models\Master\Products\Product;

class ProductGroup extends Model
{
    protected $table = 'tbl_mst_product_group';
    public $timestamps = false;
	
	use Notifiable;
    use Uuid;
	
	protected $fillable = [
        'product_group_code', 'product_group_name', 'active', 'user_created', 'datetime_created',
        'user_updated', 'datetime_updated'
    ];

    public function tbl_mst_product()
    {
        return $this->belongsTo('Product');
    }
}
