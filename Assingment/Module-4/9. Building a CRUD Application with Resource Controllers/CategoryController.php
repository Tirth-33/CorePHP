<?php

require_once 'Category.php';
require_once 'Database.php';

class CategoryController
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    // Display a listing of categories
    public function index()
    {
        $categories = $this->db->getAllCategories();
        include 'views/categories/index.php';
    }

    // Show the form for creating a new category
    public function create()
    {
        include 'views/categories/create.php';
    }

    // Store a newly created category
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            
            if (!empty($name)) {
                $category = new Category($name, $description);
                $this->db->createCategory($category);
                header('Location: index.php?action=index');
                exit;
            }
        }
        header('Location: index.php?action=create');
    }

    // Display the specified category
    public function show($id)
    {
        $category = $this->db->getCategoryById($id);
        include 'views/categories/show.php';
    }

    // Show the form for editing the specified category
    public function edit($id)
    {
        $category = $this->db->getCategoryById($id);
        include 'views/categories/edit.php';
    }

    // Update the specified category
    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            
            if (!empty($name)) {
                $this->db->updateCategory($id, $name, $description);
                header('Location: index.php?action=index');
                exit;
            }
        }
        header('Location: index.php?action=edit&id=' . $id);
    }

    // Remove the specified category
    public function destroy($id)
    {
        $this->db->deleteCategory($id);
        header('Location: index.php?action=index');
        exit;
    }
}