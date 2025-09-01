<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lead extends Model
{
    protected $fillable = ['name','email','gclid','sub_id'];

    public function trackerLogs(): HasMany
    {
        return $this->hasMany(TrackerLog::class);
    }
}
