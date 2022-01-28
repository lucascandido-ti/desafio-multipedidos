<?php

namespace App\Models\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use App\Models\Entries\UserEntries;
use App\Models\Outputs\UserOutputs;
use App\Models\User;

class UserServices extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "entries",
        "outputs"
    ];

    public function __construct(UserEntries $entries){
        $this->entries = $entries;
    }

    //Lists all registered users in the database.
    public function listUsers(){
        
        $result = User::all();

        $list = [];
        foreach($result as $item){
            $list[] = UserOutputs::format_data($item);
        }

        $this->outputs = $list;

    }

    //Find user by id
    public function findUser(){
        if($this->entries->id != ""){
            $result = User::find($this->entries->id);
            $this->outputs = UserOutputs::format_data($result);
        }else{
            $this->outputs = [];
        }
    }

    //Insert a new user
    public function insertUser(){
        
        $user = new User;

        $user->email = $this->entries->email;
        $user->password = $this->entries->password;
        $user->save();

        $this->outputs = UserOutputs::format_data($user);
    }

    //Update user
    public function updateUser(){
        
        $user = User::find($this->entries->id);

        $user->email = $this->entries->email;
        $user->password = $this->entries->password;
        $user->save();

        $this->outputs = UserOutputs::format_data($user);
    }

    //Delete user
    public function deleteUser(){
        
        $user = User::find($this->entries->id);
        $user->delete();

        $this->outputs = UserOutputs::format_data($user);
    }
}
