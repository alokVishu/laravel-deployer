<div class="py-36">
  <div class="text-center pb-20">
    <h2 class="mb-3">Frequently asked questions</h2>
    <p>Check out the full FAQ for more information about JetShip.</p>
  </div>
  <div class="grid lg:grid-cols-2 grid-cols-1  gap-12">
    <div class="">

      <div class="accordion accordion-bordered bg-purple-200 divide-neutral/20 divide-y">
        @foreach ($LeftAccordionFaqs as $faq)
          <div class="accordion-item" id="payment-arrow-right">
            <button class="accordion-toggle inline-flex items-center justify-between py-3 text-start "
              aria-controls="payment-arrow-right-collapse">
              {{ $faq['question'] }}
              <span
                class="icon-[tabler--chevron-down] accordion-item-active:rotate-180 size-5 transition-all rtl:rotate-180"></span>
            </button>
            <div id="payment-arrow-right-collapse"
              class="accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
              aria-labelledby="payment-arrow-right">
              <div class="px-5 pb-4">
                <p class="text-base-content/80 font-normal">
                  {{ $faq['answer'] }}
                </p>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>

    <div class="">
      <div class="accordion accordion-bordered bg-purple-200 divide-neutral/20 divide-y">
        @foreach ($RightAccordionFaqs as $faq)
          <div class="accordion-item" id="payment-arrow-right">
            <button class="accordion-toggle inline-flex items-center justify-between py-3 text-start"
              aria-controls="payment-arrow-right-collapse">
              {{ $faq['question'] }}
              <span
                class="icon-[tabler--chevron-down] accordion-item-active:rotate-180 size-5 transition-all rtl:rotate-180"></span>
            </button>
            <div id="payment-arrow-right-collapse"
              class="accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
              aria-labelledby="payment-arrow-right">
              <div class="px-5 pb-4">
                <p class="text-base-content/80 font-normal">
                  {{ $faq['answer'] }}
                </p>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
