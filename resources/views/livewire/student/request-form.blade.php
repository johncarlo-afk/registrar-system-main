<div class="max-w-xl mx-auto mt-10 p-4 bg-white rounded shadow">
    <h2 class="text-xl font-bold mb-4">Request a Document</h2>

    @if (session()->has('message'))
        <div class="mb-4 text-green-600">{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="submit">
        <label class="block mb-2">Select Document</label>
        <select wire:model="document_type" class="w-full mb-4 border rounded p-2">
            <option value="">-- Choose --</option>
            <option value="COE">Certificate of Enrollment</option>
            <option value="COG">Certificate of Good Moral</option>
            <option value="COR">Certificate of Registration</option>
        </select>

        @error('document_type') <span class="text-red-600">{{ $message }}</span> @enderror

        <button type="submit" class="bg-blue-600 text-black px-4 py-2 rounded">
            Submit Request
        </button>
    </form>
</div>
