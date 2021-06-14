<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerMedia extends Model
{
    use HasFactory;

    protected $table = "customer_media";
    public function Media(){
        return $this->belongsTo(Media::class,"mediaID","id");
    }

    public function Customer(){
        return $this->belongsTo(Customer::class,"customerID","id");
    }
}
