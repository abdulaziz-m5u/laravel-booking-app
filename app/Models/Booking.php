<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

     /**
     * Set attribute to date format
     * @param $input
     */
    public function setTimeFromAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['time_from'] = Carbon::createFromFormat('Y-m-d H:i', $input)->format('Y-m-d H:i');
        } else {
            $this->attributes['time_from'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getTimeFromAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'],'Y-m-d H:i:s');

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d H:i:s', $input)->format('Y-m-d H:i:s');
        } else {
            return '';
        }
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setTimeToAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['time_to'] = Carbon::createFromFormat('Y-m-d H:i', $input)->format('Y-m-d H:i');
        } else {
            $this->attributes['time_to'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getTimeToAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'],'Y-m-d H:i');

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d H:i:s', $input)->format('Y-m-d H:i:s');
        } else {
            return '';
        }
    }

    public function getStatusAttribute($input) {
        return [
            0 => 'Created',
            1 => 'Completed',
            2 => 'Cancelled'
        ][$input];
    }
}
