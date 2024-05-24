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
        'paymentType',
        '25perPayment',
        '50perPayment',
        '75perPayment',
        '100perPayment',
        'minimumPayment',
        'maximumPayment',
        'hourlyPayment',
        'bidPitch',
        'bidPitchFile',        
    ];
}