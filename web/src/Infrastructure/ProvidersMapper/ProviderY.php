<?php


namespace App\Infrastructure\ProvidersMapper;


use App\Domain\User\User;

class ProviderY extends Provider
{

    /**
     * ProviderX constructor.
     */
    public function __construct()
    {
        $this->providerName = "DataProviderY";
        $this->providerObjectDataMapper = array(
            'id'=>'id',
            'email'=>'email',
            'currency'=>'currency',
            'status'=>'status',
            'balance'=>'balance',
            'registrationDate' => 'created_at',
        );
        $this->providerJsonFileName = "DataProviderY.json";
        $this->providerDateFormat = "d/m/Y";
        $this->providerStatusMapper = array(
            100 => "authorised",
            200 => "decline",
            300 => "refunded",
        );
    }

    /**
     * @return User[]
     */
    public function execute()
    {
        return parent::execute();
    }
}
