    <?php

    use App\Http\Controllers\ProfileController;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\AdminController;
    use App\Http\Controllers\AgentController;
    use App\Http\Controllers\PresidentsController;
    use App\Http\Controllers\UserController;
    use App\Http\Controllers\AthletesController;
    use App\Http\Controllers\EpreuvesController;
    use App\Http\Controllers\CompetitionsController;
    use App\Http\Controllers\AthcompsController;

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider and all of them will
    | be assigned to the "web" middleware group. Make something great!
    |
    */

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    require __DIR__.'/auth.php';

        //groupe admin middleware
    Route::middleware(['auth','role:admin'])->group(function(){

        Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');    
        Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout'); 
        Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
        Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');  
        Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
        Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');
        Route::get('/admin/indexL', [AdminController::class, 'indexL'])->name('admin.indexL');
        Route::get('/admin/indexDemA', [AdminController::class, 'indexDemA'])->name('admin.indexDemA');
        Route::get('/admin/Accept_athletes/{id}', [AdminController::class, 'Accept_athletes']);
        Route::get('/admin/Reject_athletes/{id}', [AdminController::class, 'Reject_athletes']);
        Route::get('/admin/athcompsDemd', [AdminController::class, 'athcompsDemd'])->name('admin.athcompsDemd');
        Route::get('/admin/Accept_athcomps/{id}', [AdminController::class, 'Accept_athcomps']);
        Route::get('/admin/Reject_athcomps/{id}', [AdminController::class, 'Reject_athcomps']);
        Route::get('/admin/athcompsAthl', [AdminController::class, 'athcompsAthl'])->name('admin.athcompsAthl');
       

    
    }); // end groupe admin middleware



    // groupe agent middleware
    Route::middleware(['auth','role:agent'])->group(function(){

        Route::get('/agent/dashboard', [AgentController::class, 'AgentDashboard'])->name('agent.dashboard');
        Route::get('/agent/logout', [AgentController::class, 'AgentLogout'])->name('agent.logout'); 
        Route::get('/agent/profile', [AgentController::class, 'AgentProfile'])->name('agent.profile');
        Route::post('/agent/profile/store', [AgentController::class, 'AgentProfileStore'])->name('agent.profile.store');  
        Route::get('/agent/change/password', [AgentController::class, 'AgentChangePassword'])->name('agent.change.password');
        Route::post('/agent/update/password', [AgentController::class, 'AgentUpdatePassword'])->name('agent.update.password'); 
        
        

        Route::prefix('/agent/athletes')->group(function(){
            Route::get('/', [AthletesController::class, 'index'])->name('agent.athletes.index');
            Route::get('/indexAcceptATH', [AthletesController::class, 'indexAcceptATH'])->name('agent.athletes.indexAcceptATH');
            Route::get('/indexAttenteATH', [AthletesController::class, 'indexAttenteATH'])->name('agent.athletes.indexAttenteATH');
            Route::get('/indexRejectATH', [AthletesController::class, 'indexRejectATH'])->name('agent.athletes.indexRejectATH');
            Route::get('/create', [AthletesController::class, 'create'])->name('agent.athletes.create');
            Route::post('/', [AthletesController::class, 'store'])->name('agent.athletes.store');
            Route::get('/{athlete}', [AthletesController::class, 'edit'])->name('agent.athletes.edit');
            Route::put('/{id}', [AthletesController::class, 'update'])->name('agent.athletes.update');
            Route::delete('/{athlete}', [AthletesController::class, 'destroy'])->name('agent.athletes.destroy');
            // Route::get('/', [AthletesController::class, 'show'])->name('athletes.show');
        });
            
        


    }); // end groupe agent middleware







    
    Route::prefix('presidents')->group(function(){
        Route::get('/', [PresidentsController::class, 'index'])->name('presidents.index');
        Route::get('/create', [PresidentsController::class, 'create'])->name('presidents.create');
        Route::post('/', [PresidentsController::class, 'store'])->name('presidents.store');
        Route::get('/{presidents}', [PresidentsController::class, 'edit'])->name('presidents.edit');
        Route::put('/{id}', [PresidentsController::class, 'update'])->name('presidents.update');
        Route::delete('/{presidents}', [PresidentsController::class, 'destroy'])->name('presidents.destroy');
    });


    Route::prefix('epreuves')->group(function(){
        Route::get('/', [EpreuvesController::class, 'index'])->name('epreuves.index');
        Route::get('/create', [EpreuvesController::class, 'create'])->name('epreuves.create');
        Route::post('/', [EpreuvesController::class, 'store'])->name('epreuves.store');
        Route::get('/{epreuves}', [EpreuvesController::class, 'edit'])->name('epreuves.edit');
        Route::put('/{id}', [EpreuvesController::class, 'update'])->name('epreuves.update');
        Route::delete('/{epreuves}', [EpreuvesController::class, 'destroy'])->name('epreuves.destroy');
    });




        Route::prefix('clubs')->group(function(){
            Route::get('/', [UserController::class, 'index'])->name('clubs.index');
            Route::get('/indexA', [UserController::class, 'indexA'])->name('clubs.indexA');
            Route::get('/create', [UserController::class, 'create'])->name('clubs.create');
            Route::post('/', [UserController::class, 'store'])->name('clubs.store'); 
            Route::get('/{user}/edit', [UserController::class, 'edit'])->name('clubs.edit');
            Route::put('/{user}', [UserController::class, 'update'])->name('clubs.update');
            Route::delete('/{user}', [UserController::class, 'destroy'])->name('clubs.destroy'); 
            Route::delete('/{user}/destroyA', [UserController::class, 'destroyA'])->name('clubs.destroyA'); 
        });
        

        Route::prefix('competitions')->group(function(){
            Route::get('/competitions', [CompetitionsController::class, 'index'])->name('competitions.index');
            Route::get('/', [CompetitionsController::class, 'indexLcomp'])->name('competitions.indexLcomp');
            Route::get('/create', [CompetitionsController::class, 'create'])->name('competitions.create');
            Route::post('/store', [CompetitionsController::class, 'store'])->name('competitions.store');
            Route::get('/{competitions}', [CompetitionsController::class, 'edit'])->name('competitions.edit');
            Route::put('/{id}', [CompetitionsController::class, 'update'])->name('competitions.update');
            Route::delete('/{competitions}', [CompetitionsController::class, 'destroy'])->name('competitions.destroy');
            
        });



        Route::prefix('athcomps')->group(function(){
            // Route::get('/competitions', [CompetitionsController::class, 'index'])->name('competitions.index');
            // Route::get('/', [CompetitionsController::class, 'indexLcomp'])->name('competitions.indexLcomp');
            Route::get('/inscricomp', [AthcompsController::class, 'inscricomp'])->name('athcomps.inscricomp');
            Route::post('/store', [AthcompsController::class, 'store'])->name('athcomps.store');
            Route::get('/athcompsAtt', [AthcompsController::class, 'athcompsAtt'])->name('athcomps.athcompsAtt');
            Route::get('/athcompsAcc', [AthcompsController::class, 'athcompsAcc'])->name('athcomps.athcompsAcc');
            Route::get('/athcompsRef', [AthcompsController::class, 'athcompsRef'])->name('athcomps.athcompsRef');
            
            // Route::get('/{competitions}', [AthcompsController::class, 'edit'])->name('athcomps.edit');
            // Route::put('/{id}', [AthcompsController::class, 'update'])->name('athcomps.update');
            // Route::delete('/{competitions}', [AthcompsController::class, 'destroy'])->name('athcomps.destroy');
            // Route::get('/athcomps/Accept_athcomps/{id}', [AthcompsController::class, 'Accept_athcomps']);
            // Route::get('/athcomps/Reject_athcomps/{id}', [AthcompsController::class, 'Reject_athcomps']);
            

            
        });
       
        




























        // Route::prefix('/athletes')->group(function(){
        //     Route::get('/', [AthletesController::class, 'index'])->name('athletes.index');
        //     Route::get('/create', [AthletesController::class, 'create'])->name('athletes.create');
        //     Route::post('/', [AthletesController::class, 'store'])->name('athletes.store');
        //     Route::get('/{athlete}', [AthletesController::class, 'edit'])->name('athletes.edit');
        //     Route::put('/{id}', [AthletesController::class, 'update'])->name('athletes.update');
        //     Route::delete('/{athlete}', [AthletesController::class, 'destroy'])->name('athletes.destroy');
        //     // Route::get('/', [AthletesController::class, 'show'])->name('athletes.show');
        // });







            // Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login'); 
            // Route::get('/agent/login', [AgentController::class, 'AgentLogin'])->name('agent.login'); 
        // Route::prefix('athletes')->group(function(){
        //     Route::get('/athletes', [AthletesController::class, 'index'])->name('athletes.index');
        //     Route::get('/athletes', [AthletesController::class, 'indexL'])->name('athletes.indexL');
        //     Route::get('/create', [AthletesController::class, 'create'])->name('athletes.create');
        //     Route::post('/', [AthletesController::class, 'store'])->name('athletes.store');
        //     Route::get('/{athletes}', [AthletesController::class, 'edit'])->name('athletes.edit');
        //     Route::put('/{id}', [AthletesController::class, 'update'])->name('athletes.update');
        //     Route::delete('/{athletes}', [AthletesController::class, 'destroy'])->name('athletes.destroy');
        //     // Route::get('/', [AthletesController::class, 'show'])->name('athletes.show');
        
        // });