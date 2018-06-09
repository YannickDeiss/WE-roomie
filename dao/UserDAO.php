<?php
/**
 * Created by PhpStorm.
 * User: Hermann Grieder
 * Date: 5/7/2018
 * Time: 2:06 PM
 */

namespace dao;

use domain\User;

class UserDAO extends BasicDAO
{
    public function create(User $user)
    {
        $stmt = $this->pdoInstance->prepare('
        INSERT INTO "user" (username, password, email)
          SELECT :username,:password,CAST(:email AS VARCHAR)
          WHERE NOT EXISTS (
            SELECT email FROM "user" WHERE email = :email
        );');
        $stmt->bindValue(':username', $user->getUserName());
        $stmt->bindValue(':password', $user->getPassword());
        $stmt->bindValue(':email', $user->getEmail());
        $stmt->execute();
        return $this->read($this->pdoInstance->lastInsertId());
    }

    public function read($userID)
    {
        $stmt = $this->pdoInstance->prepare('
            SELECT * FROM "user" WHERE id = :id;');
        $stmt->bindValue(':id', $userID);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(\PDO::FETCH_CLASS, "domain\User")[0];
        }
        return null;
    }

    public function update(User $user)
    {
        $stmt = $this->pdoInstance->prepare('
                UPDATE "user" SET username=:username, email=:email, password=:password WHERE id = :id;');
        $stmt->bindValue(':id', $user->getId());
        $stmt->bindValue(':username', $user->getUserName());
        $stmt->bindValue(':email', $user->getEmail());
        $stmt->bindValue(':password', $user->getPassword());
        $stmt->execute();
        return $this->read($user->getId());
    }

    public function findByEmail($email)
    {
        $stmt = $this->pdoInstance->prepare('
            SELECT * FROM "user" WHERE email = :email;');
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(\PDO::FETCH_CLASS, "domain\User")[0];
        }
        return new User();
    }

    public function findByUserName($userName)
    {
        $stmt = $this->pdoInstance->prepare('
            SELECT * FROM "user" WHERE username = :username;');
        $stmt->bindValue(':username', $userName);
        $stmt->execute();
        if ($stmt->rowCount() > 0)
            return $stmt->fetchAll(\PDO::FETCH_CLASS, "domain\User")[0];
        return null;
    }

    public function findById($id)
    {
        $stmt = $this->pdoInstance->prepare('
            SELECT * FROM "user" WHERE id = :id;');
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        if ($stmt->rowCount() > 0)
            return $stmt->fetchAll(\PDO::FETCH_CLASS, "domain\User")[0];
        return null;
    }

}