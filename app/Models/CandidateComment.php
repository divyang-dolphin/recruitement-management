<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ColumnFillable;
use Kyslik\ColumnSortable\Sortable;

class CandidateComment extends Model
{
    use HasFactory, ColumnFillable, Sortable;

    public function commentUser()
    {
        return $this->belongsTo(User::class,'updated_by','id');
    }
}
