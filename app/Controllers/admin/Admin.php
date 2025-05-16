<?php

namespace App\Controllers\Admin;

use App\Models\BlogCategoryModel;
use App\Models\AddBlogModel;
use App\Models\UserModel;
use App\Controllers\BaseController;

class Admin extends BaseController
{

    public function index()
    {
        // print_r('vcfdv');exit;
        return view('layout\widget\main');
    }

    public function create()
    {
        $authorModel = new UserModel();
        $categoryModel = new BlogCategoryModel();
        $data['categories'] = $categoryModel->findAll();
        $data['authors'] = $authorModel->findAll();
        // echo "<pre>";
        // print_r($data);die;
        return view('layout/admin/add_blog', $data);
    }

    public function addCategory()
    {
        return view('layout/admin/add_category');
    }

    public function store()
    {
        // echo "<pre>";
        // print_r($_POST);die;
        $blogModel = new \App\Models\AddBlogModel();
        helper(['form', 'url']);
        $session = session();
        $userId = $session->get('id');
        $validation = \Config\Services::validation();
        $rules = [
            'title' => 'required',
            'category' => 'required',
            'short_content' => 'required',
            'content' => 'required'
        ];

        if (!$this->validate($rules)) {
            return $this->response->setJSON(['status' => false, 'errors' => $validation->getErrors()]);
        }

        $imageName = null;
        if ($img = $this->request->getFile('image')) {
            if ($img->isValid() && !$img->hasMoved()) {
                $imageName = $img->getRandomName();
                $img->move('uploads/blogs/', $imageName);
            }
        }

        $blogModel->save([
            'title' => $this->request->getPost('title'),
            'category' => $this->request->getPost('category'),
            'author_name' => $userId,
            'short_content' => $this->request->getPost('short_content'),
            'content' => $this->request->getPost('content'),
            'image' => $imageName,
            'meta_title' => $this->request->getPost('meta_title'),
            'meta_description' => $this->request->getPost('meta_description'),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        return $this->response->setJSON(['status' => true, 'message' => 'Blog added successfully.']);
    }



    // Category
    public function storeCategory()
    {
        $session = session();
        $userId = $session->get('id');
        $validation = \Config\Services::validation();
        $rules = [
            'name' => 'required',
        ];

        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'status' => false,
                'errors' => $validation->getErrors()
            ]);
        }

        $categoryModel = new \App\Models\BlogCategoryModel();

        $data = [
            'name' => $this->request->getPost('name'),
            'user_id' => $userId,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $categoryModel->save($data);

        return $this->response->setJSON([
            'status' => true,
            'message' => 'Category added successfully.'
        ]);
    }



    public function blogs()
    {
        $blogModel = new \App\Models\AddBlogModel();
        $categoryModel = new \App\Models\BlogCategoryModel();
        $adminModel = new \App\Models\AdminModel();

        $blogs = $blogModel->orderBy('created_at', 'DESC')->findAll();

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

        return view('layout/admin/blogs', [
            'blogs' => $blogs,
            'categoryMap' => $categoryMap,
            'adminMap' => $adminMap
        ]);
    }



    public function delete($id = null)
    {
        if (!$this->request->isAJAX()) {
            return redirect()->to('/layout/admin/blogs');
        }

        $blogModel = new \App\Models\AddBlogModel();

        if (!$id || !$blogModel->find($id)) {
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Invalid blog ID.'
            ]);
        }

        if ($blogModel->delete($id)) {
            return $this->response->setJSON([
                'status' => true,
                'message' => 'Blog deleted successfully.'
            ]);
        } else {
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Failed to delete blog.'
            ]);
        }
    }


    public function edit($id = null)
    {
        $blogModel = new \App\Models\AddBlogModel();
        $categoryModel = new \App\Models\BlogCategoryModel();

        $blog = $blogModel->find($id);
        if (!$blog) {
            return redirect()->to('/layout/admin/blogs')->with('error', 'Blog not found.');
        }

        $data['blog'] = $blog;
        $data['categories'] = $categoryModel->findAll();

        return view('layout/admin/edit_blog', $data);
    }


    public function update()
    {
        $validation = \Config\Services::validation();
        $rules = [
            'id' => 'required|integer',
            'title' => 'required|min_length[3]',
            'short_content' => 'required',
        ];

        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'status' => false,
                'errors' => $validation->getErrors()
            ]);
        }

        $blogModel = new \App\Models\AddBlogModel();

        $id = $this->request->getPost('id');
        $blog = $blogModel->find($id);

        if (!$blog) {
            return $this->response->setJSON([
                'status' => false,
                'errors' => ['id' => 'Blog not found']
            ]);
        }

        $imgFile = $this->request->getFile('image');
        $imageName = $blog['image'];

        if ($imgFile && $imgFile->isValid() && !$imgFile->hasMoved()) {
            $newName = $imgFile->getRandomName();
            $imgFile->move(ROOTPATH . 'uploads/blogs/', $newName);

            // Unlink (delete) old image if exists and is not empty
            if (!empty($imageName)) {
                $oldImagePath = ROOTPATH . 'uploads/blogs/' . $imageName;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $imageName = $newName;
        }

        $data = [
            'title' => $this->request->getPost('title'),
            'category' => $this->request->getPost('category'),
            'short_content' => $this->request->getPost('short_content'),
            'content' => $this->request->getPost('content'),
            'image' => $imageName,
            'meta_title' => $this->request->getPost('meta_title'),
            'meta_description' => $this->request->getPost('meta_description'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        if ($blogModel->update($id, $data)) {
            return $this->response->setJSON([
                'status' => true,
                'message' => 'Blog updated successfully.'
            ]);
        } else {
            return $this->response->setJSON([
                'status' => false,
                'errors' => ['update' => 'Failed to update blog.']
            ]);
        }
    }


    public function categories()
    {
        $categoryModel = new \App\Models\BlogCategoryModel();
        $categories = $categoryModel->findAll();

        return view('layout/admin/category', ['categories' => $categories]);
    }


    public function deleteCategory($id)
    {
        if ($this->request->isAJAX()) {
            $model = new BlogCategoryModel();
            $deleted = $model->delete($id);
            return $this->response->setJSON([
                'status' => $deleted,
                'message' => $deleted ? 'Category deleted successfully.' : 'Failed to delete category.',
            ]);
        }
        return redirect()->back();
    }

    public function updateCategory()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getPost('id');
            $name = $this->request->getPost('name');

            $model = new BlogCategoryModel();
            $updated = $model->update($id, ['name' => $name]);

            return $this->response->setJSON([
                'status' => $updated,
                'message' => $updated ? 'Category updated successfully.' : 'Failed to update category.',
            ]);
        }
        return redirect()->back();
    }
}
