<?php

namespace RM\SDK\Modules;

class PaymentModule extends Module
{
    public function qrPay(array $args = [])
    {
        $uri = $this->getOpenApiUrl('v3', '/payment/transaction/qrcode');
        return $this->mapResponse($this->callApi('post', $uri, $args)->send());
    }

    public function qrCode(string $qrCode)
    {
        $uri = $this->getOpenApiUrl('v3', "/payment/transaction/qrcode/$qrCode");
        return $this->mapResponse($this->callApi('get', $uri)->send());
    }
    
    public function transactionsByQrCode(string $qrCode, int $limit = 10)
    {
        $uri = $this->getOpenApiUrl('v3', "/payment/transaction/qrcode/{$qrCode}/transactions?limit=$limit");
        return $this->mapResponse($this->callApi('get', $uri)->send());
    }

    public function quickPay(array $args = [])
    {
        $uri = $this->getOpenApiUrl('v3', '/payment/quickpay');
        return $this->mapResponse($this->callApi('post', $uri, $args)->send());
    }

    public function refund(array $args = [])
    {
        $uri = $this->getOpenApiUrl('v3', '/payment/refund');
        return $this->mapResponse($this->callApi('post', $uri, $args)->send());
    }

    public function reverse(array $args = [])
    {
        $uri = $this->getOpenApiUrl('v3', '/payment/reverse');
        return $this->mapResponse($this->callApi('post', $uri, $args)->send());
    }

    public function paginate(int $limit = 100)
    {
        $uri = $this->getOpenApiUrl('v3', "/payment/transactions?limit=$limit");
        return $this->mapResponse($this->callApi('get', $uri)->send());
    }

    public function find(string $transactionId)
    {
        $uri = $this->getOpenApiUrl('v3', "/payment/transaction/$transactionId");
        return $this->mapResponse($this->callApi('get', $uri)->send());
    }

    public function findByOrderId(string $orderId)
    {
        $uri = $this->getOpenApiUrl('v3', "/payment/transaction/order/$orderId");
        return $this->mapResponse($this->callApi('get', $uri)->send());
    }
}