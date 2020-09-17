<?php


namespace App\Infrastructure\ProvidersMapper;

use App\Infrastructure\processors\ConvertProviderObjectsToUserObjectsProcessor;

abstract class Provider
{
    public array $providerObjectDataMapper;
    public string $providerName;
    public string $providerJsonFileName;
    public string $providerDateFormat;
    public array $providerStatusMapper;
    /**
     * @return \App\Domain\User\User[]
     */
    public function execute()
    {
        $convertProviderObjectsToUserObjectsProcessor = new ConvertProviderObjectsToUserObjectsProcessor();
        return $users = $convertProviderObjectsToUserObjectsProcessor->execute($this);

    }
}
