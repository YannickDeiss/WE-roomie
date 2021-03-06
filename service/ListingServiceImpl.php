<?php
/**
 * Created by PhpStorm.
 * User: Hermann Grieder
 * Date: 5/7/2018
 * Time: 2:00 PM
 */

namespace service;


use domain\Listing;
use dao\ListingDAO;
use http\HTTPException;
use http\HTTPStatusCode;

class ListingServiceImpl implements ListingService
{
    /**
     * @access public
     * @param Listing listing
     * @return Listing
     * @ParamType listing Listing
     * @ReturnType Listing
     * @throws HTTPException
     */
    public function createListing(Listing $listing) {
        if (AuthServiceImpl::getInstance()->verifyAuth()) {
            $listingDAO = new ListingDAO();
            $listing->setUserid(AuthServiceImpl::getInstance()->getCurrentUserId());
            return $listingDAO->create($listing);
        }
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);

    }

    /**
     * @access public
     * @param int listingId
     * @return Listing
     * @ParamType listingId int
     * @ReturnType Listing
     * @throws HTTPException
     */
    public function readListing($listingID) {
        if (AuthServiceImpl::getInstance()->verifyAuth()) {
            $listingDAO = new ListingDAO();
            return $listingDAO->read($listingID);
        }
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);

    }

    /**
     * @access public
     * @param Listing listing
     * @return Listing
     * @ParamType listing Listing
     * @ReturnType Listing
     * @throws HTTPException
     */
    public function updateListing(Listing $listing) {
        if (AuthServiceImpl::getInstance()->verifyAuth()) {
            $listingDAO = new ListingDAO();
            return $listingDAO->update($listing);
        }
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);

    }




    /**
     * @access public
     * @param int listingId
     * @ParamType listingId int
     */
    public function deleteListing($listingId) {
        if (AuthServiceImpl::getInstance()->verifyAuth()) {
            $listingDAO = new ListingDAO();
            $listing = new Listing();
            $listing->setId($listingId);
            $listingDAO->delete($listing);
        }
    }

    /**
     * @access public
     * @return Listing[]
     * @ReturnType Listing[]
     * @throws HTTPException
     */
    public function findAllListings() {
        if (AuthServiceImpl::getInstance()->verifyAuth()) {
            $listingDAO = new ListingDAO();
            return $listingDAO->findByUserID(AuthServiceImpl::getInstance()->getCurrentUserId());
        }
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
    }

    /**
     * @access public
     * @return Listing[]
     * @ReturnType Listing[]
     */
    public function findTopTen() {
        $listingDAO = new ListingDAO();
        return $listingDAO->findTopTen();
    }

    /**
     * @access public
     * @param Listing $listing
     * @return Listing[]
     * @ReturnType Listing[]
     */
    public function filterListings(Listing $listing, $minRooms, $maxRooms, $minPrice, $maxPrice) {
        $listingDAO = new ListingDAO();

        if ($minRooms === ""){
            $minRooms = 1;
        }

        if ($maxRooms === ""){
            $maxRooms = 100;
        }

        if ($minPrice === ""){
            $minPrice = 1;
        }

        if ($maxPrice === ""){
            $maxPrice = 1000000;
        }

        if ($maxRooms !== "" && $minRooms > $maxRooms){
            $value = $minRooms;
            $minRooms = $maxRooms;
            $maxRooms = $value;
        }

        if ($maxPrice !== "" && $minPrice > $maxPrice){
            $value = $minPrice;
            $minPrice = $maxPrice;
            $maxPrice = $value;
        }

        return $listingDAO->filterListings($listing, $minRooms, $maxRooms, $minPrice, $maxPrice);
    }

    public function findListingById($id)
    {
        $listingDAO = new ListingDAO();
        return $listingDAO->findListingById($id);

    }
}