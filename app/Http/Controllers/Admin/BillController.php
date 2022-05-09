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


class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function invoice(Table $table, Bill $bill){
        $BillInfos = DB::select('select * from bill__infos where idBill = :idbill', [$bill->id]);

        $total = 0;

        if ($BillInfos != NULL){
            foreach($BillInfos as $Billinfo) {
                $total += ($Billinfo->count * $Billinfo->price);
            }
        }
        return view('admin.invoices.invoice', compact('table', 'bill', 'BillInfos', 'total'));
    }

    public function pdf(Table $table, Bill $bill){
        $BillInfos = DB::select('select * from bill__infos where idBill = :idbill', [$bill->id]);

        $total = 0;

        if ($BillInfos != NULL){
            foreach($BillInfos as $Billinfo) {
                $total += ($Billinfo->count * $Billinfo->price);
                $Billinfo->foodName = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $Billinfo->foodName);
                $Billinfo->foodName = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $Billinfo->foodName);
                $Billinfo->foodName = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $Billinfo->foodName);
                $Billinfo->foodName = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $Billinfo->foodName);
                $Billinfo->foodName = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $Billinfo->foodName);
                $Billinfo->foodName = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $Billinfo->foodName);
                $Billinfo->foodName = preg_replace("/(đ)/", 'd', $Billinfo->foodName);
                $Billinfo->foodName = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $Billinfo->foodName);
                $Billinfo->foodName = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $Billinfo->foodName);
                $Billinfo->foodName = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $Billinfo->foodName);
                $Billinfo->foodName = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $Billinfo->foodName);
                $Billinfo->foodName = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $Billinfo->foodName);
                $Billinfo->foodName = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $Billinfo->foodName);
                $Billinfo->foodName = preg_replace("/(Đ)/", 'D', $Billinfo->foodName);
            }
        }

        $pdf = PDF::loadView('admin.invoices.pdf', compact('table', 'bill', 'BillInfos', 'total'));
        return $pdf->stream();
    }

    public function pay(string $billid){
        $BillInfos = DB::select('select * from `bill__infos` where `idBill` = ?', [$billid]);

        $total = 0;

        if ($BillInfos != NULL){
            foreach($BillInfos as $Billinfo) {
                $total += ($Billinfo->count * $Billinfo->price);
            }
        }
        $update = DB::update('update `bills` set `TotalPrice` = ? where `id` = ?', [$total, $billid]);
        $update = DB::update('update `bills` set `status` = 1 where `id` = ?', [$billid]);
        return to_route('admin.tables.bill')->with('success', 'Thanh toán thành công.');
    }

    public function show(int $year, int $month, int $day){
        $years = DB::select('select DISTINCT YEAR(created_at) AS YEAR FROM `bills` WHERE `Status` = 1');
        $months = DB::select('select DISTINCT MONTH(created_at) AS MONTH FROM `bills` WHERE `Status` = 1 AND YEAR(created_at) = ?', [$year]);
        $days = NULL;

        if($day == 0){
            if($month == 0){
                $bills = DB::select('select * from `bills` where YEAR(created_at) = ?', [$year]);
            }
            else {
                $bills = DB::select('select * from `bills` where YEAR(created_at) = ? AND MONTH(created_at) = ?', [$year, $month]);
                $days = DB::select('select DISTINCT DAY(created_at) AS DAY FROM `bills` WHERE `Status` = 1 AND YEAR(created_at) = ? AND MONTH(created_at) = ?', [$year, $month]);
            }
        }
        else {
            $bills = DB::select('select * from `bills` where YEAR(created_at) = ? AND MONTH(created_at) = ? AND DAY(created_at) = ?', [$year, $month, $day]);
            $days = DB::select('select DISTINCT DAY(created_at) AS DAY FROM `bills` WHERE `Status` = 1 AND YEAR(created_at) = ? AND MONTH(created_at) = ?', [$year, $month]);
        }

        return view('admin.invoices.showbills', compact('years', 'months', 'days', 'bills', 'year', 'month', 'day'));
    }

    public function showdetail(Bill $bill, int $year, int $month, int $day){
        $BillInfos = DB::select('select * from `bill__infos` where `idBill` = ?', [$bill->id]);

        $table = DB::select('select * from `tables` where `id` = ?', [$bill->IdTable]);

        return view('admin.invoices.showbilldetail', compact('bill', 'year', 'month', 'day', 'BillInfos', 'table'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenuStoreRequest $request)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        //
    }
}
