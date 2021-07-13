<?php


namespace PAM\Services;


use PAM\RechargeCard;
use Psr\Http\Client\ClientExceptionInterface;

class TheSieuReService
{
    private RechargeCard $rechargeCard;

    public function __construct($rechargeCard)
    {
        $this->rechargeCard = $rechargeCard;
    }

    private function handleStatusCode($data): array
    {
        switch ($data['status']) {
            case 1:
                return [
                    'success' => true,
                    'message' => $data['message']
                ];
            case 2:
                return [
                    'success' => true,
                    'handleSuccess' => false,
                    'message' => $data['message']
                ];
            case 3:
            case 4:
            case 99:
                 return [
                    'success' => true,
                    'message' => $data['message']
                ];
            case 100:

                return [
                    'success' => false,
                    'message' => $data['message']
                ];
            default:
                return [
                    'success' => false,
                    'message' => 'Hệ thống đã phát sinh lỗi vui lòng thử lại sau'
                ];
        }
    }

    public function send($networkCode, $amount, $code, $serial, $requestId): array
    {
        try {
            $sign = md5($this->rechargeCard->getApiKey() . $code . $serial);
            $response = $this->rechargeCard->setUrl('https://thesieure.com/')->sendRequest('POST', 'chargingws/v2', [
                'json' => [
                    'telco' => $networkCode === 'VIETNAMOBILE' ? 'VNMOBI' : $networkCode,
                    'code' => $code,
                    'serial' => $serial,
                    'amount' => $amount,
                    'request_id' => $requestId,
                    'partner_id' => $this->rechargeCard->getApiId(),
                    'sign' => $sign,
                    'command' => 'charging'
                ]
            ]);
            $data = json_decode($response->getBody()->getContents(), true);
            return $this->handleStatusCode($data);
        } catch (ClientExceptionInterface $e) {
            return [
                'success' => false,
                'message' => 'Hệ thống đã phát sinh lỗi vui lòng thử lại sau'
            ];
        }
    }

    public function callback($GET): array
    {
        $sign = md5($this->rechargeCard->getApiKey() . $GET['code'] . $GET['serial']);
 
        if ($sign === $GET['callback_sign'] && (int)$GET['status'] === 1) {
            return [
                'success' => true,
                'data' => [
                    'tran_id' => $GET['request_id'],
                    'pin' => $GET['code'],
                    'amount' => $GET['value'],
                ]
            ];
        } else {
           return [
                'success' => false,
                'data' => [
                     'tran_id' => $GET['request_id'],
                    'pin' => $GET['code'],
                    'amount' => $GET['value'],
                    ]
            ];
        }
    }
}
