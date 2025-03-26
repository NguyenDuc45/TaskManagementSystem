<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'ten_cong_viec',
        'trang_thai',
        'ngay_het_han',
        'nguoi_phan_cong_id',
        'nguoi_lam_id'
    ];
}
