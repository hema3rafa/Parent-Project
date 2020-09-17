<?php


namespace App\Infrastructure\processors;

use App\Domain\User\User;


class UserSearchProcessor
{


    /**
     * @param User[] $users
     * @param array $searchList
     * @return array
     */
    function execute(array $users, array $searchList): array
    {
        $json = json_encode($users);
        $usersList = json_decode($json, true);

        // Create the result array
        $result = array();

        // Iterate over each array element
        foreach ($usersList as $key => $value) {

            // Iterate over each search condition
            foreach ($searchList as $k => $v) {

                // If the array element does not meet
                // the search condition then continue
                // to the next element
                if ($k == "balanceMax") {
                    if (!isset($value["balance"]) || $value["balance"] > $v) {
                        // Skip two loops
                        continue 2;
                    }
                } elseif ($k == "balanceMin") {
                    if (!isset($value["balance"]) || $value["balance"] < $v) {
                        // Skip two loops
                        continue 2;
                    }
                } else {
                    if (!isset($value[$k]) || $value[$k] != $v) {
                        // Skip two loops
                        continue 2;
                    }
                }

            }

            // Append array element's key to the
            //result array
            $result[$value['id']] = $value['id'];
        }

        // Return result
        return $result;
    }
}
