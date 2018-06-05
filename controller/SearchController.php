<?php
/**
 * Created by PhpStorm.
 * User: Hermann Grieder
 * Date: 5/22/2018
 * Time: 5:04 PM
 */

namespace controller;
use domain\Listing;
use service\AuthServiceImpl;
use service\ListingServiceImpl;
use view\TemplateView;
use view\LayoutRendering;
class SearchController
{
    public static function show()
    {
        $contentView = new TemplateView("view/assets/search_page/search.php");
        LayoutRendering::basicLayout($contentView);
    }

    public static function readAll(){
        $listing = new Listing();

        $split = explode(",", ($_POST["city"]), [0]);
        //$listing->setCity($_POST["city"]);

        $minRooms = ($_POST["minRooms"]);
        $maxRooms = ($_POST["maxRooms"]);
        $minRent = ($_POST["minRent"]);
        $maxRent = ($_POST["maxRent"]);

        $listing->setNumberofrooms($_POST["rooms"]);
        $listing->setPrice($_POST["price"]);
        $listing->setSquaremeters($_POST["squareMeters"]);
        $contentView = new TemplateView("view/search_result.php");
        $contentView->listings = (new ListingServiceImpl())->filterListings($listing);
        $contentView->result = true;
        LayoutRendering::basicLayout($contentView );
    }
    public static function getListingById($id)
    {
        $contentView = new TemplateView("view/listing_detail.php");
        $contentView->listing = (new ListingServiceImpl())->findListingById($id);
        //$contentView->user = AuthServiceImpl::getInstance()->readUser();
        LayoutRendering::basicLayout($contentView );
    }
}