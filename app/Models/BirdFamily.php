<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BirdFamily extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'order',
    ];

    public function bird_genera()
    {
        return $this->hasMany(BirdGenus::class);
    }

}
