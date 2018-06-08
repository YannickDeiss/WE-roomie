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
            INSERT INTO "apartment" ("userid", title, street, streetnumber, zip, city, canton, numberofrooms, price, squaremeters, publisheddate, moveindate, description, image1, image2, image3)
           VALUES (:userid, :title, :street, :streetnumber, :zip, :city, :canton, :numberofrooms, :price, :squaremeters, :publisheddate, :moveindate, :description, :image1, :image2, :image3)');
        $stmt->bindValue(':userid', $listing->getUserID());
        $stmt->bindValue(':title', $listing->getTitle());
        $stmt->bindValue(':street', $listing->getStreet());
        $stmt->bindValue(':streetnumber', $listing->getStreetnumber());
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
        $stmt = $this->pdoInstance->prepare('
            UPDATE "apartment" SET 
            "userid" = :userid,
            title = :title,
            street = :street, 
            streetnumber = :streetnumber,
            zip = :zip, 
            city = :city, 
            canton = :canton, 
            numberofrooms = :numberofrooms, 
            price = :price, 
            squaremeters = :squaremeters, 
            moveindate = :moveindate, 
            description = :description, 
            image1 = :image1, 
            image2 = :image2, 
            image3 = :image3
            WHERE id = :id');
        $stmt->bindValue(':id', $listing->getId());
        $stmt->bindValue(':userid', $listing->getUserID());
        $stmt->bindValue(':title', $listing->getTitle());
        $stmt->bindValue(':street', $listing->getStreet());
        $stmt->bindValue(':streetnumber', $listing->getStreetnumber());
        $stmt->bindValue(':zip', $listing->getPlz());
        $stmt->bindValue(':city', $listing->getCity());
        $stmt->bindValue(':canton', $listing->getCanton());
        $stmt->bindValue(':numberofrooms', $listing->getNumberofrooms());
        $stmt->bindValue(':price', $listing->getPrice());
        $stmt->bindValue(':squaremeters', $listing->getSquaremeters());
        $stmt->bindValue(':moveindate', $listing->getMoveindate());
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
            SELECT * FROM "apartment" WHERE "userid" = :Id ORDER BY id DESC;');
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
    public function findTopTen() {
        $stmt = $this->pdoInstance->prepare('
            SELECT * FROM "apartment" ORDER BY id DESC LIMIT 10');
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "domain\Listing");
    }

    public function filterListings(Listing $listing, $minRooms, $maxRooms, $minPrice, $maxPrice)
    {
        $stmt = $this->pdoInstance->prepare('
            SELECT * FROM "apartment"
            WHERE
            upper(city) = :city AND
            numberofrooms BETWEEN :minRooms AND :maxRooms AND
            price BETWEEN :minPrice AND :maxPrice
            ORDER BY id DESC ');

        $stmt->bindValue(':city', strtoupper($listing->getCity()));
        $stmt->bindValue(':minRooms', intval($minRooms));
        $stmt->bindValue(':maxRooms', intval($maxRooms));
        $stmt->bindValue(':minPrice', intval($minPrice));
        $stmt->bindValue(':maxPrice', intval($maxPrice));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_CLASS, "domain\Listing");
    }
}