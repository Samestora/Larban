<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Card extends Model
{
    use HasFactory;


    protected $fillable = ['title', 'description', 'due_date', 'column_id'];

    public function column(): BelongsTo
    {
        return $this->belongsTo(Column::class);
    }

    public function assignees()
    {
        return $this->belongsToMany(User::class);
    }
}
