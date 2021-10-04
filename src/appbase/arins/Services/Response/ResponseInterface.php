<?php
namespace Arins\Services\Response;

interface ResponseInterface
{
    public function viewModel($parData, $parFormAction = null);

    public function toArray($parData);
    public function toJson($parData);
    public function toObject($parData);
}
