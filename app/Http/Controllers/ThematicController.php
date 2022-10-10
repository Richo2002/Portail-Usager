<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use App\Models\Thematic;
use App\Models\Service;
use Illuminate\Support\Facades\DB;

class ThematicController extends Controller
{
    public function add(Request $request) {
        $request->validate([
           'description' => ['max:15'],
           'icon' => ['max:50'],
       ]);

       $thematic = Thematic::create([
           'description' => $request->description,
           'icon' => $request->icon,
       ]);

       return redirect()->route('thematiques');
   }

   public function edit(Request $request, $id) {
        $request->validate([
            'description' => ['max:50'],
            'icon' => ['max:50'],
        ]);

       $thematic = Thematic::findOrFail($id);

       $thematic->icon = $request->icon;
       $thematic->description = $request->description;

       $thematic->save();

       return redirect()->route('thematiques');
   }
    public function getAllThematics(Request $request) {
        $thematics = Thematic::orderBy('id')->paginate(10)->fragment('board');
        if($request->ajax()) {
            echo view('layout.adminThematicBoardAndBlocPagination', compact('thematics'))->render();
        } else {
            return view('admin.seeThematic', ['thematics' => $thematics]);
        }
    }
    public function seeHomepage() {
        // $thematics = Thematic::all();
        $thematics = DB::table('thematics')
            ->join('services', 'thematics.id', '=', 'services.thematic_id')
            ->select('thematics.*', DB::raw('count(*) as nbrservice', ))
            ->groupBy('thematics.id')
            ->distinct()
            ->get();

        return view('homepage', ['thematics' => $thematics]);
    }
    public function seeServiceByThematic(Request $request, $id) {
        Service::where('thematic_id', $id)->firstOrFail();

        $serviceByThematic = Service::where('thematic_id', $id)->paginate(10)->fragment('board');

        if($request->ajax()) {
            echo view('layout.boardAndBlocPagination', compact('serviceByThematic'))->render();
        } else {
            return view('ServiceByStructureOrThematic', ['serviceByThematic' => $serviceByThematic]);
        }
    }
    public function searchService(Request $request) {
        $serviceByThematic = Service::where([
            ['thematic_id', '=', $request->structures],
            ['description', 'like', '%'.$request->search.'%'],
        ])->paginate(10)->fragment('board');
        echo view('layout.boardAndBlocPagination', compact('serviceByThematic'))->render();
    }

    public function seeAddForm() {
        return view('admin.addOrUpdateThematic');
    }

    public function seeEditForm($id) {
        $thematic = Thematic::findOrFail($id);
        return view('admin.addOrUpdateThematic', ['thematic' => $thematic]);
    }

    public function adminSearchThematic(Request $request) {
        $thematics = Thematic::where([
            ['description', 'like', '%'.$request->search.'%'],
        ])->paginate(10)->fragment('board');
        echo view('layout.adminThematicBoardAndBlocPagination', compact('thematics'))->render();
    }

}
