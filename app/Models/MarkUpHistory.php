<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarkUpHistory extends Model
{
    /** @use HasFactory<\Database\Factories\MarkUpHistoryFactory> */
    use HasFactory;

    protected $fillable =  [
        'date',
        'mark_up_rate',
    ];
}
