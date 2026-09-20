<div class="space-y-6">
    <div class="text-center">
        <h2 class="text-2xl font-bold text-orange-900">{{ __('Demo Data Selection') }}</h2>
        <p class="mt-2 text-orange-600">{{ __('Choose a business line to populate your system with relevant demo data') }}</p>
    </div>

    <div class="space-y-4">
        <!-- Install Demo Data Toggle -->
        <div class="flex items-center justify-between p-4 bg-orange-50 rounded-xl border border-orange-100">
            <div>
                <h3 class="text-lg font-medium text-orange-900">{{ __('Install Demo Data') }}</h3>
                <p class="text-sm text-orange-600">{{ __('Populate your system with sample products, categories, and data') }}</p>
            </div>
            <label class="relative inline-flex items-center cursor-pointer">
                <input type="checkbox" wire:model.live="install_demo_data" class="sr-only peer">
                <div class="w-11 h-6 bg-orange-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-orange-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-orange-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-orange-600"></div>
            </label>
        </div>

        @if($install_demo_data)
            <!-- Business Line Selection -->
            <div class="space-y-4">
                <h3 class="text-lg font-medium text-orange-900">{{ __('Select Business Line') }}</h3>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
                    @php
                        $businessLines = [
                            'electronics' => ['name' => __('Electronics'), 'icon' => '📱', 'description' => __('Phones, laptops, gadgets')],
                            'automotive' => ['name' => __('Automotive'), 'icon' => '🚗', 'description' => __('Parts, accessories, tools')],
                            'fashion' => ['name' => __('Fashion'), 'icon' => '👕', 'description' => __('Clothing, shoes, accessories')],
                            'sports' => ['name' => __('Sports & Fitness'), 'icon' => '⚽', 'description' => __('Equipment, apparel, accessories')],
                            'furniture' => ['name' => __('Furniture'), 'icon' => '🪑', 'description' => __('Home, office furniture')],
                            'books' => ['name' => __('Books & Media'), 'icon' => '📚', 'description' => __('Books, magazines, media')],
                            'jewelry' => ['name' => __('Jewelry'), 'icon' => '💎', 'description' => __('Rings, necklaces, watches')],
                            'pharmacy' => ['name' => __('Pharmacy'), 'icon' => '💊', 'description' => __('Medicines, health products')],
                            'grocery' => ['name' => __('Grocery'), 'icon' => '🛒', 'description' => __('Food items, household goods')],
                            'restaurant' => ['name' => __('Restaurant'), 'icon' => '🍽️', 'description' => __('Food, beverages, supplies')]
                        ];@endphp

                    @foreach($businessLines as $key => $line)
                        <div class="relative">
                            <input type="radio" 
                                   id="business_{{ $key }}" 
                                   name="business_line" 
                                   value="{{ $key }}" 
                                   wire:model.live="selected_business_line"
                                   class="sr-only peer">
                            <label for="business_{{ $key }}" 
                                   class="flex flex-col items-center p-4 bg-white border-2 border-orange-100 rounded-xl cursor-pointer hover:bg-orange-50 peer-checked:border-orange-500 peer-checked:bg-orange-50 transition-all">
                                <div class="text-3xl mb-2">{{ $line['icon'] }}</div>
                                <div class="text-sm font-medium text-orange-900 text-center">{{ $line['name'] }}</div>
                                <div class="text-xs text-orange-500 text-center mt-1">{{ $line['description'] }}</div>
                            </label>
                        </div>
                    @endforeach
                </div>

                @error('selected_business_line')
                    <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Selected Business Line Preview -->
            @if($selected_business_line)
                <div class="p-4 bg-orange-50 border border-orange-200 rounded-xl">
                    <h4 class="font-medium text-orange-900">{{ __('Selected: :param_1', ['param_1' => $businessLines[$selected_business_line]['name']]) }}</h4>
                    <p class="text-sm text-orange-700 mt-1">
                        {{ __('This will install sample products, categories, and data relevant to the :param_1 industry.', ['param_1' => strtolower($businessLines[$selected_business_line]['name'])]) }}
                    </p>
                </div>
            @endif
        @else
            <div class="p-4 bg-amber-50 border border-amber-200 rounded-xl">
                <p class="text-amber-800">
                    <strong>{{ __('Note:') }}</strong> {{ __('You can always add demo data later from the admin panel if you choose to skip this step.') }}
                </p>
            </div>
        @endif
    </div>
</div>
