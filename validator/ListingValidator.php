<?php

/**
 * Created by PhpStorm.
 * User: LorisGrether
 * Date: 09.05.2018
 * Time: 10:50
 */
namespace validator;

use domain\Listing;

class ListingValidator
{
    private $valid = true;
    private $streetError = null;
    private $plzError = null;
    private $cityError = null;
    private $cantonError = null;
    private $roomsError = null;
    private $rentError = null;
    private $squareMeterError = null;
    private $descriptionError = null;
    //private $availableFromError = null;


    public function __construct(Listing $listing = null)
    {
        if (!is_null($listing)) {
            $this->validate($listing);
        }
    }

    public function validate(Listing $listing)
    {
        if (!is_null($listing)) {
            if (empty($listing->getStreet())){
                $this->streetError = 'Please enter a street';
                $this->valid = false;
            }
            if (empty($listing->getPlz())){
                $this->plzError = 'Please enter a postal code';
                $this->valid = false;
            }
            if (empty($listing->getCity())){
                $this->cityError = 'Please enter a city';
                $this->valid = false;
            }
            if (empty($listing->getCanton())){
                $this->cantonError = 'Please enter a canton';
                $this->valid = false;
            }
            if (empty($listing->getNumberofrooms())){
                $this->roomsError = 'Please enter the number of rooms';
                $this->valid = false;
            }

            if (!is_numeric($listing->getNumberofrooms())){
                $this->roomsError = 'Please enter a NUMBER';
                $this->valid = false;
            }

            if (empty($listing->getPrice())){
                $this->rentError = 'Please enter the monthly rent';
                $this->valid = false;
            }
            if (empty($listing->getSquaremeters())){
                $this->squareMeterError = 'Please enter the size in square meters';
                $this->valid = false;
            }
            if (empty($listing->getDescription())){
                $this->descriptionError = 'Please enter a description';
                $this->valid = false;
            }
        } else {
            $this->valid = false;
        }
        return $this->valid;

    }

    public function isValid()
    {
        return $this->valid;
    }

    public function isStreetError()
    {
        return isset($this->streetError);
    }

    /**
     * @return null
     */
    public function getStreetError() {
        return $this->streetError;
    }

    public function isPlzError()
    {
        return isset($this->plzError);
    }

    /**
     * @return null
     */
    public function getPlzError() {
        return $this->plzError;
    }

    public function isCityError()
    {
        return isset($this->cityError);
    }

    /**
     * @return null
     */
    public function getCityError() {
        return $this->cityError;
    }

    public function isCantonError()
    {
        return isset($this->cantonError);
    }

    /**
     * @return null
     */
    public function getCantonError() {
        return $this->cantonError;
    }

    public function isRoomsError()
    {
        return isset($this->roomsError);
    }

    /**
     * @return null
     */
    public function getRoomsError() {
        return $this->roomsError;
    }

    public function isRentError()
    {
        return isset($this->rentError);
    }

    /**
     * @return null
     */
    public function getRentError() {
        return $this->rentError;
    }

    public function isSquareMeterError()
    {
        return isset($this->squareMeterError);
    }

    /**
     * @return null
     */
    public function getSquareMeterError() {
        return $this->squareMeterError;
    }

    public function isDescriptionError()
    {
        return isset($this->descriptionError);
    }

    /**
     * @return null
     */
    public function getDescriptionError() {
        return $this->descriptionError;
    }
}