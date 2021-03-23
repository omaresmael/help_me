# Basic Useage

1. add to your controller the following line
> use App\Helpers\Country;
1. create object from Country class 
> $countries = new Country();
OR
> $countries = new Country;
1. then you will be able to use the following methods
- $countries->listOfCountries();
- $countries->listOfCities();
- $countries->getCountryCities('SA');
