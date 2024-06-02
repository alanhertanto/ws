<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';
     /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'projectId',
        'clientId',
        'freelancerId',
        'amount',
        'status'
    ];
}
