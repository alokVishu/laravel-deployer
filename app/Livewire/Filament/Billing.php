<?php

namespace App\Livewire\Filament;

use App\Models\Config;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Billing extends Component
{
  public $userPlanName;
  public $productsCollection;
  public $currentProduct;
  public $stripeCustomerId;
  public $lemonSqueezyCustomerPortalUrl;
  public $intervals;
  public $selectedInterval;
  public $selectedPlanName;
  public $selectedPlan;

  public function collectIntervals()
  {
    $intervals = [];

    // Use flatMap to extract the intervals from the prices and pluck to get the interval values
    $intervals = $this->productsCollection->flatMap(function ($product) {
      return collect($product->prices)->pluck('interval');
    })->unique()->values()->all();

    $this->intervals =  $intervals;
  }

  public function getStripeCustomerPlan()
  {
    \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
    $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET_KEY'));
    $userEmail = Auth::user()->email;
    $userData =  $stripe->customers->all(['email' => $userEmail]);

    if ($userData->data) {
      $stripe_customer_id = $userData->data[0]->id;
      $customer = \Stripe\Customer::retrieve($stripe_customer_id);

      $subscriptions = \Stripe\Subscription::all(['customer' => $customer->id]);

      // Check for active subscriptions
      $activeSubscription = null;
      foreach ($subscriptions->data as $subscription) {
        if ($subscription->status == 'active') {
          $activeSubscription = $subscription;
          break;
        }
      }

      if ($activeSubscription) {
        // Retrieve subscription plan details
        $plan = $activeSubscription->items->data[0]->plan;
        $this->userPlanName = $plan->nickname;

        $this->stripeCustomerId = $stripe_customer_id;
      }
    }
  }

  public function getLemonSqueezyCustomerPlan()
  {
    $user = Auth::user();

    // Define the Lemon Squeezy API endpoint
    $url = 'https://api.lemonsqueezy.com/v1/subscriptions';

    // Send the request to Lemon Squeezy API to get all subscriptions
    $response = Http::withToken(env('LEMON_SQUEEZY_API_KEY'))->get($url);

    // Check if the request was successful
    if ($response->successful()) {
      $subscriptions = $response->json()['data'];
      // dd($subscriptions);
      // Filter the subscriptions to find the one with the matching email
      $userSubscription = collect($subscriptions)->firstWhere('attributes.user_email', $user->email);

      if ($userSubscription) {
        $this->userPlanName = $userSubscription['attributes']['variant_name'];
        $this->lemonSqueezyCustomerPortalUrl = $userSubscription['attributes']['urls']['customer_portal'];
      }
    }
  }

  public function mount()
  {
    if (json_decode(Config::get('app.products'))) {
      // Check if the payment provider is Stripe
      if (config('app.payment_provider') == 'stripe') {
        $this->getStripeCustomerPlan();
        $productsCollection = Collect(json_decode(Config::get('app.products')));
        $this->productsCollection = $productsCollection;
        $plan = $productsCollection->first();

        if (property_exists($plan, 'oneoff')) {
          $this->selectedPlan = $plan->prices[0];
          $this->selectedPlanName = $this->selectedPlan->name;
        } else {
          $this->selectedPlan = $plan;
          $this->selectedPlanName = $this->selectedPlan->name;
          $this->selectedInterval = 'yearly';
        }

        $this->currentProduct = $productsCollection->firstWhere('name', $this->userPlanName);
      }

      // Check if the payment provider is Lemon Squeezy
      if (config('app.payment_provider') == 'lemonsqueezy') {
        $this->getLemonSqueezyCustomerPlan();
        $productsCollection = Collect(json_decode(Config::get('app.products')));
        $this->productsCollection = $productsCollection;
        $plan = $productsCollection->first();

        if (property_exists($plan, 'oneoff')) {
          $this->selectedPlan = $plan->prices[0];
          $this->selectedPlanName = $this->selectedPlan->name;
        } else {
          $this->selectedPlan = $plan;
          $this->selectedPlanName = $this->selectedPlan->name;
          $this->selectedInterval = 'yearly';
        }

        $this->currentProduct = $productsCollection->firstWhere('name', $this->userPlanName);
      }

      $this->collectIntervals();
    }
  }

  public function render()
  {
    return view('livewire.filament.billing');
  }

  public function redirectToBillingPortal()
  {
    if (config('app.payment_provider') == 'stripe') {
      \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

      $session = \Stripe\BillingPortal\Session::create([
        'customer' => $this->stripeCustomerId,
        'return_url' => route('filament.dashboard.pages.billing'),
      ]);

      // Redirect to the customer portal
      return redirect($session->url);
    }

    if (config('app.payment_provider') == 'lemonsqueezy') {
      return redirect($this->lemonSqueezyCustomerPortalUrl);
    }
  }

  public function setSelectedInterval($interval)
  {
    $this->selectedInterval = $interval;
  }

  public function getPlanForOneOff($productsCollection, $planName)
  {
    foreach ($productsCollection as $product) {
      foreach ($product->prices as $price) {
        if ($price->name === $planName) {
          return $price;
        }
      }
    }
  }

  public function setSelectedPlan($planName)
  {
    $this->selectedPlanName = $planName;
    $productsCollection = Collect(json_decode(Config::get('app.products')));

    if ($productsCollection->firstWhere('oneoff')) {
      $this->selectedPlan = $this->getPlanForOneOff($productsCollection, $planName);
    } else {
      $this->selectedPlan = $productsCollection->firstWhere('name', $planName);
    }
  }

  public function getPrice($product, $match)
  {
    // Find the price for the selected interval
    if (property_exists($product, 'prices')) {

      foreach ($product->prices as $price) {
        // dd($price->interval);
        if (property_exists($price, 'interval') && $price->interval === $match) {
          return $price->price;
        }
        if (property_exists($price, 'name') && $price->name === $match) {

          return $price->price;
        }
      }
    }
    return null; // or throw an exception if interval is not found
  }

  public function getPriceId()
  {
    // Find the price for the selected interval
    if ($this->selectedPlan) {
      foreach ($this->selectedPlan->prices as $price) {
        if (property_exists($price, 'interval') && $price->interval === $this->selectedInterval) {
          return $price->price_id;
        }
        if (property_exists($price, 'name') && $price->name === $this->selectedInterval) {
          return $price->price_id;
        }
      }
    }
    return null; // or throw an exception if interval is not found
  }
}
