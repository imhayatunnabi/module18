<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded=[];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public static function countByCategoryId($categoryId)
    {
        return self::where('category_id', $categoryId)->count();
    }
    public static function getSoftDeleted()
    {
        return self::onlyTrashed()->get();
    }
}
