<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;

    protected $table = 'pesertas';

    // Tambahkan 'no_pendaftaran' di dalam array $fillable ini
    protected $fillable = [
        'no_pendaftaran',
        'skema_id',
        'nama_peserta',
        'email',
        'jns_kelamin',
        'alamat',
        'no_hp',
    ];

    public function skema()
    {
        return $this->belongsTo(Skema::class);
    }
}