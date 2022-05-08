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
    public function index(int $year = 2022)
    {
        //SELECT DISTINCT YEAR(created_at) AS YEAR FROM `bills` WHERE `Status` = 1;
        //SELECT SUM(TotalPrice) AS total FROM `bills` WHERE MONTH(created_at) = 5 AND YEAR(created_at) = 2022; ;
        $years = DB::select('select DISTINCT YEAR(created_at) AS YEAR FROM `bills` WHERE `Status` = 1');
        $revenuemonth1 = DB::select('select SUM(TotalPrice) AS total FROM `bills` WHERE MONTH(created_at) = 1 AND YEAR(created_at) = ?', [$year]);
        $m1 = (int)($revenuemonth1[0]->total);
        $revenuemonth2 = DB::select('select SUM(TotalPrice) AS total FROM `bills` WHERE MONTH(created_at) = 2 AND YEAR(created_at) = ?', [$year]);
        $m2 = (int)($revenuemonth2[0]->total);
        $revenuemonth3 = DB::select('select SUM(TotalPrice) AS total FROM `bills` WHERE MONTH(created_at) = 3 AND YEAR(created_at) = ?', [$year]);
        $m3 = (int)($revenuemonth3[0]->total);
        $revenuemonth4 = DB::select('select SUM(TotalPrice) AS total FROM `bills` WHERE MONTH(created_at) = 4 AND YEAR(created_at) = ?', [$year]);
        $m4 = (int)($revenuemonth4[0]->total);
        $revenuemonth5 = DB::select('select SUM(TotalPrice) AS total FROM `bills` WHERE MONTH(created_at) = 5 AND YEAR(created_at) = ?', [$year]);
        $m5 = (int)($revenuemonth5[0]->total);
        $revenuemonth6 = DB::select('select SUM(TotalPrice) AS total FROM `bills` WHERE MONTH(created_at) = 6 AND YEAR(created_at) = ?', [$year]);
        $m6 = (int)($revenuemonth6[0]->total);
        $revenuemonth7 = DB::select('select SUM(TotalPrice) AS total FROM `bills` WHERE MONTH(created_at) = 7 AND YEAR(created_at) = ?', [$year]);
        $m7 = (int)($revenuemonth7[0]->total);
        $revenuemonth8 = DB::select('select SUM(TotalPrice) AS total FROM `bills` WHERE MONTH(created_at) = 8 AND YEAR(created_at) = ?', [$year]);
        $m8 = (int)($revenuemonth8[0]->total);
        $revenuemonth9 = DB::select('select SUM(TotalPrice) AS total FROM `bills` WHERE MONTH(created_at) = 9 AND YEAR(created_at) = ?', [$year]);
        $m9 = (int)($revenuemonth9[0]->total);
        $revenuemonth10 = DB::select('select SUM(TotalPrice) AS total FROM `bills` WHERE MONTH(created_at) = 10 AND YEAR(created_at) = ?', [$year]);
        $m10 = (int)($revenuemonth10[0]->total);
        $revenuemonth11 = DB::select('select SUM(TotalPrice) AS total FROM `bills` WHERE MONTH(created_at) = 11 AND YEAR(created_at) = ?', [$year]);
        $m11 = (int)($revenuemonth11[0]->total);
        $revenuemonth12 = DB::select('select SUM(TotalPrice) AS total FROM `bills` WHERE MONTH(created_at) = 12 AND YEAR(created_at) = ?', [$year]);
        $m12 = (int)($revenuemonth12[0]->total);
        return view('admin.revenue.index', compact('years', 'm1', 'm2', 'm3', 'm4', 'm5', 'm6', 'm7', 'm8', 'm9', 'm10', 'm11', 'm12', 'year'));
    }

    // public function invoice(Table $table, Bill $bill){
    //     $BillInfos = DB::select('select * from bill__infos where idBill = :idbill', [$bill->id]);

    //     $total = 0;

    //     if ($BillInfos != NULL){
    //         foreach($BillInfos as $Billinfo) {
    //             $total += ($Billinfo->count * $Billinfo->price);
    //         }
    //     }
    //     return view('admin.invoices.invoice', compact('table', 'bill', 'BillInfos', 'total'));
    // }

    // public function pdf(Table $table, Bill $bill){
    //     $BillInfos = DB::select('select * from bill__infos where idBill = :idbill', [$bill->id]);

    //     $total = 0;

    //     if ($BillInfos != NULL){
    //         foreach($BillInfos as $Billinfo) {
    //             $total += ($Billinfo->count * $Billinfo->price);
    //             $Billinfo->foodName = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $Billinfo->foodName);
    //             $Billinfo->foodName = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $Billinfo->foodName);
    //             $Billinfo->foodName = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $Billinfo->foodName);
    //             $Billinfo->foodName = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $Billinfo->foodName);
    //             $Billinfo->foodName = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $Billinfo->foodName);
    //             $Billinfo->foodName = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $Billinfo->foodName);
    //             $Billinfo->foodName = preg_replace("/(đ)/", 'd', $Billinfo->foodName);
    //             $Billinfo->foodName = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $Billinfo->foodName);
    //             $Billinfo->foodName = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $Billinfo->foodName);
    //             $Billinfo->foodName = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $Billinfo->foodName);
    //             $Billinfo->foodName = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $Billinfo->foodName);
    //             $Billinfo->foodName = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $Billinfo->foodName);
    //             $Billinfo->foodName = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $Billinfo->foodName);
    //             $Billinfo->foodName = preg_replace("/(Đ)/", 'D', $Billinfo->foodName);
    //         }
    //     }

    //     $pdf = PDF::loadView('admin.invoices.pdf', compact('table', 'bill', 'BillInfos', 'total'));
    //     return $pdf->stream();
    // }

    // public function pay(string $billid){
    //     $update = DB::update('update bills set status = 1 where id = ?', [$billid]);
    //     return to_route('admin.tables.bill')->with('success', 'Thanh toán thành công.');
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(MenuStoreRequest $request)
    // {
    //     //
    // }


    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit(Menu $menu)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, Menu $menu)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy(Menu $menu)
    // {
    //     //
    // }
}
