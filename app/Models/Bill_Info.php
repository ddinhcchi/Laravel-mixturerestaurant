<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill_Info extends Model
{
    use HasFactory;

    protected $fillable = ['idBill', 'foodName', 'count', 'price'];
}
