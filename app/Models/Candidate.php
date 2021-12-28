<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ColumnFillable;
use Kyslik\ColumnSortable\Sortable;

class Candidate extends Model
{
    use HasFactory, ColumnFillable, Sortable;

    protected $appends = [
        'full_name',
    ];

    public $sortableAs = ['full_name'];

    public $sortable = [
        'full_name','email','mobile_number','current_location','experience','ctc','expected_ctc','dob'
    ];

    public function getFullNameAttribute()
    {
        return $this->first_name . " " . $this->last_name;
    }
}
