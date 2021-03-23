<?php

namespace App\Helpers;

/**
 * Countery data containers
 * @author Omar Hossam EL-Din Kandil <okandil273@gmail.com>
 */
class Country
{
    /**
     * data containers
     * @var $countries
     * @var $cities
     */
    private $countries = []; 
    private $cities = [];
    /**
     * initialization the data from local jsonfiles.
     * @param $countries json file
     * @param $cities json file
     */
    public function __construct($countries = 'countries.json', $cities = 'cities.json')
    {
        $countries = file_get_contents($countries);
        $countries = json_decode($countries, true);

        $cities = file_get_contents($cities);
        $cities = json_decode($cities, true);

        $this->countries = $countries;
        $this->cities = $cities;
    }

    /**
     * list of all Countries
     * @return array $this->counteries
     */
    public function listOfCountries()
    {
        return $this->countries;
    }

    /**
     * list of all cities
     * @return array $this->cities
     */
    public function listOfCities()
    {
        return $this->cities;
    }

    /**
     * get list of cities of selected country
     * @param string $key of the country
     * @return array $this->cities
     */
    public function getCountryCities(string $key)
    {
        return $this->cities = $this->cities[$key];
    }
    /**
     * destroy data from the memory after useing it.
     */
    public function __destruct()
    {
        unset($this->countries);
        unset($this->states);
    }
}