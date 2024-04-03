<style>
  .close-notif:hover {
      background-color:   #c0c0c0 !important;
      color: white; 
  }
  .close-notif {
    padding: 5px;
    border-radius: 6px; /* Border radius of the scrollbar thumb */
    margin-left: 5px;
  }
  
    </style>


@if(session()->has('error'))
 <div x-data="{show : true}" x-show="show" x-init="setTimeout(() => show = false, 5000)" class="fixed m-2 bottom-0 right-0 z-20" role="alert">
  <div id="toast-danger" class="flex items-center w-full max-w-lg p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 rounded-lg dark:bg-red-700 dark:text-red-200">
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
        </svg>
        <span class="sr-only">Error icon</span>
    </div>
    <div class="ms-3 text-sm font-normal">{{session('error')}}</div>
    <button @click="show = false" class="focus:outline-none close-notif">
        <svg class="w-4 h-4 text-gray-500 hover:text-gray-700 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
    </button>
  </div>
</div>
@endif
