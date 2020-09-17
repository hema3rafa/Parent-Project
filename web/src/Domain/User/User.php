<?php
declare(strict_types=1);

namespace App\Domain\User;

use JsonSerializable;

class User implements JsonSerializable
{
    /**
     * @var string|null
     */
    private ?string $id;

    /**
     * @var string
     */
    private string $email;
    /**
     * @var string
     */
    private string $currency;

    /**
     * @var string
     */
    private string $statusCode;

    /**
     * @var float
     */
    private float $balance;

    /**
     * @var string
     */
    private string $provider;


    /**
     * @var string
     */
    private  string $registrationDate;

    /**
     * User constructor.
     * @param string|null $id
     * @param string $email
     * @param string $currency
     * @param string $statusCode
     * @param float $balance
     * @param string $registrationDate
     * @param string $provider
     */
    public function __construct(?string $id, string $email, string $currency, string $statusCode, float $balance, string $registrationDate, string $provider)
    {
        $this->id = $id;
        $this->email = $email;
        $this->currency = $currency;
        $this->statusCode = $statusCode;
        $this->balance = $balance;
        $this->registrationDate = $registrationDate;
        $this->provider = $provider;

    }


    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @return string
     */
    public function getStatusCode(): string
    {
        return $this->statusCode;
    }

    /**
     * @return float
     */
    public function getBalance(): float
    {
        return $this->balance;
    }

    /**
     * @return string
     */
    public function getRegistrationDate(): string
    {
        return $this->registrationDate;
    }

    /**
     * @return string
     */
    public function getProvider(): string
    {
        return $this->provider;
    }


    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'statusCode' => $this->statusCode,
            'currency' => $this->currency,
            'balance' => $this->balance,
            'registrationDate' => $this->registrationDate,
            'provider' => $this->provider,
        ];
    }
}
