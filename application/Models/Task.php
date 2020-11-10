<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model {
    
    protected $fillable = ['user', 'title','content', 'email', 'created_at', 'updated_at', 'status'];

    public function showCheckbox()
    {
        return \App\Helpers\Guard::isAuth();
    }

    public function isChecked()
    {
        return $this->status === "closed";
    }

    public function isUpdated()
    {
        return strtotime($this->created_at) < strtotime($this->updated_at);
    }
}