<div class="max-w-7xl my-6 border-2 border-primary/30 rounded-xl bg-card mx-auto">

  <!-- Pricing Details -->
  <div class="w-full overflow-x-auto">
    <table class="table pricing-table">
      <tbody>

        {{-- Header --}}
        <tr class="divide-x divide-base-content/10 rtl:divide-x-reverse">
          <td class="p-6">
            <h2 class="font-semibold text-primary capitalize mb-3">Pricing Details</h2>
            <p class="mb-1">
              <span class="badge badge-soft badge-error me-2">Upto 40% off</span>
              <span class="text-xl font-semibold capitalize">for First 100 Customers.</span>
            </p>
            <p>All-inclusive pricing. Shop now and save big!</p>
          </td>
          @foreach ($plans as $plan)
            <td class="p-6 text-center">
              <h2 class="font-bold text-primary">{{ $plan['name'] }}</h2>
              <p class="py-1"><s>${{ $plan['originalPrice'] }}</s> ${{ $plan['discountedPrice'] }}</p>
              <span class="text-sm text-base-content/50">{{ $plan['duration'] }}</span>
            </td>
          @endforeach
        </tr>

        <!-- License Details -->
        <tr class="bg-primary/10 divide-x divide-base-content/10">
          <td class="px-5 py-3 text-left text-xl font-semibold text-primary">License
            Details</td>
          <td></td>

          <td></td>
        </tr>
        @foreach ($licenseDetails['details'] as $detail)
          <tr class="divide-x divide-base-content/10 text-base-content/90">
            <td class="px-4 py-2">{{ $detail['item'] }}</td>
            <td class="px-4 py-2 text-center">
              @if (is_bool($detail['Pro']))
                @if ($detail['Pro'])
                  @svg('tabler-circle-check', 'w-6 h-6 text-primary mx-auto')
                @else
                  @svg('tabler-circle-x', 'w-6 h-6 text-red-500 mx-auto')
                @endif
              @else
                {{ $detail['Pro'] }}
              @endif
            </td>
            <td class="px-4 py-2 text-center">
              @if (is_bool($detail['Pro']))
                @if ($detail['Teams'])
                  @svg('tabler-circle-check', 'w-6 h-6 text-primary mx-auto')
                @else
                  @svg('tabler-x', 'w-6 h-6 text-red-500 mx-auto')
                @endif
              @else
                {{ $detail['Teams'] }}
              @endif
            </td>
          </tr>
        @endforeach

        <!-- Features -->
        <tr class="bg-primary/10 divide-x divide-base-content/10">
          <td class="px-5 py-3 text-left text-xl font-semibold text-primary">Features</td>
          <td></td>
          <td></td>
        </tr>

        @foreach ($features['items'] as $feature)
          {{-- {{ $feature }} --}}
          <tr class="divide-x divide-base-content/10 text-base-content/90">
            <td class="px-4 py-2">{{ $feature['feature'] }}</td>
            <td class="px-4 py-2">
              @if (is_bool($detail['Pro']))
                @if ($detail['Pro'])
                  @svg('tabler-circle-check', 'w-6 h-6 text-primary mx-auto')
                @else
                  @svg('tabler-x', 'w-6 h-6 text-red-500 mx-auto')
                @endif
              @else
                {{ $detail['Pro'] }}
              @endif
            </td>
            <td class="px-4 py-2">
              @if (is_bool($detail['Teams']))
                @if ($detail['Teams'])
                  @svg('tabler-circle-check', 'w-6 h-6 text-primary mx-auto')
                @else
                  @svg('tabler-x', 'w-6 h-6 text-red-500 mx-auto')
                @endif
              @else
                {{ $detail['Teams'] }}
              @endif
            </td>
          </tr>
        @endforeach

        {{-- CTA --}}

        <tr class="divide-x rtl:divide-x-reverse divide-base-content/10 *:text-center *:py-4">
          <td></td>
          <td>
            <button class="btn btn-gradient btn-primary">JetShip Pro</button>
          </td>
          <td>
            <button class="btn btn-gradient btn-primary">JetShip Teams</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>

</div>
