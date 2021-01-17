<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Company;
use App\Models\Locality;
use App\Models\Region;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AddBaseController extends Controller
{

    public function addBase()
    {
        dd('идут работы');
        error_reporting(0);
        set_time_limit(0);
        ini_set('memory_limit', '100M');
        DB::connection()->disableQueryLog();
        $files = scandir(public_path('addbase'));
        $csv=[];
        foreach ($files as $file) {
            if (strstr($file, '.csv')) {
                $csv[] = $file;
            }
        }
        foreach ($csv as $target) {
            echo $target . '<br>';
//            $this->upload_base($target);
            $this->csv_to_array( public_path('addBase/'.$target), ';');
            echo $this->convert(memory_get_usage(true)) . '<br><br>';
            flush();
        }
    }


    public function upload_base($field)
    {
//        dd($fields);
        $success=0;
        $error=0;
            if(empty($field['website']))
                $field['website']='Not available';
            if(empty($field['email']))
                $field['email']='Not available';
            if(empty($field['locality_name']))
                $field['locality_id']=1;

            $field['url']=Str::slug($field['name']);
            $field=$this->helpStore($field);

            try{
                $result=Company::create($field);
            } catch (QueryException $e){
                $error++;
                return false;
            }
            if($result)
            {
                $success++;
            }
            else{
                $error++;
            }
        flush();
            return true;

    }



    public function csv_to_array($filename = '', $delimiter = ',')
    {
        if (!file_exists($filename) || !is_readable($filename))
            return FALSE;
        $noHeader = false;
        $header=[
            'name', 'descr', 'streetaddress',
            'telephone', 'fax', 'email',
            'website', 'latitude', 'longitude',
            'locality_name', 'category_name', 'region_name',
            'postalcode',
            ];
        if (($handle = fopen($filename, 'r')) !== FALSE) {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE) {
                if(!$noHeader)
                    $noHeader = $row;
                else
                {
                    if(count($row)==12)
                        array_push($row, 0);
                    if(count($row)!=13)
                        continue;
                    $data = array_combine($header, $row);
                    $this->upload_base($data);
                }
            }
            fclose($handle);
        }
    }

    public function convert($size)
    {
        $unit = array('b', 'kb', 'mb', 'gb', 'tb', 'pb');
        return @round($size / pow(1024, ($i = floor(log($size, 1024)))), 2) . ' ' . $unit[$i];
    }
    public function helpStore($data)
    {
        $category=Category::where('name','=', $data['category_name'])->first();
        if(!$category)
            $category=Category::create(['name'=>$data['category_name'],'url'=>Str::slug($data['category_name'])]);
        $region=Region::where('name','=', $data['region_name'])->first();
        if(!$region)
            $region=Region::create(['name'=>$data['region_name'],'url'=>Str::slug($data['region_name'])]);
        $locality=Locality::where('name','=', $data['locality_name'])->first();
        if(!$locality)
            $locality=Locality::create(['name'=>$data['locality_name'],'url'=>Str::slug($data['locality_name']),'region_id'=>$region->id]);

        $data['category_id']=$category->id;
        $data['region_id']=$region->id;
        $data['locality_id']=$locality->id;
        return $data;
    }


}
