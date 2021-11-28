<?php

class Address
{
    private $provinces;
    private $district;

    /**
     * @param $provinces
     * @param $district
     */
    public function __construct($provinces, $district)
    {
        $this->provinces = $provinces;
        $this->district = $district;
    }

    /**
     * @return mixed
     */
    public function getProvinces()
    {
        return $this->provinces;
    }

    /**
     * @param mixed $provinces
     */
    public function setProvinces($provinces)
    {
        $this->provinces = $provinces;
    }

    /**
     * @return mixed
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * @param mixed $district
     */
    public function setDistrict($district)
    {
        $this->district = $district;
    }

    public function convertStringToAddress($string)
    {
        $string = substr($string, 1);
        $string = substr($string, 0, -1);
        $array_address = explode("][", $string);
        $result = array();
        foreach ($array_address as $address) {
            $a = $array_address = explode("--", $address);
            if (count($a) == 1) {
                $result[] = new Address($a[0], null);
            } else {
                $result[] = new Address($a[0], $a[1]);
            }
        }
        return $result;
    }

    public function toString()
    {
        if ($this->getDistrict() == null) {
            return $this->getProvinces();
        }
        return $this->getDistrict() . ', ' . $this->getProvinces();
    }
}