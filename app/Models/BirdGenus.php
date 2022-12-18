<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BirdGenus extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'bird_family_id',
    ];

    public function bird_family()
    {
        return $this->belongsTo(BirdFamily::class);
    }

    public function birds()
    {
        return $this->hasMany(Bird::class);
    }
}
