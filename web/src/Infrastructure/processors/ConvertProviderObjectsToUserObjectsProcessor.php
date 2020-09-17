<?php


namespace App\Infrastructure\processors;

use App\Domain\User\User;
use App\Infrastructure\ProvidersMapper\Provider;
use DateTime;

class ConvertProviderObjectsToUserObjectsProcessor
{


    /**
     * @param Provider $provider
     * @return User[]
     */
    public function execute(Provider $provider): array
    {
        $strJsonFileContents = file_get_contents("../providersJsonFiles/" . $provider->providerJsonFileName);
        $providerData = json_decode($strJsonFileContents);

        // var_dump(print_r($providerData));

        $users = array();
        foreach ($providerData->users as $dataObject) {
            $userObject = new User(
                $dataObject->{$provider->providerObjectDataMapper['id']},
                $dataObject->{$provider->providerObjectDataMapper['email']},
                $dataObject->{$provider->providerObjectDataMapper['currency']},
                $provider->providerStatusMapper[$dataObject->{$provider->providerObjectDataMapper['status']}],
                $dataObject->{$provider->providerObjectDataMapper['balance']},
                $this->dateFormat($dataObject->{$provider->providerObjectDataMapper['registrationDate']}, $provider->providerDateFormat),
                $provider->providerName);
            $users[$userObject->getId()] = $userObject;

        }
        return $users;

    }


    /**
     * @param String $originalDate
     * @param String $originalFormat
     * @return string
     */
    public function dateFormat(string $originalDate, string $originalFormat): string
    {
        return DateTime::createFromFormat($originalFormat, '' . $originalDate)->format('Y-m-d');

    }

}
