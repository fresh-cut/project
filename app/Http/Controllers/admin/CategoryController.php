<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminCategoryUpdateRequest;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categoryRepository;
    public function __construct()
    {
        $this->categoryRepository = app(CategoryRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=$this->categoryRepository->getCategories('all');
        return view('admin.categories.all', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminCategoryUpdateRequest $request)
    {
        $data=$request->all();
        $item=Category::create($data);
        if($item)
        {
            return redirect()
                ->route('admin.categories.edit', $item->id)
                ->with(['success'=>'Успешно сохранено']);
        }
        else{
            return back()
                ->withErrors(['msg'=>'Ошибка сохранения'])
                ->withInput();
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
        $category=$this->categoryRepository->getCategoryById($id);
        if(empty($category)) {
            abort(404);
        }
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminCategoryUpdateRequest $request, $id)
    {
        $item=$this->categoryRepository->getCategoryById($id);
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
                ->route('admin.categories.edit',$id)
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
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
