<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Contracts\Support\ValidatedData;

class CategoryController extends Controller
{
    public function add(Request $request) {
         $request->validate([
            'code' => ['max:15'],
            'description' => ['max:100'],
        ]);

        $categorie = Category::create([
            'code' => $request->code,
            'description' => $request->description,
        ]);

        return redirect()->route('categories');
    }

    public function edit(Request $request, $id) {
        $request->validate([
            'code' => ['max:15'],
            'description' => ['max:255'],
        ]);

        $categorie = Category::findOrFail($id);

        $categorie->code = $request->code;
        $categorie->description = $request->description;

        $categorie->save();

        return redirect()->route('categories');
    }
    public function getAllCategories(Request $request) {
        $categories = Category::orderBy('id')->paginate(10)->fragment('board');
        if($request->ajax()) {
            echo view('layout.adminCategoryBoardAndBlocPagination', compact('categories'))->render();
        }
        else {
            return view('admin.seeCategory', ['categories' => $categories]);
        }
    }

    public function seeAddForm() {
        return view('admin.addOrUpdateCategory');
    }

    public function seeEditForm($id) {
        $category = Category::findOrFail($id);
        return view('admin.addOrUpdateCategory', ['category' => $category]);
    }

    public function adminSearchCategory(Request $request) {
        $categories = Category::where([
            ['description', 'like', '%'.$request->search.'%'],
        ])->paginate(10)->fragment('board');
        echo view('layout.adminCategoryBoardAndBlocPagination', compact('categories'))->render();
    }
}
