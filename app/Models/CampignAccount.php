<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CampignAccount extends Model
{
    // Mass Assignment: Kolom yang boleh diisi melalui form
    protected $fillable = [
        'campaign_id',
        'bank_name',
        'account_number',
        'account_holder',
    ];

    // Relasi Kebalikan: Rekening ini milik (belongsTo) Campaign apa?
    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
