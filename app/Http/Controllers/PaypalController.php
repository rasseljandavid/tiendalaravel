<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Ecommerce\Order;
use App\User;
use Paypal;

class PaypalController extends Controller
{

    private $_apiContext;

    public function __construct()
    {
        $this->_apiContext = PayPal::ApiContext(
            config('services.paypal.client_id'),
            config('services.paypal.secret'));

        $this->_apiContext->setConfig(array(
            'mode' => 'live',
            'service.EndPoint' => 'https://api.paypal.com',
            'http.ConnectionTimeOut' => 30,
            'log.LogEnabled' => true,
            'log.FileName' => storage_path('logs/paypal.log'),
            'log.LogLevel' => 'FINE'
        ));


    }

    public function payPremium()
    {
    	return view('payPremium');
    }

    public function getCheckout(Order $order, Request $request)
	{
	    $payer = PayPal::Payer();
	    $payer->setPaymentMethod('paypal');

	    $amount = PayPal:: Amount();
	    $amount->setCurrency('PHP');
	    $amount->setTotal($order->total);

	    $transaction = PayPal::Transaction();
	    $transaction->setAmount($amount);
	    $transaction->setDescription('Goods from Tienda.ph amounting P' . number_format($order->grand_total, 2) . '.');

	    $redirectUrls = PayPal:: RedirectUrls();
	    $redirectUrls->setReturnUrl(route('getDone', ['order' => $order]));
	    $redirectUrls->setCancelUrl(route('getCancel'));

	    $payment = PayPal::Payment();
	    $payment->setIntent('sale');
	    $payment->setPayer($payer);
	    $payment->setRedirectUrls($redirectUrls);
	    $payment->setTransactions(array($transaction));

	    $response = $payment->create($this->_apiContext);
	    $redirectUrl = $response->links[1]->href;

	    return redirect()->to( $redirectUrl );
	}

	public function getDone(Order $order, Request $request)
	{
	    $id = $request->get('paymentId');
	    $token = $request->get('token');
	    $payer_id = $request->get('PayerID');

	    $payment = PayPal::getById($id, $this->_apiContext);

	    $paymentExecution = PayPal::PaymentExecution();

	    $paymentExecution->setPayerId($payer_id);
	    $executePayment = $payment->execute($paymentExecution, $this->_apiContext);



	    $megaventory = new \Megaventory();

        try{
      
            $myOrder = (array)$megaventory->createSalesOrder($order->matchMegaventoryStructure());
            $myOrder["SalesOrderStatus"] = 0;
            $order->comment = $order->comment . ' - paid from paypal';
            $order->update();

            if($order->emailInvoice()){
                flash('success', 'You\'re order has been submitted.');
            }else{
                flash('success', 'You\'re order has been submitted.');
                // flash('success', 'You\'re order has been submitted.
                //     Note: Failed Sending Email at '.Auth::user()->email);
            }
            return redirect('/order/'.$order->id);
            //save here
        } catch(Exception $e){
            flash('danger', 'An error has occured. Please submit the order again');
            return redirect('/cart/checkout');
        }
	}

	public function getCancel()
	{
	    return redirect('cart/checkout');
	}
}