<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuStoreRequest;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Table;
use App\Models\Bill;
use App\Models\Bill_Info;
use App\Services\PayUService\Exception;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;


class RevenueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(int $year = 2022, int $month)
    {

        $years = DB::select('select DISTINCT YEAR(created_at) AS YEAR FROM `bills` WHERE `Status` = 1');

        //Load doanh thu theo thang
        $m = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12);
        for ($i = 1; $i <= 12; $i++){
            $revenuemonth = DB::select('select SUM(TotalPrice) AS total FROM `bills` WHERE MONTH(created_at) = ? AND YEAR(created_at) = ?', [$i, $year]);
            $m[$i] = (int)($revenuemonth[0]->total);
        }
       

        //Load doanh thu theo ngay
        $d = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31);
        if ($month != 0){
            if($month == 1 || $month == 3 || $month == 5 || $month == 7 || $month == 8 || $month == 10 || $month == 12){
                for ($i = 1; $i <=31; $i++){
                    $revenueday = DB::select('select SUM(TotalPrice) AS total FROM `bills` WHERE DAY(created_at) = ? AND MONTH(created_at) = ? AND YEAR(created_at) = ?', [$i, $month, $year]);
                    $d[$i] = (int)($revenueday[0]->total);
                }
            }
            else if ($month != 2){
                for ($i = 1; $i <= 30; $i++){
                    $revenueday = DB::select('select SUM(TotalPrice) AS total FROM `bills` WHERE DAY(created_at) = ? AND MONTH(created_at) = ? AND YEAR(created_at) = ?', [$i, $month, $year]);
                    $d[$i] = (int)($revenueday[0]->total);
                }
            }
            else {
                if ((($year % 4 == 0) && ($year % 100 != 0)) || ($year % 400 == 0)){
                    for ($i = 1; $i <= 29; $i++){
                        $revenueday = DB::select('select SUM(TotalPrice) AS total FROM `bills` WHERE DAY(created_at) = ? AND MONTH(created_at) = ? AND YEAR(created_at) = ?', [$i, $month, $year]);
                        $d[$i] = (int)($revenueday[0]->total);
                    }
                }
                else{
                    for ($i = 1; $i <= 28; $i++){
                        $revenueday = DB::select('select SUM(TotalPrice) AS total FROM `bills` WHERE DAY(created_at) = ? AND MONTH(created_at) = ? AND YEAR(created_at) = ?', [$i, $month, $year]);
                        $d[$i] = (int)($revenueday[0]->total);
                    }
                }
            }
        }
        
        return view('admin.revenue.index', compact('years', 'm', 'year', 'month', 'd'));
    }
}
