<?php
/**
 * Created by PhpStorm.
 * User: Hermann Grieder
 * Date: 07.01.2018
 * Time: 01:08
 */

namespace controller;

use domain\Listing;
use service\AWSUploadService;
use service\ListingServiceImpl;
use view\LayoutRendering;
use view\TemplateView;

class ListingController
{
    public static function create()
    {
        $contentView = new TemplateView("view/user_listing_edit.php");
        LayoutRendering::basicLayout($contentView);
    }

    public static function edit()
    {
        $id = $_GET["id"];
        $contentView = new TemplateView("view/user_listing_edit.php");
        $contentView->listing = (new ListingServiceImpl())->readListing($id);
        LayoutRendering::basicLayout($contentView);
    }

    public static function update()
    {
        $listing = new Listing();

        $listing->setId("");
        if (isset($_POST["id"])) {
            $listing->setId($_POST["id"]);
        }

        $listing->setUserid($_POST["userID"]);
        $listing->setTitle($_POST["title"]);

        $listing->setStreet($_POST["street"]);
        $listing->setStreetnumber(null);
        $listing->setPlz(null);

        if ($_POST["streetNumber"] !== "") {
            $listing->setStreetnumber($_POST["streetNumber"]);
        }

        if ($_POST["plz"] !== "") {
            $listing->setPlz($_POST["plz"]);
        }

        $listing->setCity($_POST["city"]);
        $listing->setCanton($_POST["canton"]);

        $listing->setNumberofrooms("0");
        if (self::isNumber($_POST["rooms"])) {
            $listing->setNumberofrooms($_POST["rooms"]);
        }

        $listing->setPrice("0");
        if (self::isNumber($_POST["rent"])) {
            $listing->setPrice($_POST["rent"]);
        }

        $listing->setSquaremeters("0");
        if (self::isNumber($_POST["squareMeters"])) {
            $listing->setSquaremeters($_POST["squareMeters"]);
        }

        $listing->setDescription($_POST["description"]);

        $aws = new AWSUploadService();

        $dbListing = new Listing();

        if ($listing->getId() !== "") {
            $dbListing = (new ListingServiceImpl())->findListingById($listing->getId())[0];
        }

        $listing->setImage1(null);
        $listing->setImage2(null);
        $listing->setImage3(null);

        if (!empty($_FILES['image1']['name'])) {
            $imageAddress = $aws->uploadImage($_FILES['image1']);
            $listing->setImage1($imageAddress);
        } else if (!is_null($dbListing)) {
            $listing->setImage1($dbListing->getImage1());
        }
        if (!empty($_FILES['image2']['name'])) {
            $imageAddress = $aws->uploadImage($_FILES['image2']);
            $listing->setImage2($imageAddress);
        } else if (!is_null($dbListing)) {
            if (!empty($dbListing)) {
                $listing->setImage2($dbListing->getImage2());
            }
        }
        if (!empty($_FILES['image3']['name'])) {
            $imageAddress = $aws->uploadImage($_FILES['image3']);
            $listing->setImage3($imageAddress);
        } else if (!is_null($dbListing)) {
            if (!empty($dbListing)) {
                $listing->setImage3($dbListing->getImage3());
            }
        }

        $imageList = (array($listing->getImage1(), $listing->getImage2(), $listing->getImage3()));
        rsort($imageList);

        $listing->setImage1($imageList[0]);
        $listing->setImage2($imageList[1]);
        $listing->setImage3($imageList[2]);

        $listing->setMoveindate($_POST["availableFrom"]);

        if ($listing->getId() === "") {
            (new ListingServiceImpl())->createListing($listing);
        } else {
            (new ListingServiceImpl())->updateListing($listing);
        }
        return true;
    }

    public static function isNumber($entry)
    {
        if (is_numeric($entry)) {
            return true;
        }
        return false;
    }

    public static function readAll()
    {
        $contentView = new TemplateView("view/user_listing.php");
        $contentView->listings = (new ListingServiceImpl())->findAllListings();
        LayoutRendering::basicLayout($contentView);
    }

    public static function readTopTen()
    {
        $contentView = new TemplateView("assets/adSection/adSection.php");
        $contentView->listings = (new ListingServiceImpl())->findTopTen();
        LayoutRendering::basicLayout($contentView);
    }


    public static function delete()
    {
        $id = $_GET["id"];
        (new ListingServiceImpl())->deleteListing($id);
    }

    public static function editView()
    {
    }
}