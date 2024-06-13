<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'orderer_name',
        'orderer_phone',
        'orderer_id',
        'vehicle_id',
        'driver_id',
        'accepter_level1_id',
        'accepter_level2_id',
        'start_date',
        'end_date',
        'reason',
        'status'
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function accepterLevel1()
    {
        return $this->belongsTo(User::class, 'accepter_level1_id');
    }

    public function accepterLevel2()
    {
        return $this->belongsTo(User::class, 'accepter_level2_id');
    }
}
