<?php
namespace App\Models;

use CodeIgniter\Model;

class BlogCategoryModel extends Model
{
   protected $table = 'blog_categories';
    protected $primaryKey = 'id';

    protected $allowedFields = ['name','user_id', 'created_at'];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = ''; 
}
