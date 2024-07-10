<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable=[
        'pasien_id',
        'apoteker_id',
        'medicine_id',
        'tindakan_id',
    ];

    public function apoteker()
    {
        return $this->belongsTo(User::class, 'apoteker_id');
    }
    public function pasien()
    {
        return $this->belongsTo(User::class, 'pasien_id');
    }

    public function medicine()
    {
        return $this->belongsTo(Medicine::class, 'medicine_id');
    }

    public function tindakan()
    {
        return $this->belongsTo(Tindakan::class, 'tindakan_id');
    }

}
