<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\Http;


class ProductController extends Controller
{
  //
  public function index(Request $request)
  {

    $products = json_decode(config('app.products'));

    return view('products.index', compact('products'));
  }


  public function checkoutLemonSqueezy(Request $request)
  {
    $response = Http::withHeaders([
      'Authorization' => 'Bearer ' . env('LEMON_SQUEEZY_API_KEY'),
      'Accept' => 'application/vnd.api+json',
      'Content-Type' => 'application/vnd.api+json'
    ])->post("https://api.lemonsqueezy.com/v1/checkouts", [
      'data' => [
        'type' => 'checkouts',
        'attributes' => [
          "checkout_data" => [
            "email" => Auth::user()->email,
            "name" => Auth::user()->name,
            "discount_code" => $request->coupon_id,
          ],
        ],
        'relationships' => [
          'variant' => [
            'data' => [
              'type' => 'variants',
              'id' => $request->price_id,
            ],
          ],
          'store' => [
            'data' => [
              'type' => 'stores',
              'id' => env('LEMON_SQUEEZY_STORE_ID'),
            ],
          ],
        ],
      ],
    ]);

    return $response->json()['data']['attributes']['url'];
  }

  public function checkout(Request $request)
  {

    return view('checkout.product-checkout', [
      'product' => $request->product,
      'price_id' => $request->price_id,
      'coupon_id' => $request->coupon_id,
      'payment_mode' => $request->mode,
    ]);
  }

  public function checkoutStripe(Request $request)
  {
    \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));


    $lineItems = [];
    $lineItems[] = [
      [
        'price' => $request->price_id,
        'quantity' => 1,
      ]
    ];

    $checkout_session = \Stripe\Checkout\Session::create([
      'ui_mode' => 'embedded',
      'line_items' => $lineItems,
      'mode' => $request->mode,
      'customer_email' => Auth::user()->email,
      // For Applying pre-filled discount
      'discounts' => [
        ['coupon' => $request->coupon_id],
      ],

      'return_url' => 'https://jetship.test/',
    ]);

    return $checkout_session->client_secret;

    // for storing order in database
    // $order = new Order();
    // $order->status = 'Unpaid';
    // $order->total_price = $totalPrice;
    // $order->session_id = $checkout_session->id;
    // $order->save();

    // return redirect($checkout_session->url);
  }

  public function success(Request $request)
  {

    \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

    $sessionId = $request->get('session_id');
    $customer = null;

    try {
      $session = \Stripe\Checkout\Session::retrieve($sessionId);

      // dd($session);
      if (!$session) {
        throw new NotFoundHttpException();
      }

      // make status of order as paid
      // $order = Order::where('session_id', $sessionId)->first();
      // if ($order && $order->status == 'Unpaid') {
      //   $order->status = 'Paid';
      //   $order->save();
      // }

      // if (!$order) {
      //   throw new NotFoundHttpException();
      // }
    } catch (\Throwable $th) {
      throw new NotFoundHttpException();
    }

    return view('products.checkout-success');
  }

  public function cancel(Request $request)
  {
    return view('products.checkout-cancel');
  }

  public function webhook()
  {
    // This is your Stripe CLI webhook secret for testing your endpoint locally.
    $endpoint_secret = env('STRIPE_WEBHOOK_SECRET');

    $payload = @file_get_contents('php://input');
    $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
    $event = null;

    try {
      $event = \Stripe\Webhook::constructEvent(
        $payload,
        $sig_header,
        $endpoint_secret
      );
    } catch (\UnexpectedValueException $e) {
      // Invalid payload
      http_response_code(400);
      exit();
    } catch (\Stripe\Exception\SignatureVerificationException $e) {
      // Invalid signature
      http_response_code(400);
      exit();
    }

    // Handle the event
    switch ($event->type) {
      case 'checkout.session.completed':
        $session = $event->data->object;
        $sessionId = $session->id;

        $order = Order::where('session_id', $sessionId)->first();
        if ($order && $order->status == 'Unpaid') {
          $order->status = 'Paid';
          $order->save();
        }


        if (!$order) {
          throw new NotFoundHttpException();
        }
      default:
        echo 'Received unknown event type ' . $event->type;
    }

    http_response_code(200);
  }
}
