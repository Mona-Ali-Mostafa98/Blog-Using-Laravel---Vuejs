<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Models\Comment;
class Post extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = ['title', 'description', 'cover', 'user_id', 'created_at', 'status'];

    public function getCoverUrlAttribute()
    {
        if (!$this->cover) {
            return 'https://media.istockphoto.com/vectors/default-profile-picture-avatar-photo-placeholder-vector-illustration-vector-id1223671392?k=20&m=1223671392&s=612x612&w=0&h=lGpj2vWAI3WUT1JeJWm1PRoHT3V15_1pdcTn2szdwQ0=';
        }
        if (Str::startsWith($this->cover, ['http://', 'https://'])) {
            return $this->cover;
        }
        return url('storage/' . $this->cover);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function comments(){
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
