<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    private $numberPagination = 10;

    public function index()
    {
        $theCategory = '';
        if( !empty($_GET["search-category"]) ){
            $theCategory = $_GET["search-category"];
        }

        $searchCategory = new Category();
        $categories = $searchCategory->getCategories( $theCategory, $this->numberPagination );

        return view('painel.categories.home', compact('categories'));
    }

    public function createCategory()
    {
        return view('painel.categories.create');
    }

    public function storeCategory(Request $request)
    {
        $category = new Category;

        $category->name = $request->name;
        $category->description = $request->description;

        $category->save();

        return redirect()->route('admin.categories')->with(['status' => 'A categoria foi criada com sucesso.']);
    }
    public function editCategory($idCategory)
    {
        $category = Category::find($idCategory);

        return view('painel.categories.edit', compact('category'));
    }

    public function updateCategory(Request $request, $idCategory)
    {
        $category = Category::find($idCategory);

        $category->name = $request->name;
        $category->description = $request->description;

        $category->save();

        return redirect()->route('admin.categories')->with(['status' => 'A categoria foi atualizada com sucesso.']);
    }

    public function viewCategory($idCtegory)
    {
        $category = Category::find($idCtegory);

        return view('painel.categories.view', compact('category'));
    }

    public function deleteCategory($idCategory)
    {
        Category::destroy($idCategory);

        return redirect()->route('admin.categories')->with(['status' => 'A categoria foi excluída com sucesso.']);
    }
}
