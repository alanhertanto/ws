<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'projectFile',
        'projectName',
        'projectDescription',
        'paymentType',
        '25perPayment',
        '50perPayment',
        '75perPayment',
        '100perPayment',
        'minimumPayment',
        'maximumPayment',
        'hourlyPayment'
    ];
}