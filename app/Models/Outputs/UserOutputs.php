<?php

namespace App\Models\Outputs;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class UserOutputs extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        //
    ];

    public function format_data($output){

        $result = (object)array();
        $result->id               = $output->id;
        $result->email            = $output->email;
        $result->password         = $output->password;
        $result->creation_date    = $output->created_at;
        $result->last_update      = $output->updated_at;
        
        return $result;
        
    }
}
