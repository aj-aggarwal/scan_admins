<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class CenterQrCode extends Model
{
    use HasApiTokens, HasFactory;

    public $table = 'center_qrcode';
    public $fillable = ['center_id', 'generated_by_user_id', 'qr_code', 'status'];
}
