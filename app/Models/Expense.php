<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use App\Models\User;

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

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
