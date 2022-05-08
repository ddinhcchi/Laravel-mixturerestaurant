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
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all();
        return view('admin.menus.index', compact('menus'));
    }

    public function menuBill(Table $table){
        $menus = Menu::all();

        $total = 0;

        $BillExist = DB::select('select * from bills where IdTable = ? and Status = ?', [$table->id, 0]);

        for ($s = '', $i = 0, $z = strlen($a = 'abcdefghijklmnopqrstuvwxyz0123456789')-1; $i != 6; $x = rand(0,$z), $s .= $a[$x], $i++);

        if ($BillExist == NULL) {
            $bill = Bill::create([
                'IdTable' => $table->id,
                'CommentCode' => $s
            ]);

            $BillExist = DB::select('select * from bills where ID=(Select max(ID) from bills)');

            $BillInfos = NULL;
            
            return view('admin.menus.menu_bill', compact('menus', 'table', 'BillExist', 'BillInfos', 'total'));
        }
        else {
            $BillInfos = DB::select('select * from bill__infos where idBill = :idbill', [$BillExist[0]->id]);

            if ($BillInfos != NULL){
                foreach($BillInfos as $Billinfo) {
                    $total += ($Billinfo->count * $Billinfo->price);
                }
            }

            return view('admin.menus.menu_bill', compact('menus', 'table', 'BillExist', 'BillInfos', 'total'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.menus.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenuStoreRequest $request)
    {
        $image = $request->file('image')->store('public/menus');

        $menu = Menu::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image,
            'price' => $request->price
        ]);

        if ($request->has('categories')) {
            $menu->categories()->attach($request->categories);
        }

        return to_route('admin.menus.index')->with('success', 'Đã thêm món ăn thành công.');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        $categories = Category::all();
        return view('admin.menus.edit', compact('menu', 'categories'));
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
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);

        $image = $menu->image;
        if ($request->hasFile('image')) {
            Storage::delete($menu->image);
            $image = $request->file('image')->store('public/menus');
        }

        $menu->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image,
            'price' => $request->price
        ]);

        if ($request->has('categories')) {
            $menu->categories()->sync($request->categories);
        }
        return to_route('admin.menus.index')->with('success', 'Cập nhật món ăn thành công.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        Storage::delete($menu->image);
        $menu->categories()->detach();
        $menu->delete();
        return to_route('admin.menus.index')->with('danger', 'Xóa món ăn thành công.');
    }
}
