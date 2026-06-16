<?php

namespace App\Models;

use App\Models\CampaignAccount;
use App\Models\Category;
use App\Models\Donation;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $fillable = [
        'title',
        'description',
        'target_donation',
        'collected_donation',
        'deadline'
    ];

    // 1. One to One: Satu Campaign punya satu Rekening
    public function campaignAccount()
    {
        return $this->hasOne(CampaignAccount::class);
    }

    // 2. One to Many: Satu Campaign punya banyak Donasi
    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    // 3. Many to Many: Satu Campaign bisa punya banyak Kategori
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'campaign_category')
            ->withTimestamps();
    }
}
