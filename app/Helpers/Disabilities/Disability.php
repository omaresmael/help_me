<?php

namespace App\Helpers\Disabilities;

/**
 * Disability data containers
 * @author Omar Hossam EL-Din Kandil <okandil273@gmail.com>
 */
class Disability
{
    /**
     * data containers
     * @var $disabilities
     */
    private $disabilities = [];
    /**
     * initialization the data from local json files.
     * @param $disabilities json file
     */
    public function __construct($disabilities = __DIR__.'/disabilities.json')
    {
        $disabilities = file_get_contents($disabilities);
        $disabilities = json_decode($disabilities, true);

        $this->disabilities = $disabilities;
    }

    /**
     * list of all disabilities
     * @return array $this->disabilities
     */
    public function listOfDisabilities()
    {
        return $this->disabilities;
    }

  
    /**
     * destroy data from the memory after using it.
     */
    public function __destruct()
    {
        unset($this->disabilities);
    }
}