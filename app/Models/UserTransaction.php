<?php

namespace App\Models;
use Database\Factories\UserTransactionFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserTransaction extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'payment_mode',
        'type',
        'description',
        'transaction_id',
        'name',
        'email',
        'phone_number',
        'amount',
       
    ];
    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function newFactory()
{
    return UserTransactionFactory::new();
}
}


