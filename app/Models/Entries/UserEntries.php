<?php

namespace App\Models\Entries;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class UserEntries extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "id",
        "email",
        "password"
    ];

    public function __construct(Request $entry){
        $this->id           = intval($entry->id);
        $this->email        = trim($entry->email);
        $this->password     = trim($entry->password);
    }
}
