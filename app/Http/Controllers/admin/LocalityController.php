<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLocalityUpdateRequest;
use App\Models\Locality;
use App\Repositories\LocalityRepository;
use App\Repositories\RegionRepository;
use Illuminate\Http\Request;

class LocalityController extends Controller
{
    private $localityRepository;
    private $regionRepository;
    public function __construct()
    {
        $this->localityRepository = app(LocalityRepository::class);
        $this->regionRepository     =   app(RegionRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($region_id)
    {
        $region=$this->regionRepository->getRegionById($region_id);
        if(empty($region)){
            abort(404);
        }
        $localities=$this->localityRepository->getLocalitiesByRegion('all', $region_id);
        return view('admin.citys.all', compact('localities', 'region'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($region_id)
    {
        $region=$this->regionRepository->getRegionById($region_id);
        if(empty($region)){
            abort(404);
        }
        return view('admin.citys.create', compact('region'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminLocalityUpdateRequest $request, $region_id)
    {
        $data=$request->all();
        $item=Locality::create($data);
        if($item)
        {
            return redirect()
                ->route('admin.localities.edit', [$region_id, $item->id])
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
    public function edit($region_id,$city_id)
    {
        $region=$this->regionRepository->getRegionById($region_id);
        if(empty($region)) {
            abort(404);
        }
        $locality=$this->localityRepository->getLocalityById($city_id);
        if(empty($locality)) {
            abort(404);
        }
        return view('admin.citys.edit', compact('region', 'locality'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminLocalityUpdateRequest $request, $region_id, $locality_id)
    {
        $item=$this->localityRepository->getLocalityById($locality_id);
        if(empty($item))
        {
            return back()
                ->withErrors(['msg'=>"Запись id=$locality_id  не найдена"])
                ->withInput();//вернуть с веденными данными - нужна в виде функция old()
        }
        $data=$request->all();
        $result=$item->update($data);
        if($result)
        {
            return redirect()
                ->route('admin.localities.edit',[$region_id, $locality_id])
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
