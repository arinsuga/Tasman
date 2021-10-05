<?php

namespace Arins\Helpers\Response;

use Arins\Helpers\Response\ResponseAbstract;
use Arins\Helpers\Response\ResponseInterface;

class Response extends ResponseAbstract
               implements ResponseInterface
{
    public function viewModel($parData = null, $parFormAction = null)
    {
        return $this->asObject(
            config('response.status.ok', true),
            config('response.code.ok.number', 200), 
            config('respnse.code.ok.message', 'OK'),
            null,
            $parData,
            $parFormAction
        );
    }

    public function toArray($parData)
    {
        return json_decode(json_encode($parData), TRUE);
    }

    public function toJson($parData)
    {
        return json_encode($parData);
    }

    public function toObject($parData)
    {
        return json_decode(json_encode($parData), FALSE);
    }

}
