<x-layouts.blank>

  <div class="container">

    <div class="flex flex-col items-center justify-center py-8 w-4/5 mx-auto">
      <h2 class="text-3xl font-semibold text-gray-900 text-center">Build, Brand, and Launch Your Dream SaaS in Record
        Time
      </h2>
      <p
        class="text-xl bg-gradient-to-l to-base-content/80 from-[#9295b366] bg-clip-text text-fill-transparent text-center mt-2">
        JetShip is your all-in-one starter kit for building
        and launching
        a thriving subscription or one-time purchase SaaS business.</p>
    </div>

    <x-section.feature-section feature-title="Launch your app quickly" title="Production-Ready"
      description="JetShip provides all the essential tools and resources needed to launch your project efficiently"
      feature-icon="tabler-rocket" feature-image="{{ asset('images/pages/feature-section-dashboard.png') }}"
      :reverse="false" :features="[
          [
              'icon' => 'tabler-stack',
              'title' => 'Solid Tech-Stack',
              'description' =>
                  'Utilizes Laravel, TailwindCSS, Livewire, AlpineJS, and FilamentPHP for a powerful,scalable & developer-friendly experience.',
          ],
          [
              'icon' => 'tabler-plane',
              'title' => 'Ready for Production',
              'description' => 'No need to waste time on configurations; everything is set for deployment.',
          ],
          [
              'icon' => 'tabler-code',
              'title' => 'Clean Code',
              'description' =>
                  'A simple, clean, well-commented codebase that is fully customizable and easy to extend.',
          ],
          [
              'icon' => 'tabler-hand-click',
              'title' => '1-Click Deployment',
              'description' =>
                  'Deploy your SaaS swiftly with LaraSaaS\'s one-click deployment powered by PHP Deployer.',
          ],
      ]">
    </x-section.feature-section>

    <x-section.feature-section feature-title="Pre-configured Auth Process" title="Modern Authentication"
      description="Offers traditional logins and social logins through Google, GitHub, Twitter, and magic links."
      feature-icon="tabler-shield" feature-image="{{ asset('images/pages/feature-section-dashboard.png') }}"
      :reverse="true" :features="[
          [
              'icon' => 'tabler-brand-google',
              'title' => 'Social Sign-in',
              'description' =>
                  'Supports social sign-ins via Socialite with Google, GitHub, Twitter, LinkedIn, Facebook, GitLab, Bitbucket, and Slack.',
          ],
          [
              'icon' => 'tabler-link',
              'title' => 'Magic Links',
              'description' => 'Enables easy user sign-ins with email link authentication.',
          ],
          [
              'icon' => 'tabler-mail',
              'title' => 'Email Authentication',
              'description' => 'Allows email and password sign-ins, ensuring email verification.',
          ],
          [
              'icon' => 'tabler-key',
              'title' => 'Password Reset',
              'description' => 'Provides a self-service password recovery feature for users.',
          ],
      ]">
    </x-section.feature-section>

    <x-section.feature-section feature-title="Get Paid" title="Easy Payments"
      description="Accept payments seamlessly through popular gateways like Stripe or LemonSqueezy."
      feature-icon="tabler-credit-card" feature-image="{{ asset('images/pages/feature-section-dashboard.png') }}"
      :reverse="false" :features="[
          [
              'icon' => 'tabler-brand-stripe',
              'title' => 'Stripe Checkout',
              'description' => 'Securely accepts credit card payments directly on your site, without redirects.',
          ],
          [
              'icon' => 'tabler-lemon',
              'title' => 'Lemon Squeezy Support',
              'description' => 'An alternative to Stripe, handling sales tax and acting as a Merchant of Record.',
          ],
          [
              'icon' => 'tabler-users',
              'title' => 'Customer Portal',
              'description' =>
                  'Provides a secure admin dashboard for users to manage transactions, invoices, and plans.',
          ],
          [
              'icon' => 'tabler-shopping-cart',
              'title' => 'Beautiful Checkout',
              'description' => 'Enhances the user experience with a smooth checkout process.',
          ],
      ]">
    </x-section.feature-section>

    <x-section.feature-section feature-title="Offering" title="Subscriptions & One-Time Purchases"
      description="Easily offer subscription-based and one-time purchase products." feature-icon="tabler-report-money"
      feature-image="{{ asset('images/pages/feature-section-dashboard.png') }}" :reverse="true" :features="[
          [
              'icon' => 'tabler-receipt',
              'title' => 'One-Time Purchase',
              'description' => 'Supports both subscription and one-time purchase products.',
          ],
          [
              'icon' => 'tabler-webhook',
              'title' => 'Webhooks',
              'description' => 'Manages all necessary webhooks automatically.',
          ],
          [
              'icon' => 'tabler-credit-card',
              'title' => 'Payment Gateways',
              'description' => 'Supports both Stripe and Lemon Squeezy for easy payments.',
          ],
          [
              'icon' => 'tabler-layout-cards',
              'title' => 'Pricing Table',
              'description' => 'Automatically generates a pricing table based on admin-configured plans.',
          ],
      ]">
    </x-section.feature-section>

    <x-section.feature-section feature-title="Your SaaS" title="Delightful Admin Panel"
      description="A user-friendly interface for managing various aspects of your SaaS."
      feature-icon="tabler-layout-dashboard" feature-image="{{ asset('images/pages/feature-section-dashboard.png') }}"
      :reverse="false" :features="[
          [
              'icon' => 'tabler-users',
              'title' => 'Manage Users',
              'description' => 'Admins can view, create, update, or delete user details.',
          ],
          [
              'icon' => 'tabler-file-invoice',
              'title' => 'ACL',
              'description' => 'Allows creation and assignment of roles for granular user control.',
          ],
          [
              'icon' => 'tabler-face-id',
              'title' => 'Impersonation',
              'description' => 'Enables admins to impersonate users for support and debugging.',
          ],
          [
              'icon' => 'tabler-edit',
              'title' => 'Manage & Extend',
              'description' =>
                  'Manages login, email, and payment providers, roadmap and blog. Extend the admin panel as needed.',
          ],
      ]">
    </x-section.feature-section>

    <x-section.feature-section feature-title="Robust 2FA" title="Robust Multi-Provider Accounts and 2FA"
      description="JetShip offers top-tier security with 2-factor auth and multi-provider account linking. Enable effortless account security."
      feature-icon="tabler-device-mobile" feature-image="{{ asset('images/pages/feature-section-dashboard.png') }}"
      :reverse="true" :features="[
          [
              'icon' => 'tabler-credit-card',
              'title' => '2-Factor Auth',
              'description' =>
                  'JetShip includes support for 2-Factor Authentication and linking accounts to multiple providers.',
          ],
          [
              'icon' => 'tabler-box',
              'title' => 'Authenticator App Integration',
              'description' =>
                  'Our 2FA supports popular apps like Google Authenticator and Authy, enabling effortless account security.',
          ],
          [
              'icon' => 'tabler-brand-paypal',
              'title' => 'Versatile Account Linking',
              'description' =>
                  'Users can link their accounts with multiple providers like Google, Facebook, and Twitter for enhanced security.',
          ],
      ]">
    </x-section.feature-section>
  </div>

</x-layouts.blank>
