<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nette\Schema\Elements\Structure;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Models\Service;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;

class StructureController extends Controller
{
    public function add(Request $request) {
        $request->validate([
            'code' => ['max:15'],
            'description' => ['max:100'],
        ]);

        DB::table('structures')->insert([
            'code' => $request->code,
            'description' => $request->description,
            'actif' => $request->actif,
            'category_id' => intval($request->categorie),
        ]);
        
        return redirect()->route('structures');
    }

    public function edit(Request $request, $id) {
        $request->validate([
            'code' => ['max:15'],
            'description' => ['max:100'],
        ]);

        DB::table('structures')
            ->where('id', $id)
            ->update([
                'code' => $request->code,
                'description' => $request->description,
                'actif' => $request->actif,
                'category_id' => intval($request->categorie),
            ]);
        
        return redirect()->route('structures');
    }
    public function getAllStructures(Request $request) {
        $structures = \App\Models\Structure::orderBy('id')->paginate(10)->fragment('board');
        if($request->ajax()) {
            echo view('layout.adminStructureBoardAndBlocPagination', compact('structures'))->render();
        } else {
            return view('admin.seeStructure', ['structures' => $structures]);
        }  
    }
    public function seeServiceByStructure(Request $request) {        
        //get all categories

        $categories = Category::all();
        
        $thematics = DB::table('thematics')
            ->join('services', 'thematics.id', '=', 'services.thematic_id')
            ->select('thematics.id', 'thematics.description')
            ->distinct()
            ->get();

        if($request->ajax()) {
            if($request->has('structures')) {
                $serviceByStructure = Service::where('structure_id', intval($request->structures))->paginate(10)->fragment('board');
            } else {
                $serviceByStructure = [];
            }
            echo view('layout.boardAndBlocPagination', compact('serviceByStructure'))->render();
         } else {
            $serviceByStructure = [];
            return view('ServiceByStructureOrThematic', compact('serviceByStructure', 'categories', 'thematics'));
        }
    }

    public function getStructures($category_id) {
        $structures = \App\Models\Structure::where('category_id', $category_id)->get();
        return $structures->toJson();
    }

    public function searchService(Request $request) {
        $serviceByStructure = Service::where([
            ['structure_id', '=', $request->structures],
            ['description', 'like', '%'.$request->search.'%'],
        ])->paginate(10)->fragment('board');
        echo view('layout.boardAndBlocPagination', compact('serviceByStructure'))->render();
    }

    public function seeAddForm() {
        $categories = Category::all();  
        return view('admin.addOrUpdateStructure', ['categories' => $categories]);
    }

    public function seeEditForm($id) {
        $structure = \App\Models\Structure::findOrFail($id);
        $categories = Category::all(); 
        return view('admin.addOrUpdateStructure', ['structure' => $structure, 'categories' => $categories]);
    }

    public function adminSearchStructure(Request $request) {
        $structures = \App\Models\Structure::where([
            ['description', 'like', '%'.$request->search.'%'],
        ])->paginate(10)->fragment('board');
        echo view('layout.adminStructureBoardAndBlocPagination', compact('structures'))->render();
    }

}

