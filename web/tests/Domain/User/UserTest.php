<?php
declare(strict_types=1);

namespace Tests\Domain\User;

use App\Domain\User\User;
use Tests\TestCase;

class UserTest extends TestCase
{


    public function userProvider()
    {
        return [
            ['1', 'hema3rafa@gmail.com', 'EGP', 'authorised', 100.0, '2018-12-22', 'DataProviderY'],
            ['2', 'hema3rafa2@gmail.com', 'EGP', 'authorised', 100.0, '2018-12-22', 'DataProviderY'],
            ['3', 'hema3rafa3@gmail.com', 'EGP', 'authorised', 100.0, '2018-12-22', 'DataProviderY'],
            ['4', 'hema3rafa4@gmail.com', 'EGP', 'authorised', 100.0, '2018-12-22', 'DataProviderY'],
            ['5', 'hema3rafa5@gmail.com', 'EGP', 'authorised', 100.0, '2018-12-22', 'DataProviderY'],

        ];
    }


    /**
     * @dataProvider userProvider
     * @param $id
     * @param $email
     * @param $currency
     * @param $statusCode
     * @param $balance
     * @param $registrationDate
     * @param $provider
     */
    public function testGetters($id, $email, $currency, $statusCode, $balance, $registrationDate, $provider)
    {
        $user = new User($id,  $email,  $currency,  $statusCode,  $balance,  $registrationDate,  $provider);

        $this->assertEquals($id, $user->getId());
        $this->assertEquals($email, $user->getEmail());
        $this->assertEquals($currency, $user->getCurrency());
        $this->assertEquals($statusCode, $user->getStatusCode());
        $this->assertEquals($balance, $user->getBalance());
        $this->assertEquals($registrationDate, $user->getRegistrationDate());
        $this->assertEquals($provider, $user->getProvider());
    }


    /**
     * @dataProvider userProvider
     * @param $id
     * @param $email
     * @param $currency
     * @param $statusCode
     * @param $balance
     * @param $registrationDate
     * @param $provider
     */
    public function testJsonSerialize($id, $email, $currency, $statusCode, $balance, $registrationDate, $provider)
    {
        $user = new User($id,  $email,  $currency,  $statusCode,  $balance,  $registrationDate,  $provider);

        $expectedPayload = json_encode([
            'id' => $id,
            'email' => $email,
            'statusCode' => $statusCode,
            'currency' => $currency,
            'balance' => $balance,
            'registrationDate' => $registrationDate,
            'provider' => $provider,
        ]);

        $this->assertEquals($expectedPayload, json_encode($user));
    }
}
