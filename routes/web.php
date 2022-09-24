<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ThematicController;
use App\Http\Controllers\StructureController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CategoryController;
use App\Models\Thematic;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\PasswordResetLinkController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/structuresparcategorie/{id}', [StructureController::class, 'getStructures']);


Route::middleware(['guest'])->group(function () {

Route::get('/requeteusager', function(){
        return view('requeteusager');
    });

Route::get('/', [ThematicController::class, 'seeHomepage'])->name('seeHomePage');
Route::get('/demandeparthematics/{id}', [ThematicController::class, 'seeServiceByThematic'])->name('seeServiceByThematic');;
Route::post('/rechercherparthematics', [ThematicController::class, 'searchService']);

Route::get('/demandeparstructures', [StructureController::class, 'seeServiceByStructure'])->name('seeServiceByStructure');
Route::post('/demandeparstructures', [StructureController::class, 'seeServiceByStructure']);
Route::post('/rechercherparstructures', [StructureController::class, 'searchService']);

Route::get('/avotreecoute', function () { 
    return view('contact');
})->name("contactUs");

Route::post('/contacteznous', [UserController::class, 'sendMail']);

Route::get('/admin', [AuthenticatedSessionController::class, 'create']);
Route::get('/admin/motdepasseoublie', [PasswordResetLinkController::class, 'create'])->name('forgetPassword');

Route::get('/demandes/{id}/', [ServiceController::class, 'seeMore']);


});

Route::middleware(['auth'])->group(function () {

    Route::get('/admin/accueil', function () {
        return view('admin.adminHomePage');
    })->name("adminHomePage");

    Route::get('/admin/moncompte', [UserController::class, 'seeMyAccount'])->name('seemyAccount');

    Route::get('/admin/prestations', [ServiceController::class, 'getAllService'])->name("prestations");
    Route::get('/admin/categories', [CategoryController::class, 'getAllCategories'])->name("categories");
    Route::get('/admin/structures', [StructureController::class, 'getAllStructures'])->name("structures");
    Route::get('/admin/thematiques', [ThematicController::class, 'getAllThematics'])->name("thematiques");
    Route::get('/admin/utilisateurs', [UserController::class, 'getAllUsers'])->name("utilisateurs");

    Route::get('/admin/formulairedajout/prestations', [ServiceController::class, 'seeAddForm'])->name('seeAddServiceForm');
    Route::get('/admin/formulairedajout/categories', [CategoryController::class, 'seeAddForm'])->name('seeAddCategoryForm');
    Route::get('/admin/formulairedajout/structures', [StructureController::class, 'seeAddForm'])->name('seeAddStructureForm');
    Route::get('/admin/formulairedajout/thematiques', [ThematicController::class, 'seeAddForm'])->name('seeAddThematicForm');
    Route::get('/admin/formulairedajout/utilisateurs', [UserController::class, 'seeAddForm'])->name('seeAddUserForm');

    Route::get('/admin/formulairedemodification/prestations/{id}', [ServiceController::class, 'seeEditForm'])->name('seeEditServiceForm');
    Route::get('/admin/formulairedemodification/categories/{id}', [CategoryController::class, 'seeEditForm'])->name('seeEditCategoryForm');
    Route::get('/admin/formulairedemodification/structures/{id}', [StructureController::class, 'seeEditForm'])->name('seeEditStructureForm');
    Route::get('/admin/formulairedemodification/thematiques/{id}', [ThematicController::class, 'seeEditForm'])->name('seeEditThematicForm');
    Route::get('/admin/formulairedemodification/utilisateurs/{id}', [UserController::class, 'seeEditForm'])->name('seeEditUserForm');


    Route::post('/admin/rechercherparprestations', [ServiceController::class, 'adminSearchService']);
    Route::post('/admin/rechercherparcategories', [CategoryController::class, 'adminSearchCategory']);
    Route::post('/admin/rechercherparstructures', [StructureController::class, 'adminSearchStructure']);
    Route::post('/admin/rechercherparthematiques', [ThematicController::class, 'adminSearchThematic']);
    Route::post('/admin/rechercherparutilisateurs', [UserController::class, 'adminSearchUser']);

    Route::get('/admin/suppression/prestations/{id}', [ServiceController::class, 'delete'])->name('deleteService');

    Route::post('/admin/prestations', [ServiceController::class, 'add']);
    Route::post('/admin/categories', [CategoryController::class, 'add']);
    Route::post('/admin/structures', [StructureController::class, 'add']);
    Route::post('/admin/thematiques', [ThematicController::class, 'add']);
    Route::post('/admin/utilisateurs', [UserController::class, 'add']);

    Route::post('/admin/prestations/{id}', [ServiceController::class, 'edit'])->name('editService');
    Route::post('/admin/categories/{id}', [CategoryController::class, 'edit'])->name('editCategory');
    Route::post('/admin/structures/{id}', [StructureController::class, 'edit'])->name('editStructure');
    Route::post('/admin/thematiques/{id}', [ThematicController::class, 'edit'])->name('editThematic');
    Route::post('/admin/utilisateurs/{id}', [UserController::class, 'edit'])->name('editUser');



});

require __DIR__.'/auth.php';


