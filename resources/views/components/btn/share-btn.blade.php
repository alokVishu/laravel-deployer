 @if (config('app.share_this_enabled'))
   <button class="btn btn-gray btn-circle st-custom-button" data-network="facebook">
     @svg('tabler-brand-facebook', 'w-[22px]')
   </button>
   <button class="btn btn-gray btn-circle st-custom-button" data-network="twitter">
     @svg('tabler-brand-x', 'w-[22px]')
   </button>
   <button class="btn btn-gray btn-circle st-custom-button" data-network="pinterest">
     @svg('tabler-brand-pinterest', 'w-[22px]')
   </button>
   <button class="btn btn-gray btn-circle st-custom-button" data-network="reddit">
     @svg('tabler-brand-reddit', 'w-[22px]')
   </button>
   <button class="btn btn-gray btn-circle st-custom-button" data-network="gmail">
     @svg('tabler-brand-gmail', 'w-[22px]')
   </button>
 @endif
