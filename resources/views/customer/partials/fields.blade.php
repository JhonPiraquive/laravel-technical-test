<div>
    <x-input-label for="name" :value="__('text.attributes.name')" />
    <x-text-input disabled="{{ $disabled }}" id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $customer->name)" required/>
    <x-input-error :messages="$errors->get('name')" class="mt-2" />
</div>

<div>
    <x-input-label for="email" :value="__('text.attributes.email')" />
    <x-text-input disabled="{{ $disabled }}" id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $customer->email)" required/>
    <x-input-error :messages="$errors->get('email')" class="mt-2" />
</div>

<div>
    <x-input-label for="phone" :value="__('text.attributes.phone')" />
    <x-text-input disabled="{{ $disabled }}" id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('phone', $customer->phone)" required/>
    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
</div>

<div>
    <x-input-label for="address" :value="__('text.attributes.address')" />
    <x-text-area disabled="{{ $disabled }}" id="address" name="address" class="mt-1 block w-full" required value="{{ $customer->address }}" />
    <x-input-error :messages="$errors->get('address')" class="mt-2" />
</div>
