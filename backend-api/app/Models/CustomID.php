<?php


namespace App\Models;

trait CustomID
{
    public static function generateID() {
        try {
            $candidateID = substr(md5(random_bytes(16)), 0, 16);
            // call the same function if the id exists already
            if (parent::idExist($candidateID)) {
                return parent::generateID();
            }
            // otherwise, it's valid and can be used
            return $candidateID;
        } catch (\Exception $e) {
            return null;
        }
    }

    public static function idExist($id) {
        // query the database and return a boolean
        // for instance, it might look like this in Laravel
        try {
            parent::findOrFail($id);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
