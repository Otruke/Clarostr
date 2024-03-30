<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Earning extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'starter_earnings',
        'direct_referral_earnings',
        'downliners_earnings',
        'descendants_monthly_earnings',
        'monthly_earnings',
        'food_invest_earnings',
        'total_earnings',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

