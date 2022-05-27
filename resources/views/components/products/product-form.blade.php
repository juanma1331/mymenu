@props(['product' => null])

<form action="{{ null === $product ? route('products.store') : route('products.update', ['product' => $product->id]) }}"
      method="POST"
      enctype="multipart/form-data"
      class="
          p-4
          bg-white
          rounded-sm
          shadow-lg
          flex flex-col gap-6
          "
>
    @csrf
    @if (null !== $product)
        @method('PATCH')
    @endif
    <div class="flex flex-col gap-4">
        <x-shared.form.input type="text" name="name" id="name" label="Name" value="{{ $product !== null ? $product->name : '' }}" />
        <x-shared.form.textarea name="description" id="description" label="Description" value="{{ $product !== null ? $product->description : '' }}"/>
        <livewire:price-input price="{{ $product !== null ? $product->price : 0 }}" />

        @if (null !== $product)
            <img class="h-[120px] max-w-[240px] aspect-video object-cover" src="{{ asset($product->image) }}" alt="">
        @endif

        <x-shared.form.input type="file" name="image" id="image" label="Image" />
    </div>


    <div class="flex items-center gap-4">
        <x-shared.button buttonType="submit" type="primary">
            {{ null === $product ? 'Create' : 'Edit' }}
        </x-shared.button>

        <a class="text-primary hover:underline" href="{{ route('products.index') }}">Back</a>
    </div>

</form>
