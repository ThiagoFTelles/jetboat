<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use Spatie\Activitylog\Traits\LogsActivity;

class Datasheet extends Model
{
    use LogsActivity;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'vehicle_id', 'last_oil', 'next_oil', 'warranty', 'maintenance_description', 'maintenance_expected_date', 'maintenance_date_held', 'repair_date_held', 'repair_description', 'repair_professional', 'repair_professional_contact'
    ];
    protected static $logAttributes = ['*'];

    public function owner()
    {
        return $this->belongsTo(Vehicle::class);
    }
}