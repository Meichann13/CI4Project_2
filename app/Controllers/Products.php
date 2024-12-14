<?php

namespace App\Controllers;
use App\Models\ProductModel;

class Products extends BaseController
{
    public function index ()
    {
        $productModel = new ProductModel();
        $data['products'] = $productModel->findALL();
       // echo("test");die;
        return view('products/index', $data);
 
    }



    public function create()
    {
        return view('products/create'); //view untuk form tambah produk
    }

    public function store ()
    {
        $productModel = new ProductModel();
        $data = [
            'name'          => $this->request->getPost('name'),
            'price'         => $this->request->getPost('price'),
            'DESCRIPTION'   => $this->request->getPost('DESCRIPTION'),
            'category'      => $this->request->getPost('category'),
        ];

        $productModel->insert($data);
        return redirect()->to('/products');
    }

    public function edit($id)
    {
        $productModel = new ProductModel();
        $data['products'] = $productModel->find($id);
       
        return view('products/edit', $data); //view untuk form edit produk
    }

    public function update($id)
    {
        $productModel = new ProductModel();
        $data = [
            'name'          => $this->request->getPost('name'),
            'price'         => $this->request->getPost('price'),
            'DESCRIPTION'   => $this->request->getPost('DESCRIPTION'),
            'category'      => $this->request->getPost('category'),
        ];

        $productModel->update($id, $data);
        return redirect()->to('/products');
    }
}

