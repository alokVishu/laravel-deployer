<?php

namespace App\Livewire\Checkout;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CheckoutForm extends Component
{
  public $intro;

  public $name;

  public $email;

  public $password;

  public $paymentProvider;

  public $recaptcha;

  public $product;

  public $priceId;

  public $paymentMode;

  public $couponId;

  private $paymentProviders = [];

  public function render()
  {
    return view('livewire.checkout.checkout-form', [
      'userExists' => $this->userExists($this->email),

    ]);
  }

  protected function userExists(?string $email): bool
  {
    if ($email === null) {
      return false;
    }

    return User::where('email', $email)->exists();
  }

  public function registerUser()
  {
    $this->validate([
      'name' => 'required',
      'email' => 'required|email',
      'password' => 'required|min:8',
    ]);

    $user = User::create([
      'name' => $this->name,
      'email' => $this->email,
      'password' => bcrypt($this->password),
    ]);

    Auth::login($user);
  }

  public function loginUser()
  {
    $this->validate([
      'email' => 'required|email',
      'password' => 'required',
    ]);

    if (!Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
      $this->addError('email', 'Invalid credentials');

      return;
    }
  }

  public function mount($product)
  {

    $this->product = $product;
  }
}
