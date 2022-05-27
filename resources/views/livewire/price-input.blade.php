<div>
    <x-shared.form.input type="number" name="price" id="price" label="Price" wire:model="price"/>
    @if($this->price)
        <span class="mt-2 ml-2 text-sm text-black">{{$this->formattedPrice}}</span>
    @endif
</div>
