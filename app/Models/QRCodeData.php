<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QRCodeData extends Model
{
    use HasFactory;
    protected $table = 'qr_codes';
    protected $fillable = ['data', 'qr_code_path'];
}
