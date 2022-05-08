<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Bill;
use App\Http\Requests\CommentStoreRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('comment.index');
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
    public function store(CommentStoreRequest $request)
    {
        $check = false;
        $cmtcodes = DB::select('Select * from bills');
        $bill = NULL;
        foreach ($cmtcodes as $cmtcode) {
            if ($request->cmtcode == $cmtcode->CommentCode && $cmtcode->CommentStatus == 0) {
                $check = true;
                $bill = $cmtcode;
                break;
            }
        }

        if ($check) {
            $cmt = Comment::create([
                'bill_id' => $bill->id,
                'customer_name'=> $request->name,
                'rating_star' => $request->star,
                'comment' => $request->cmt
            ]);

            $update = DB::update('update bills set CommentStatus = 1 where id = ?', [$bill->id]);

            return to_route('comments.index')->with('success', 'Gửi bình luận thành công');
        }
        else {
            return to_route('comments.index')->with('danger', 'Mã bình luận đã dùng hoặc không tồn tại');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
