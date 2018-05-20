<?php
/**
 * Created by PhpStorm.
 * User: LorisGrether
 * Date: 07.01.2018
 * Time: 10:45
 */

namespace dao;

use domain\Listing;
use dao\BasicDAO;

class ListingDAO extends BasicDAO
{
    /**
     * @access public
     * @param Listing $listing
     * @return Listing
     * @ParamType listing Listing
     * @ReturnType Listing
     */
    public function create(Listing $listing) {
        $stmt = $this->pdoInstance->prepare('
            INSERT INTO "apartment" ("userid", title, street, zip, city, canton, numberofrooms, price, squaremeters, publisheddate, moveindate, description, image1, image2, image3)
           VALUES (:userid, :title, :street, :zip, :city, :canton, :numberofrooms, :price, :squaremeters, :publisheddate, :moveindate, :description, :image1, :image2, :image3)');
        $stmt->bindValue(':userid', $listing->getUserID());
        $stmt->bindValue(':title', $listing->getTitle());
        $stmt->bindValue(':street', $listing->getStreet());
        $stmt->bindValue(':zip', $listing->getPlz());
        $stmt->bindValue(':city', $listing->getCity());
        $stmt->bindValue(':canton', $listing->getCanton());
        $stmt->bindValue(':numberofrooms', $listing->getNumberofrooms());
        $stmt->bindValue(':price', $listing->getPrice());
        $stmt->bindValue(':squaremeters', $listing->getSquaremeters());
        $stmt->bindValue(':publisheddate', date("Y-m-d"));
        $stmt->bindValue(':moveindate', $listing->getMoveindate());
        $stmt->bindValue(':description', $listing->getDescription());
        $stmt->bindValue(':image1', $listing->getImage1());
        $stmt->bindValue(':image2', $listing->getImage2());
        $stmt->bindValue(':image3', $listing->getImage3());
        $stmt->execute();
    }

    /**
     * @access public
     * @param int userId
     * @return Listing
     * @ParamType userId int
     * @ReturnType Listing
     */
    public function read($userId) {
        $stmt = $this->pdoInstance->prepare('
            SELECT * FROM "apartment" WHERE id = :id;');
        $stmt->bindValue(':id', $userId);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(\PDO::FETCH_CLASS, "domain\Listing")[0];
        }
        return null;
    }

    /**
     * @access public
     * @param Listing $listing
     * @return Listing
     * @ParamType listing Listing
     * @ReturnType Listing
     */
    public function update(Listing $listing) {
        print_r($listing);
        $stmt = $this->pdoInstance->prepare('
            UPDATE "listingApartment" SET 
            "userID" = :userID,
            street = :street, 
            plz = :plz, 
            city = :city, 
            canton = :canton, 
            numberofrooms = :numberofrooms, 
            price = :price, 
            squaremeters = :squaremeters, 
            publisheddate = :publisheddate, 
            moveindate = :moveindate, 
            moveoutdate = :moveoutdate, 
            description = :description, 
            image1 = :image1, 
            image2 = :image2, 
            image3 = :image3
            WHERE id = :id');
        $stmt->bindValue(':id', $listing->getId());
        $stmt->bindValue(':userID', $listing->getUserID());
        $stmt->bindValue(':street', $listing->getStreet());
        $stmt->bindValue(':plz', $listing->getPlz());
        $stmt->bindValue(':city', $listing->getCity());
        $stmt->bindValue(':canton', $listing->getCanton());
        $stmt->bindValue(':numberofrooms', $listing->getNumberofrooms());
        $stmt->bindValue(':price', $listing->getPrice());
        $stmt->bindValue(':squaremeters', $listing->getSquaremeters());
        $stmt->bindValue(':publisheddate', $listing->getPublishedDate());
        $stmt->bindValue(':moveindate', $listing->getMoveindate());
        $stmt->bindValue(':moveoutdate', $listing->getMoveoutdate());
        $stmt->bindValue(':description', $listing->getDescription());
        $stmt->bindValue(':image1', $listing->getImage1());
        $stmt->bindValue(':image2', $listing->getImage2());
        $stmt->bindValue(':image3', $listing->getImage3());
        $stmt->execute();
        return $this->read($listing->getId());
    }

    /**
     * @access public
     * @param Listing $listing
     * @ParamType listing Listing
     */
    public function delete(Listing $listing) {
        $stmt = $this->pdoInstance->prepare('
            DELETE FROM "apartment"
            WHERE id = :id
        ');
        $stmt->bindValue(':id', $listing->getId());
        $stmt->execute();
    }

    /**
     * @access public
     * @param int userId
     * @return Listing[]
     * @ParamType userId int
     * @ReturnType Listing[]
     */
    public function findByUserID($userid) {
        $stmt = $this->pdoInstance->prepare('
            SELECT * FROM "apartment" WHERE "userid" = :Id ORDER BY id;');
        $stmt->bindValue(':Id', $userid);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "domain\Listing");
    }

    /**
     * @access public
     * @param int userId
     * @return Listing[]
     * @ParamType userId int
     * @ReturnType Listing[]
     */
    public function findListingById($id) {
        $stmt = $this->pdoInstance->prepare('
            SELECT * FROM "apartment" WHERE "id" = :Id;');
        $stmt->bindValue(':Id', $id);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "domain\Listing");
    }

    /**
     * @access public
     * @param int userId
     * @return Listing[]
     * @ParamType userId int
     * @ReturnType Listing[]
     */
    public function findTopThree() {
        $stmt = $this->pdoInstance->prepare('
            SELECT * FROM "apartment" ORDER BY id DESC LIMIT 3');
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "domain\Listing");
    }

    public function filterListings(Listing $listing)
    {
        $stmt = $this->pdoInstance->prepare('
            SELECT * FROM "apartment"
            WHERE upper(street) = :street 
            OR
            plz = :plz OR
            upper(city) = :city OR
            canton = :canton OR
            numberofrooms = :numberofrooms OR
            price = :price OR
            squaremeters = :squaremeters OR
            moveindate = :moveindate OR
            upper(street) = :street');

        $stmt->bindValue(':street', strtoupper($listing->getStreet()));
        $stmt->bindValue(':plz', strtoupper(intval($listing->getPlz())));
        $stmt->bindValue(':city', strtoupper($listing->getCity()));
        $stmt->bindValue(':canton', $listing->getCanton());
        $stmt->bindValue(':numberofrooms', floatval($listing->getNumberofrooms()));
        $stmt->bindValue(':price', floatval($listing->getPrice()));
        $stmt->bindValue(':squaremeters', floatval($listing->getSquaremeters()));
        $stmt->bindValue(':moveindate', ($listing->getMoveindate()));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_CLASS, "domain\Listing");
    }
}