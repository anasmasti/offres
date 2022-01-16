<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offre;
use App\Models\Employee;
use App\Models\Postule;
Use DB;
use Carbon\Carbon;
use App\Models\User;
class MainController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $offres = Offre::all();

        $countOffres = Offre::all()->count();
        $countEmployees = User::all()->count();
        $countPostule = Postule::all()->count();

        $employeesByDate = User::select(\DB::raw("COUNT(*) as count"), \DB::raw("DAYNAME(created_at) as day_name"), \DB::raw("DAY(created_at) as day"))
            ->where('created_at', '>', Carbon::today()->subDay(6))
            ->groupBy('day_name','day')
            ->orderBy('day')
            ->get();

        $offresByDate = Offre::select(\DB::raw("COUNT(*) as count"), \DB::raw("DAYNAME(created_at) as day_name"), \DB::raw("DAY(created_at) as day"))
        ->where('created_at', '>', Carbon::today()->subDay(6))
        ->groupBy('day_name','day')
        ->orderBy('day')
        ->get();
        
        $postuleByDate = Postule::select(\DB::raw("COUNT(*) as count"), \DB::raw("DAYNAME(created_at) as day_name"), \DB::raw("DAY(created_at) as day"))
        ->where('created_at', '>', Carbon::today()->subDay(6))
        ->groupBy('day_name','day')
        ->orderBy('day')
        ->get(); 
        
        $employeesChart = [];
        $offresChart = [];
        $postuleChart = [];
    
        foreach($employeesByDate as $emp) {
            $employeesChart['label'][] = $emp->day_name;
            $employeesChart['data'][] = (int) $emp->count;
        }
        foreach($offresByDate as $offr) {
            $offresChart['label'][] = $offr->day_name;
            $offresChart['data'][] = (int) $offr->count;
        }
        foreach($postuleByDate as $pstl) {
            $postuleChart['label'][] = $pstl->day_name;
            $postuleChart['data'][] = (int) $pstl->count;
        }
    
        $employeesChart = json_encode($employeesChart);
        $offresChart = json_encode($offresChart);
        $postuleChart = json_encode($postuleChart);

        return view('welcome', [
            'offres'=>$offres,
            'countOffres'=>$countOffres,
            'countEmployees'=>$countEmployees,
            'countPostule'=>$countPostule,
            'employeesChart'=>$employeesChart,
            'offresChart'=>$offresChart,
            'postuleChart'=>$postuleChart
        ]);
    }
}