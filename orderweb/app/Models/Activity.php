<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $table = 'activity';
    protected $fillable = [
        'description',
        'hours',
        'technician_id',
        'type_activity_id'
    ];
    public function technician()
    {
        return $this->belongsTo(technician::class, 'technician_id');
    }
    public function typeActivity()
    {
        return $this->belongsTo(TypeActivity::class, 'type_activity_id');
    }
    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}
