<x-app :title="__('inventory/admin/product.title.add_product')">
    <div @class(['px-4', 'sm:flex sm:flex-col sm:items-center'])>
        <div @class(['sm:w-2/3', 'lg:w-1/2'])>
            <div @class(['mb-2 mt-16', 'sm:mt-4', 'lg:mt-0'])>
                <x-typography.heading level="1"
                                      :content="__('inventory/admin/product.heading.add_product')" />
            </div>
            <div @class(['mb-16 text-center'])>
                <p>{{ __('inventory/admin/product.description.subheading.add_product') }}</p>
            </div>
            <div @class(['mb-8'])>
                <x-form id="product-add-form"
                        action="{{ route('admin.product.create') }}"
                        enctype="multipart/form-data"
                        method="post">
                    <div @class(['flex flex-col gap-8 mb-4'])>
                        <div @class(['mx-auto mb-8'])>
                            <x-form.input id="product-image-field"
                                          name="image"
                                          type="file"
                                          accept="image/png, image/webp"
                                          :isInvalid="$errors->has('image')" />
                        </div>
                        <div @class(['mb-4'])>
                            <x-form.input id="product-barcode-field"
                                          name="barcode"
                                          type="text"
                                          value="{{ old('barcode') }}"
                                          required
                                          :label="__('inventory/admin/product.input.label.barcode')"
                                          :isInvalid="$errors->has('barcode')" />
                        </div>
                        <div @class(['flex flex-col gap-4 mb-4'])>
                            <x-form.input id="product-brand-field"
                                          name="brand"
                                          type="text"
                                          value="{{ old('brand') }}"
                                          required
                                          :label="__('inventory/admin/product.input.label.brand')"
                                          :isInvalid="$errors->has('brand')" />
                            <x-form.input id="product-name-field"
                                          name="name"
                                          type="text"
                                          value="{{ old('name') }}"
                                          required
                                          :label="__('inventory/admin/product.input.label.name')"
                                          :isInvalid="$errors->has('name')" />
                        </div>
                        <div @class(['flex flex-col gap-4 mb-4'])>
                            <x-form.input id="product-unit-count-field"
                                          name="unit_count"
                                          type="number"
                                          value="{{ old('unit_count') }}"
                                          min="0"
                                          required
                                          :label="__('inventory/admin/product.input.label.unit_count')"
                                          :isInvalid="$errors->has('unit_count')" />
                            <div @class(['flex gap-4'])>
                                <div @class(['flex-2'])>
                                    <x-form.input id="product-measure-value-field"
                                                  name="measure_value"
                                                  type="number"
                                                  value="{{ old('measure_value') }}"
                                                  min="0"
                                                  required
                                                  :label="__('inventory/admin/product.input.label.measure_value')"
                                                  :isInvalid="$errors->has('measure_value')" />
                                </div>
                                <div @class(['flex-1'])>
                                    <x-form.select id="product-measure-unit-select"
                                                   name="measure_unit"
                                                   required
                                                   :label="__('inventory/admin/product.select.label.measure_unit')"
                                                   :isInvalid="$errors->has('measure_unit')">
                                        @foreach (['g', 'mL'] as $unit)
                                            <option value="{{ $unit }}">{{ $unit }}</option>
                                        @endforeach
                                    </x-form.select>
                                </div>
                            </div>
                        </div>
                        <div>
                            <x-form.select id="product-category-select"
                                           name="category_id"
                                           :label="__('inventory/admin/product.select.label.category')"
                                           :isInvalid="$errors->has('category_id')">
                                <option value=""
                                        selected>-</option>
                                @foreach ($categories as $id => $name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </x-form.select>
                        </div>
                        <div @class(['min-h-8'])>
                            @foreach ($errors->keys() as $key)
                                <x-form.error :type="$key" />
                            @endforeach
                        </div>
                    </div>
                </x-form>
            </div>
            <div>
                <x-button.primary form="product-add-form"
                                  type="submit"
                                  :text="__('inventory/admin/product.button.submit.add_product.create')" />
            </div>
            <div @class(['flex justify-center mb-16 mt-8'])>
                <a href="{{ route('admin.products') }}"
                   @class([
                       'border-slate-700 dark:border-slate-300',
                       'focus:outline-sky-500',
                       'hover:bg-slate-700 dark:hover:bg-slate-300',
                       'hover:text-slate-300 dark:hover:text-slate-700',
                       'aspect-square border flex h-12 items-center justify-center rounded-full',
                       'focus:outline-1 focus:outline-offset-2',
                   ])>
                    <div @class(['h-6'])>
                        <x-icon component="icon.arrow-back" />
                    </div>
                </a>
            </div>
        </div>
    </div>
</x-app>
