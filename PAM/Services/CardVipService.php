<?php


namespace PAM\Services;


use PAM\RechargeCard;
use Psr\Http\Client\ClientExceptionInterface;

class CardVipService
{
    private RechargeCard $rechargeCard;

    public function __construct($rechargeCard)
    {
        $this->rechargeCard = $rechargeCard;
    }

    private function handleStatusCode($statusCode): array
    {
        switch ($statusCode) {
            case 100:
                return [
                    'success' => false,
                    'message' => 'Vui lòng nhập đủ các trường'
                ];
            case  200:
                return [
                    'success' => true,
                    'message' => 'Thẻ đang được xử lý!'
                ];
            case  400:
                return [
                    'success' => false,
                    'message' => 'Thẻ đã tồn tại trong hệ thống hoặc seri đã bị nhập quá 5 lần'
                ];
            case  401:
                return [
                    'success' => false,
                    'message' => 'Định dạng thẻ không đúng'
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
        debug('CARDVIP', 'Send Card', 'start');
        try {
            $response = $this->rechargeCard->setUrl('https://partner.cardvip.vn/api/')->sendRequest('POST', 'createExchange', [
                'json' => [
                    'APIKey' => $this->rechargeCard->getApiKey(),
                    'NetworkCode' => strtoupper($networkCode),
                    'PricesExchange' => $amount,
                    'NumberCard' => $code,
                    'SeriCard' => $serial,
                    'IsFast' => true,
                    'RequestId' => $requestId,
                    'UrlCallback' => 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}/profile/callback.php"
                ]
            ]);
            $data = json_decode($response->getBody()->getContents(), true);
            debug('CARDVIP', 'Send Card response', $data);
            debug('CARDVIP', 'Send Card', 'end');
            return $this->handleStatusCode($data['status']);
        } catch (ClientExceptionInterface $e) {
            debug('CARDVIP', 'Send errors', $e->getMessage());
            return [
                'success' => false,
                'message' => 'Hệ thống đã phát sinh lỗi vui lòng thử lại sau'
            ];
        }
    }

    public function callback($GET): array
    {
        debug('CARDVIP', 'Callback', $GET);
        if ((int)$GET['status'] === 200) {
            debug('CARDVIP', 'Callback Success', [
                'success' => true,
                'data' => [
                    'tran_id' => $GET['requestid'],
                    'pin' => $GET['card_code'],
                    'amount' => $GET['value_receive'],
                ]
            ]);
            return [
                'success' => true,
                'data' => [
                    'tran_id' => $GET['requestid'],
                    'pin' => $GET['card_code'],
                    'amount' => $GET['value_receive'],
                ]
            ];
        } else {
            debug('CARDVIP', 'Callback Error', [
                'success' => false,
            ]);
            return [
                'success' => false,
                'data' => [
                        'tran_id' => $GET['requestid'],
                        'pin' => $GET['card_code'],
                        'amount' => $GET['value_receive'],
                    ]
            ];
        }
    }
}
