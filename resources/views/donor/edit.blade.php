<x-app-layout>
    <x-slot name="header">
      <h4 class="font-semibold text-xl text-gray-800 leading-tight">{{__('Update donor')}}: {{$donor->name}} {{$donor->parental_surname}} {{$donor->maternal_surname}}</h4> 
    </x-slot>
    <x-slot name="slot">
      <div class="mt-5 lg:container lg:mx-auto">
        <x-jet-validation-errors></x-jet-validation-errors>
        <livewire:update-donor-form :donor="$donor"></livewire:update-donor-form>
      </div>
    </x-slot>
  </x-app-layout>