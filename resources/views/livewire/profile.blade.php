 <!-- Styles <div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
</div>
-->

<div class="max-w-xl mx-auto p-4">

    @if (session()->has('message'))
        <div class="p-2 mb-4 bg-green-200 text-green-800 rounded">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="updateProfile" class="space-y-4">

        <div>
            <label class="block">Name</label>
            <input wire:model="name" type="text" class="border rounded p-2 w-full">
        </div>

        <div>
            <label class="block">Email</label>
            <input wire:model="email" type="email" class="border rounded p-2 w-full">
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">
            Save
        </button>
    </form>
</div>