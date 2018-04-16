<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Post extends Model{
    public $name;
    protected $table = 'posts';
    protected $connection = 'mysql';
    public $timestamps = [];

    protected $fillable = ['author', 'title', 'text'];
    public function comments()
    {
        return $this->hasMany("App\Models\Comment");
    }
}