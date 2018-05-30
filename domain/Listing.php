<?php
/**
 * Created by PhpStorm.
 * User: Hermann Grieder
 * Date: 5/20/2018
 * Time: 10:15 AM
 */

namespace domain;


class Listing
{
    protected $id;
    protected $userID;
    protected $title;
    protected $street;
    protected $streetnumber;
    protected $plz;
    protected $city;
    protected $canton;
    protected $numberofrooms;
    protected $price;
    protected $squaremeters;
    protected $publishedDate;
    protected $moveindate;
    protected $description;
    protected $image1;
    protected $image2;
    protected $image3;

    /**
     * @return mixed
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id) {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getUserID() {
        return $this->userID;
    }

    /**
     * @param int $userID
     */
    public function setUserID($userID) {
        $this->userID = $userID;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        return $this->title = $title ;
    }

    /**
     * @return mixed
     */
    public function getStreet() {
        return $this->street;
    }

    /**
     * @param mixed $street
     */
    public function setStreet($street) {
        $this->street = $street;
    }

    /**
     * @return mixed
     */
    public function getStreetnumber()
    {
        return $this->streetnumber;
    }

    /**
     * @param mixed $streetnumber
     */
    public function setStreetnumber($streetnumber)
    {
        $this->streetnumber = $streetnumber;
    }

    /**
     * @return mixed
     */
    public function getPlz() {
        return $this->plz;
    }

    /**
     * @param mixed $plz
     */
    public function setPlz($plz) {
        $this->plz = $plz;
    }

    /**
     * @return mixed
     */
    public function getCity() {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city) {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getCanton() {
        return $this->canton;
    }

    /**
     * @param mixed $canton
     */
    public function setCanton($canton) {
        $this->canton = $canton;
    }

    /**
     * @return mixed
     */
    public function getNumberofrooms() {
        return $this->numberofrooms;
    }

    /**
     * @param mixed $numberofrooms
     */
    public function setNumberofrooms($numberofrooms) {
        $this->numberofrooms = $numberofrooms;
    }

    /**
     * @return mixed
     */
    public function getPrice() {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price) {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getSquaremeters() {
        return $this->squaremeters;
    }

    /**
     * @param mixed $squaremeters
     */
    public function setSquaremeters($squaremeters) {
        $this->squaremeters = $squaremeters;
    }

    /**
     * @return mixed
     */
    public function getPublishedDate() {
        return $this->publishedDate;
    }

    /**
     * @param mixed $publishedDate
     */
    public function setPublishedDate($publishedDate) {
        $this->publishedDate = $publishedDate;
    }

    /**
     * @return mixed
     */
    public function getMoveindate() {
        return $this->moveindate;
    }

    /**
     * @param mixed $moveindate
     */
    public function setMoveindate($moveindate) {
        $this->moveindate = $moveindate;
    }

    /**
     * @return mixed
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description) {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getImage1() {
        return $this->image1;
    }

    /**
     * @param mixed $image1
     */
    public function setImage1($image1) {
        $this->image1 = $image1;
    }

    /**
     * @return mixed
     */
    public function getImage2() {
        return $this->image2;
    }

    /**
     * @param mixed $image2
     */
    public function setImage2($image2) {
        $this->image2 = $image2;
    }

    /**
     * @return mixed
     */
    public function getImage3() {
        return $this->image3;
    }

    /**
     * @param mixed $image3
     */
    public function setImage3($image3) {
        $this->image3 = $image3;
    }



    // 0 --> year
    // 1 --> month
    // 2 --> day
    public function getSplit($index, $flag) {

        $date = explode("-", $flag);

        return $date[$index];
    }

    public function getYear($flag) {
        return $this->getSplit(0, $flag);
    }

    public function getMonth($flag) {
        return $this->getSplit(1, $flag);
    }

    public function getDay($flag) {
        return $this->getSplit(2, $flag);
    }

    public function getNumberToMonth($number) {

        switch ($number) {
            case 1 :
                return "January";
                break;
            case 2 :
                return "February";
                break;
            case 3 :
                return "March";
                break;
            case 4 :
                return "April";
                break;
            case 5 :
                return "May";
                break;
            case 6 :
                return "June";
                break;
            case 7 :
                return "July";
                break;
            case 8 :
                return "August";
                break;
            case 9 :
                return "September";
                break;
            case 10 :
                return "October";
                break;
            case 11 :
                return "November";
                break;
            case 12 :
                return "December";
                break;
        }
    }
}