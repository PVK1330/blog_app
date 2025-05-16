<?php

namespace App\Controllers\Frontend;

use App\Models\AddBlogModel;
use App\Models\BlogCategoryModel;
use App\Controllers\BaseController;
use App\Models\AdminModel;

class Home extends BaseController
{
    public function index()
    {
        $blogModel = new AddBlogModel();
        $adminModel = new AdminModel();
        $categoryModel = new BlogCategoryModel();
        $blogs = $blogModel->orderBy('created_at', 'DESC')->findAll(10);
        $categories = $categoryModel->findAll();
        $categoryMap = [];
        foreach ($categories as $cat) {
            $categoryMap[$cat['id']] = $cat['name'];
        }
        $admins = $adminModel->findAll();
        $adminMap = [];
        foreach ($admins as $admin) {
            $adminMap[$admin['id']] = $admin['fname'] . ' ' . $admin['lname'];
        }
        foreach ($blogs as &$blog) {
            $authorId = $blog['author_name'];
            $blog['author_full_name'] = $adminMap[$authorId] ?? 'Unknown Author';
        }
        unset($blog);
        return view('layout/frontend/index', [
            'blogs' => $blogs,
            'categoryMap' => $categoryMap
        ]);
    }



    public function view($id = null)
    {
        $blogModel = new AddBlogModel();
        $categoryModel = new BlogCategoryModel();
        $adminModel = new AdminModel();

        $blog = $blogModel->find($id);
        if (!$blog) {
            return redirect()->to('/')->with('error', 'Blog post not found.');
        }
        $category = $categoryModel->find($blog['category']);
        $categoryName = $category ? $category['name'] : 'Uncategorized';

        $authorId = $blog['author_name'];
        $author = $adminModel->find($authorId);
        $authorFullName = $author ? $author['fname'] . ' ' . $author['lname'] : 'Unknown Author';

        $otherBlogs = $blogModel
            ->where('id !=', $id)
            ->orderBy('created_at', 'DESC')
            ->findAll(5);

        return view('layout/frontend/blog_detail', [
            'blog' => $blog,
            'categoryName' => $categoryName,
            'authorFullName' => $authorFullName,
            'otherBlogs' => $otherBlogs,
        ]);
    }
}
