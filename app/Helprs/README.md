# Basic Useage

1. add to your controller the following line
> use App\Helpers\Country;
1. create object from Country class 
> $country = new Country();
OR
> $countery = new Country;
1. then you will be able to use the following methods
- $country->listOfCountries();
- $country->listOfCities();
- $country->getCountryCities('SA');