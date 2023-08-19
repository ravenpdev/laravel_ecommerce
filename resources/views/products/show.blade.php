<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="grid grid-cols-2 gap-4 border-b border-gray-200 bg-white p-6">
                    <div class="col-span-1 grid">
                        Image gallery
                    </div>
                    <div class="col-span-1 space-y-6 p-6">
                        <div>
                            <h1>{{ $product->title }}</h1>
                            <h1 class="mt-2 text-xl font-semibold">
                                {{ $product->formattedPrice() }}
                            </h1>
                            <p class="mt-2 text-gray-500">
                                {{ $product->description }}
                            </p>
                        </div>

                        <div class="mt-6">
                            <livewire:product-selector :product="$product" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
