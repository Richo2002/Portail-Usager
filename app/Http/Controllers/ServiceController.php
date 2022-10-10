<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Structure;
use App\Models\Thematic;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Nette\Utils\Random;

class ServiceController extends Controller
{

    public function add(Request $request) {
        $request->validate([
            'description' => ['max:255'],
            'date' => ['max:255'],
            'cost' => ['max:255'],
        ]);

        DB::table('services')->insert([
            'description' => $request->description,
            'fileToProvide' => nl2br($request->fileToProvide),
            'cost' => $request->cost,
            'timeLimit' => $request->date,
            'text' => $request->text,
            'observation' => $request->observation,
            'structure_id' => Auth::user()->structure_id,
            'thematic_id' => intval($request->thematic),
            'user_id' => Auth::user()->id,
        ]);
        
        return redirect()->route('prestations');
    }

    public function edit(Request $request, $id) {
        $request->validate([
            'description' => ['max:255'],
            'date' => ['max:255'],
            'cost' => ['max:255'],
        ]);

        DB::table('services')
            ->where('id', $id)
            ->update([
                'description' => $request->description,
                'fileToProvide' => nl2br($request->fileToProvide),
                'cost' => $request->cost,
                'timeLimit' => $request->date,
                'text' => $request->text,
                'observation' => $request->observation,
                'structure_id' => Auth::user()->structure_id,
                'thematic_id' => intval($request->thematic),
                'user_id' => Auth::user()->id,
        ]);
        
        return redirect()->route('prestations');
    }
    public function seeMore($id){
        $service = Service::findOrFail($id);
        return view('seeMoreAboutService', ['service' => $service]);
    }

    public function getAllService(Request $request) {
        if(Str::upper(Auth::user()->role) == "USER") {
            $services = Service::where('user_id', Auth::user()->id)->orderBy('id')->paginate(10)->fragment('board');
        }else {
            $services = Service::orderBy('id')->paginate(10)->fragment('board');
        }
        if($request->ajax()) {
            echo view('layout.adminServiceBoardAndBlocPagination', compact('services'))->render();
        }
        else {
            return view('admin.seeService', ['services' => $services]);
        }
    }

    public function seeAddForm() {
        $thematics = Thematic::all();
        return view('admin.addOrUpdateService', ['thematics' => $thematics]);
    }

    public function seeEditForm($id) {
        $service = Service::findOrFail($id);
        $thematics = Thematic::all();
        return view('admin.addOrUpdateService', ['service' => $service, 'thematics' => $thematics]);
    }

    public function adminSearchService(Request $request) {
        if(Str::upper(Auth::user()->role) == "USER") {
            $services = Service::where([
                ['user_id', '=', Auth::user()->id],
                ['description', 'like', '%'.$request->search.'%'],
                ])->orderBy('id')->paginate(10)->fragment('board');
        }else {
            $services = Service::where([
                ['description', 'like', '%'.$request->search.'%'],
            ])->paginate(10)->fragment('board');
        }
        echo view('layout.adminServiceBoardAndBlocPagination', compact('services'))->render();
    }

    Public function delete($id) {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('prestations');
    }
}