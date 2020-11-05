<x-app-layout>
  <x-slot name="header">
    <h4 class="font-semibold text-xl text-gray-800 leading-tight">{{__('Create donor')}}</h4>
  </x-slot>
  <x-slot name="slot">
    <div class="mt-5 lg:container lg:mx-auto">
      <x-jet-validation-errors></x-jet-validation-errors>
      <livewire:create-donor-form></livewire:create-donor-form>
    </div>
  </x-slot>
</x-app-layout>