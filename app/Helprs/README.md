# Basic Useage

1. add to your controller the following line
> use App\Helpers\Country;
1. create object from Country class 
> $countery = new Country();
OR
> $countery = new Country;
1. then you will be able to use the following methods
- $countery->listOfCountries();
- $countery->listOfCities();
- $countery->getCountryCities('SA');