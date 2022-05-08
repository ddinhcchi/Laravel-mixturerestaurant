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

class BillInfoController extends Controller
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

    public function show() 
    {
        //
    }

    public function check(Table $table, Bill $bill, Menu $menu){
        $query = "select * from bill__infos where idBill = " .$bill->id. " and foodName = N'" . $menu->name . "'";
        // $bif = DB::select('select * from bill__infos where idBill = ? and foodName = ?', [$bill->id, $menu->name]);
        $bif = DB::select($query);
        if ($bif != NULL) {
            $affected = DB::update('update bill__infos set count = count + 1 where id = ?', [$bif[0]->id]);
        }
        else {
            $bifnew = Bill_Info::create([
                'idBill' => $bill->id,
                'foodName' => $menu->name,
                'count' => 1,
                'price' => $menu->price
            ]);
        }

        return to_route('admin.menu.bill', $table->id);
    }

    public function delete(Table $table, string $bifid){
        $delete = DB::delete('delete from bill__infos where id = ?', [$bifid]);
        return to_route('admin.menu.bill', $table->id);
    }

    public function add(Table $table, string $bifid){
        $affected = DB::update('update bill__infos set count = count + 1 where id = ?', [$bifid]);
        return to_route('admin.menu.bill', $table->id);
    }

    public function sub(Table $table, string $bifid){
        $bi = DB::select('select * from bill__infos where id = ?', [$bifid]);
        if ($bi[0]->count == 1){
            $delete = DB::delete('delete from bill__infos where id = ?', [$bifid]);
        }
        else{
            $affected = DB::update('update bill__infos set count = count - 1 where id = ?', [$bifid]);
        }
        return to_route('admin.menu.bill', $table->id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
