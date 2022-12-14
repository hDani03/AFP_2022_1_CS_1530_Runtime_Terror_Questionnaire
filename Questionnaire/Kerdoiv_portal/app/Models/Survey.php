<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $fillable = ['id', 'survey_id', 'cim', 'rovid_leiras', 'created_at', 'updated_at'];
    use HasFactory;

    public function scopeFilter($query, array $filters){

        if ($filters['search'] ?? false) {
            $query->where('cim', 'like', '%' . request('search') . '%') 
            ->orWhere('rovid_leiras', 'like', '%' . request('search') . '%');
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }



}
