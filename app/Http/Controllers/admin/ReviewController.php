<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminReviewUpdateRequest;
use App\Models\Review;
use App\Repositories\ReviewRepository;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    private $reviewRepository;
    public function __construct()
    {
        $this->reviewRepository = app(ReviewRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews=$this->reviewRepository->getReviewsWithPaginate(15);
        return view('admin.reviews.all', compact('reviews'));
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
    public function store(Request $request)
    {
        //
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
        $review=$this->reviewRepository->getReviewById($id);
//        dd($review);
        if(empty($review)) {
            abort(404);
        }
        return view('admin.reviews.edit', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminReviewUpdateRequest $request, $id)
    {
        $item=Review::find($id);
        if(empty($item))
        {
            return back()
                ->withErrors(['msg'=>"Запись id=$id  не найдена"])
                ->withInput();//вернуть с веденными данными - нужна в виде функция old()
        }
        $data=$request->all();
        $result=$item->update($data);
        if($result)
        {
            return redirect()
                ->route('admin.reviews.edit',$id)
                ->with(['success'=>'Успешно сохранено']);
        }
        else{
            return back()
                ->withErrors(['msg'=>'Ошибка сохранения'])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, $id)
    {
        if(!$request->has('delete'))
        {
            return back()->withErrors(['msg'=>'Ошибка удаления']);
        }
        $count=0;
        foreach($request->delete as $id)
        {
            if($item=Review::find($id))
            {
                $item->delete();
                $count++;
            }
            else
                return back()->withErrors(['msg'=>'Ошибка удаления']);
        }
        return redirect()
            ->route('admin.reviews.index')
            ->with(['success'=>'Успешно удалено '.$count.' записей']);
    }
}
