<?php
namespace App\Repositories;
use Illuminate\Database\Eloquent\Model;
use App\CountryModel;
use App\Repositories\Interfaces\CountriesRepositoryInterface;
use App\Http\Requests\CountriesRequest;
class CountriesRepository implements CountriesRepositoryInterface
{
    protected $model;
    public function __construct(Model $model)
    {
        $this->model = $model;
    }
	public function getAll()
	{
		return $this->model->all();
	}

    public function getById($id)
    {
    	return CountryModel::find($id);
    }
    public function update($id,$request)
    {
    	$data = CountryModel::find($id);
        $data->country_code = $request->txtCountryCode;
        $data->country_name = $request->txtCountryName;
        $data->save();
    }
    public function delete($id)
    {
    	$data = CountryModel::find($id);
    	return $data->delete();
    }
    public function create($request)
    {   
        $data = new CountryModel;
    	$data->country_code = $request->txtCountryCode;
        $data->country_name = $request->txtCountryName;
        return $data->save();
    }
}