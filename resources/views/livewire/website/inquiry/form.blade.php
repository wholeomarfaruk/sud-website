<div class="w-full max-w-xl">

    @if(session()->has('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="submit" class="space-y-4">

        <input
            type="text"
            wire:model="name"
            placeholder="Name"
            class="w-full border rounded p-2"
        >

        <input
            type="text"
            wire:model="phone"
            placeholder="Phone"
            class="w-full border rounded p-2"
        >

        <input
            type="email"
            wire:model="email"
            placeholder="Email"
            class="w-full border rounded p-2"
        >

        <input
            type="text"
            wire:model="subject"
            placeholder="Subject"
            class="w-full border rounded p-2"
        >

        <textarea
            wire:model="message"
            placeholder="Message"
            class="w-full border rounded p-2"
            rows="4"
        ></textarea>

        <button
            type="submit"
            class="bg-blue-600 text-white px-4 py-2 rounded"
        >
            Send Message
        </button>

    </form>

</div>
