<?php

namespace App\Models;

use CodeIgniter\Model;

class AddBlogModel extends Model
{
    protected $table = 'blogs';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'title',
        'category',
        'author_name',
        'short_content',
        'content',
        'image',
        'meta_title',
        'meta_description',
        'created_at',
        'updated_at'
    ];
}
