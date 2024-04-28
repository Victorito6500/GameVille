<div class=" flex items-center justify-between p-4 mb-5 text-green-800 rounded-lg bg-green-100 {{ $show ? 'open-alert' : 'close-alert' }}"
    id="success_alert" role="alert">
    <div class="flex items-center">
        <i class="fa-solid fa-gamepad"></i>
        <div class="ms-3 text-sm font-medium">
            {{ $msg }}
        </div>
    </div>
    <button type="button" wire:click="closeAlert"
        class="ms-auto -mx-1.5 -my-1.5 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8">
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
    </button>
</div>
