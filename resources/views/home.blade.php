<x-layouts.app>
  {{-- hero section --}}
  <x-section.hero></x-section.hero>
  {{-- end hero section --}}

  {{-- stack --}}
  <x-tech-stack class="lg:-mt-[90px]"></x-tech-stack>

  <div class="container">

    {{-- Features --}}
    <div class="pt-[9.375rem]">
      <div class="flex flex-col items-center justify-center">
        <h2 class="text-3xl font-semibold text-base-content w-3/4 text-center mx-auto">
          <span>
            Build, Brand, and
            <span class="relative font-bold">
              Launch Your Dream Saas
              <span
                class="h-1 w-full bg-gradient-to-r from-primary/40  to-primary/0 start-0 -bottom-1 rounded-full absolute"
                aria-hidden="true"></span>
            </span>
            in Record
            Time
          </span>
        </h2>
        <p
          class="text-xl bg-gradient-to-l to-base-content/80 from-[#9295b366] bg-clip-text text-fill-transparent text-center w-1/2 mx-auto mt-2">
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
                'icon' => 'tabler-plane-departure',
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

      <div class="h-[1px] w-2/5 mx-auto section-divider"></div>

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

      <div class="h-[1px] w-2/5 mx-auto section-divider"></div>

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
                'icon' => 'tabler-user',
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

      <div class="h-[1px] w-2/5 mx-auto section-divider"></div>

      <x-section.feature-section feature-title="Offering" title="Subscriptions & One-Time Purchases"
        description="Easily offer subscription-based and one-time purchase products." feature-icon="tabler-report-money"
        feature-image="{{ asset('images/pages/feature-section-dashboard.png') }}" :reverse="true" :features="[
            [
                'icon' => 'tabler-credit-card',
                'title' => 'One-Time Purchase',
                'description' => 'Supports both subscription and one-time purchase products.',
            ],
            [
                'icon' => 'tabler-box',
                'title' => 'Webhooks',
                'description' => 'Manages all necessary webhooks automatically.',
            ],
            [
                'icon' => 'tabler-brand-paypal',
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

      <div class="h-[1px] w-2/5 mx-auto section-divider"></div>

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

      <div class="h-[1px] w-2/5 mx-auto section-divider"></div>

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

    {{-- Additional Features --}}
    <div>
      <x-section.additional-features></x-section.additional-features>
    </div>

    {{-- Customer Reviews --}}
    <div>
      <x-section.customer-reviews></x-section.customer-reviews>
    </div>

  </div>

  <div class="divider"></div>
  <div class="container">

    {{-- Ship Your Saas --}}
    <div class="py-36">
      <div class="flex flex-col items-center justify-center">
        <h2 class="text-3xl font-semibold text-base-content w-3/4 text-center mx-auto">
          <span>
            Fast-Track Yours
            <span class="relative font-bold">
              SaaS Launch 🚀
              <span
                class="h-1 w-full bg-gradient-to-r from-primary/40  to-primary/0 start-0 -bottom-1 rounded-full absolute"
                aria-hidden="true"></span>
            </span>
          </span>
        </h2>
        <p
          class="text-xl bg-gradient-to-l to-base-content/80 from-[#9295b366] bg-clip-text text-fill-transparent text-center w-1/2 mx-auto mt-2">
          Shave Weeks Off Your Development Time - Production-Ready in a Flash</p>
      </div>

      <div class="w-1/2 mx-auto mt-20">
        <ul class="space-y-5">
          <li class="flex items-center space-x-3 rtl:space-x-reverse">
            <div>@svg('tabler-circle-check', 'w-7 h-7 text-primary')</div>
            <span class="text-base-content/90"> <span class="font-semibold">Lifetime Access</span> to LaraSaaS starter
              kit (GitHub access will be removed after 1 year, but the product can be downloaded from customer portal)
            </span>
          </li>

          <li class="flex items-center space-x-3 rtl:space-x-reverse">
            <div>@svg('tabler-circle-check', 'w-7 h-7 text-primary')</div>
            <span class="text-base-content/90"><span class="font-semibold">Build Unlimited Applications</span> (If we do
              not allow this, we will be behind the competition) </span>
          </li>

          <li class="flex items-center space-x-3 rtl:space-x-reverse">
            <div>@svg('tabler-circle-check', 'w-7 h-7 text-primary')</div>
            <span class="text-base-content/90"> <span class="font-semibold">Regular Updates</span> (Includes packages,
              features, bug fixes, examples etc.) </span>
          </li>

          <li class="flex items-center space-x-3 rtl:space-x-reverse">
            <div>@svg('tabler-circle-check', 'w-7 h-7 text-primary')</div>
            <span class="text-base-content/90"><span class="font-semibold">One-time</span> payment, no
              subscription</span>
          </li>

          <li class="flex items-center space-x-3 rtl:space-x-reverse">
            <div>@svg('tabler-circle-check', 'w-7 h-7 text-primary')</div>
            <span class="text-base-content/90"><span class="font-semibold">Landing page, 10+</span> useful <span
                class="font-semibold">pages, 100+</span>
              Ready to <span class="font-semibold">use components</span></span>
          </li>

          <li class="flex items-center space-x-3 rtl:space-x-reverse">
            <div>@svg('tabler-circle-check', 'w-7 h-7 text-primary')</div>
            <span class="text-base-content/90"><span class="font-semibold">Design File</span> availability (should we
              provide design file in all the
              license?)</span>
          </li>

          <li class="flex items-center space-x-3 rtl:space-x-reverse">
            <div>@svg('tabler-circle-check', 'w-7 h-7 text-primary')</div>
            <span class="text-base-content/90">Access to the <span class="font-semibold">Roadmap</span> with the ability
              to make feature requests or vote for upcoming features</span>
          </li>

          <li class="flex items-center space-x-3 rtl:space-x-reverse">
            <div>@svg('tabler-circle-check', 'w-7 h-7 text-primary')</div>
            <span class="text-base-content/90">Membership in the <span class="font-semibold">Discord
                Community</span></span>
          </li>

          <li class="flex items-center space-x-3 rtl:space-x-reverse">
            <div>@svg('tabler-circle-check', 'w-7 h-7 text-primary')</div>
            <span class="text-base-content/90"><span class="font-semibold">Premium Support</span> via GitHub
              Issues</span>
          </li>
        </ul>
      </div>
    </div>

    {{-- Pricing Table --}}
    <x-landing-page.pricing-table title="Pricing Details"
      promoMessage='UP TO <span class="text-red-500 font-bold">40% OFF</span> for First 100 Customers.<br>All-inclusive pricing. Shop now and save big!'
      :plans="[
          [
              'name' => 'Pro',
              'originalPrice' => 249,
              'discountedPrice' => 149,
              'duration' => 'lifetime',
              'details' => ['Unlimited', 'Lifetime', '1', '12 Months'],
              'features' => [true, true, true, true, true, true, true, true, true, true, true, true, true],
              'ctaText' => 'JetShip Pro',
              'ctaLink' => '#',
          ],
          [
              'name' => 'Teams',
              'originalPrice' => 399,
              'discountedPrice' => 249,
              'duration' => 'lifetime',
              'details' => ['Unlimited', 'Lifetime', 'Unlimited', 'Lifetime', 'h-6 w-6 text-purple-600'],
              'features' => [true, true, true, true, true, true, true, true, true, true, true, true, true],
              'ctaText' => 'JetShip Teams',
              'ctaLink' => '#',
          ],
      ]" :licenseDetails="[
          'header' => 'License Details',
          'details' => [
              ['item' => 'Projects', 'Pro' => 'Unlimited', 'Teams' => 'Unlimited'],
              ['item' => 'Repository Users', 'Pro' => 'Lifetime', 'Teams' => 'Lifetime'],
              ['item' => 'Repository Users', 'Pro' => '1', 'Teams' => 'Unlimited'],
              ['item' => 'Premium Support (GitHub Issues)', 'Pro' => '12 Months', 'Teams' => 'Lifetime'],
              ['item' => 'Community Support', 'Pro' => true, 'Teams' => true],
          ],
      ]" :features="[
          'header' => 'Features',
          'items' => [
              ['feature' => 'Beautiful Checkout', 'Pro' => true, 'Teams' => true],
              ['feature' => 'Easy Payments (Stripe & Lemon Squeezy)', 'Pro' => true, 'Teams' => true],
              ['feature' => 'Subscriptions & One-Time Purchases', 'Pro' => true, 'Teams' => true],
              ['feature' => 'Customer Portal', 'Pro' => true, 'Teams' => true],
              ['feature' => 'Delightful Admin Panel', 'Pro' => true, 'Teams' => true],
              ['feature' => 'User Management (Roles, Access Control & Impersonation)', 'Pro' => true, 'Teams' => true],
              ['feature' => 'Brand Your SaaS', 'Pro' => true, 'Teams' => true],
              ['feature' => 'Ready-to-Use Components', 'Pro' => true, 'Teams' => true],
              ['feature' => 'Modern Authentication (Social Logins)', 'Pro' => true, 'Teams' => true],
              ['feature' => 'Email Providers (Mailgun, Postmark, Amazon SES)', 'Pro' => true, 'Teams' => true],
              ['feature' => 'SEO Ready Blog', 'Pro' => true, 'Teams' => true],
              ['feature' => 'Reviews & Roadmap', 'Pro' => true, 'Teams' => true],
          ],
      ]">
    </x-landing-page.pricing-table>

    {{-- Customization Card --}}
    <div
      class="flex flex-col lg:flex-row items-center p-6 bg-card border-2 border-primary/30 rounded-lg justify-between max-w-7xl mx-auto">
      <div class="flex flex-col">
        <div class="flex items-center justify-center gap-x-1.5 mb-2.5">
          <h2 class="text-primary">
            Customization?
          </h2>
          @svg('tabler-info-circle', 'h-8 w-8 text-primary')
        </div>
        <div class="text-xl font-semibold text-base-content/90 my-1"><s
            class="text-xl font-medium text-base-content/80">$1299</s> Start
          At <span class="font-bold text-2xl">$1199</span>
        </div>
        <span class="badge badge-soft badge-error">UP TO 20% OFF</span>
      </div>
      <div>
        <ul class="space-y-2">
          <li class="flex items-center space-x-3 rtl:space-x-reverse">
            <span class="border-primary text-primary flex items-center justify-center rounded-full border p-0.5">
              <span class="icon-[tabler--check] size-4 rtl:rotate-180"></span>
            </span>
            <span class="text-base-content/80">Everything from Team Plan</span>
          </li>
          <li class="flex items-center space-x-3 rtl:space-x-reverse">
            <span class="border-primary text-primary flex items-center justify-center rounded-full border p-0.5">
              <span class="icon-[tabler--check] size-4 rtl:rotate-180"></span>
            </span>
            <span class="text-base-content/80">Customized Landing Page</span>
          </li>
          <li class="flex items-center space-x-3 rtl:space-x-reverse">
            <span class="border-primary text-primary flex items-center justify-center rounded-full border p-0.5">
              <span class="icon-[tabler--check] size-4 rtl:rotate-180"></span>
            </span>
            <span class="text-base-content/80">Code Review Services</span>
          </li>
          <li class="flex items-center space-x-3 rtl:space-x-reverse">
            <span class="border-primary text-primary flex items-center justify-center rounded-full border p-0.5">
              <span class="icon-[tabler--check] size-4 rtl:rotate-180"></span>
            </span>
            <span class="text-base-content/80">Server Setup & Deployment</span>
          </li>
        </ul>
      </div>
      <div>
        <button class="btn btn-gradient btn-primary">Get In Touch</button>
      </div>
    </div>

    {{-- Discord Invite --}}
    <div
      class="flex flex-col md:flex-row items-center justify-between px-12 py-9 bg-card border border-base-content/10 rounded-lg mt-36">
      <div class="flex items-center space-x-10 mb-4 md:mb-0">
        <img src="{{ asset('images/pages/discord-server.png') }}" alt="Discord Logo">
        <div class="max-w-2xl">
          <h3 class="mb-3.5">Join our Discord server</h3>
          <p>Millennials find value in Discord through professional networking, connecting with
            industry peers, sharing insights, and collaborating on projects.</p>
        </div>
      </div>
      <button class="btn btn-primary btn-gradient">Join Server Now</button>
    </div>


    {{-- FAQ --}}
    <x-section.faq></x-section.faq>

    {{-- Startup Journey --}}
    <div class="border-2 border-primary rounded-lg p-6 sm:py-9 sm:px-12 bg-card text-center mb-36">
      <div class="mb-3">
        <div class="bg-primary/10 rounded-md p-1.5 inline-block">
          @svg('tabler-rocket', 'text-primary h-9 w-9')
        </div>
      </div>
      <div class="text-xl mb-3">Ready To Get Started?</div>
      <h2 class="mb-3">Your Startup Journey Starts Here.</h2>
      <p class="mb-8">Save months of development time and don't reinvent the wheel.</p>
      <button class="btn btn-gradient btn-primary">Get Jetship Now</button>
    </div>



    {{-- newsletter --}}
    <livewire:newsletter />
  </div>
</x-layouts.app>
