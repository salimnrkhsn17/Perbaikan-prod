<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stuff extends Model
{
    use SoftDeletes;
    protected $fillable = ["name", "category"];


    public function stuffStock()
    {
        return $this->hasOne(StuffStock::class);
    }

    public function inboundStuffs()
    {
        return $this->hasMany(inboundStuffs::class);
    }

    public function lendings()
    {
        return $this->belongsTo(Stuff::class);
    }
}


