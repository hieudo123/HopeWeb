<?php
namespace App\Http\ViewComposers;
use Illuminate\View\View;
use App\CountryModel;
use App\Repositories\CountriesRepository;
class CountriesComposer
{
	private $countries;

	public function __construct(CountryModel $countryModel)
	{
		$this->countries = new CountriesRepository($countryModel);
	}

	public function compose(View $view)
	{
		$countriesList = $this->countries->getAll();
		$view->with('countries',$countriesList);
	}
}