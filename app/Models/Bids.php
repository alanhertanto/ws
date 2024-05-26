<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bids extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'projectId',
        'userId',
        'bidPitch',
        'bidPitchFile',
        'rates',
        'bidStatus',
    ];
}