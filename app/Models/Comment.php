<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Comment extends Model{
    protected $table = 'comments';
    protected $connection = 'mysql';
    public $timestamps = [];

    protected $fillable = ['post_id', 'author', 'text'];

    public function post(){
        return $this->belongsTo("App\Models\Post");
    }
}