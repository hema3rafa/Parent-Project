<?php


namespace App\Infrastructure\ProvidersMapper;


class ProviderX extends Provider
{

    /**
     * ProviderX constructor.
     */
    public function __construct()
    {
        $this->providerName = "DataProviderX";
        $this->providerObjectDataMapper = array(
            'id' => 'parentIdentification',
            'email' => 'parentEmail',
            'currency' => 'Currency',
            'status' => 'statusCode',
            'balance' => 'parentAmount',
            'registrationDate' => 'registerationDate',
        );
        $this->providerJsonFileName = "DataProviderX.json";
        $this->providerDateFormat = "Y-m-d";
        $this->providerStatusMapper = array(
            1 => "authorised",
            2 => "decline",
            3 => "refunded",
        );
    }

    /**
     * @return \App\Domain\User\User[]
     */
    public function execute()
    {
        return parent::execute();
    }
}
