<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Traits\CausesActivity;

class Vehicle extends Model
{
    use LogsActivity;
    use CausesActivity;
    use SoftDeletes;
    protected $dates = ['deleted_at', 'last_run'];
    protected $primaryKey = 'uuid';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $guarded = ['id'];
    protected static $logAttributes = ['id', 'uuid', 'name', 'owner_name', 'status', 'brand', 'model', 'year', 'register_number', 'marina_id'];

    public function datasheets()
    {
        return $this->hasMany(Datasheet::class, 'vehicle_id');
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function setRegisterNumberAttribute($value)
    {
        $this->attributes['register_number'] = strtoupper($value);
    }

    public function isDisused()
    {	
        $DISUSED_DAYS = 15;

        $today = Carbon::today();
        $today = new Carbon($today, 'America/Sao_Paulo');
        $disusedDate = $today->subDays($DISUSED_DAYS);
        $lastRunDate = $this->last_run; 

        if(!$lastRunDate){return false;}

        if($lastRunDate <= $disusedDate)
        {
            return true;
        } else {
            return false; 
        }

    }

}
