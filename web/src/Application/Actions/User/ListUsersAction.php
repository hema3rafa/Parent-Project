<?php
declare(strict_types=1);

namespace App\Application\Actions\User;

use Psr\Http\Message\ResponseInterface as Response;

class ListUsersAction extends UserAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {

        $searchOptions = $this->searchParametersMapping();

        $users = $this->userRepository->findAll($searchOptions);

        $this->logger->info("Users list was viewed.");

        return $this->respondWithData($users);
    }


    /**
     * @return array
     */
    protected function searchParametersMapping(): array
    {
        $searchOptions = array();

        if (isset($_GET["id"]))
            $searchOptions['id'] = $_GET["id"];

        if (isset($_GET["provider"]))
            $searchOptions['provider'] = $_GET["provider"];

        if (isset($_GET["statusCode"]))
            $searchOptions['statusCode'] = $_GET["statusCode"];

        if (isset($_GET["balanceMin"]))
            $searchOptions['balanceMin'] = $_GET["balanceMin"];

        if (isset($_GET["balanceMax"]))
            $searchOptions['balanceMax'] = $_GET["balanceMax"];

        if (isset($_GET["currency"]))
            $searchOptions['currency'] = $_GET["currency"];

        return $searchOptions;
    }
}
