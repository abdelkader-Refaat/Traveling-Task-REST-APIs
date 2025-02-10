<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Interfaces\PaymentGatewayInterface;

class PaymentController extends Controller
{
    use ResponseTrait;

    public function __construct(protected PaymentGatewayInterface $paymentGateway)
    {
    }
    public function paymentProcess(Request $request): JsonResponse|RedirectResponse
    {
        $response = $this->paymentGateway->sendPayment($request);
        if ($request->is('api/*')) {
            return $this->successData($response);
        }
        return redirect($response['url']);
    }
    public function callBack(Request $request): RedirectResponse
    {
        $response = $this->paymentGateway->callBack($request);
        if ($response) {
            return to_route('payment.success');
        }
        return to_route('payment.failed');
    }

}
