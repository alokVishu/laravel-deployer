@php
  $bgImgSrc = URL::asset('images/pages/hero-bg.png');
@endphp

<div
  {{ $attributes->merge(['class' => 'flex flex-col items-center justify-center bg-center bg-cover bg-no-repeat py-9 px-12 rounded-xl border border-primary text-center']) }}
  style="background-image: url('{{ $bgImgSrc }}');">
  <p class="text-primary">Stay Up-to-Date</p>
  <h3>Subscribe To Our Newsletter</h3>
  <p class="mb-7">You will never miss our updates, latest news etc.</p>
  <input type="text" class="input w-7/12 mb-7" placeholder="Your email address">
  <button class="btn btn-primary">Subscribe</button>
</div>
