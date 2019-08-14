<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CountriesRequest;
use App\Http\Requests;
use App\CountryModel;
use Illuminate\Support\Facades\Input;
class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = CountryModel::all();
        if(count($data)> 0)
        {
            return $data->toJson();
        }
    }
    public function getAllCountriesWithPage(Request $request)
    {

        $response = array();
        $currentPage = $request->input('page'); 
        $record_per_page = $request->input('record_per_page');
        $data = CountryModel::paginate( $record_per_page,['*'],'page',$currentPage);
        if(count($data)> 0)
        {
            return $data;
        }
         else
        {
            return response()->json(['success'=>0,'error'=>'Unlimited','countries'=>$data]);
        }
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
        $data = new CountryModel();
        $data->country_code = $request->country_code;
        $data->country_name = $request->country_name;
        if($data->save()>0){
            return response()->json(['success'=>1,'error'=>false]);
        }
        else
            return response()->json(['success'=>0,'error'=>true]);
    }   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $response = array();
        $id = Input::get('id');
        $data = CountryModel::find($id);
        if($data != null)
        {
            
            return response()->json(['success'=>1,'error'=>'0','countries'=>$data]);
        }
        else 
            return response()->json(['success'=>0,'error'=>'1','countries'=>$data]);
        
    }
    public function showByCountryCode(Request $request)
    {
        $code = $request->code;

        $data = CountryModel::where('country_code',$code)->get();
        if($data != null)
            return response()->json(['success'=>1,'error'=>0,'countries'=>$data]);
        else 
            return response()->json(['success'=>0,'error'=>1,'countries'=>$data]);
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
    public function update(Request $request)
    {
        $id = $request->id;
        $data = CountryModel::find($id);
        $data->country_code = $request->country_code;
        $data->country_name = $request->country_name;
        if($data->save()>0)
        {
            return response()->json(['success'=>1]);
        }
        else
            return response()->json(['success'=>0]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = CountryModel::find($id);
        if($data->delete()>0)
        {
            return response()->json(['success'=>1]);
        }
        else
            return response()->json(['success'=>0]);
    }
}
