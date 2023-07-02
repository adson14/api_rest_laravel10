<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Expense extends Model
{

    protected $fillable = ['id', 'description', 'date_expense', 'value', 'user_id'];
    protected $table = 'expenses';

    protected $primaryKey = 'id';


    public function getDateFormat()
    {
        return 'Y-m-d H:i:s';
    }

    protected $dateFormat = 'Y-m-d H:i:s.uO';

    public function setDateExpenseAttribute($value)
    {
        $this->attributes['date_expense'] = empty($value) ? null : Carbon::parse($value)->format('Y-m-d');
    }

    public function getDateExpenseAttribute($value)
    {
        return Carbon::parse($value);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function boot()
    {
        parent::boot();
        self::saving(function ($expense) {
            $user = Auth::user();
            if ($user) {
                $expense->user_id = $user->id;
            }
        });
    }
}
