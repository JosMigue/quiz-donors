<x-guest-layout>
    <x-slot name="slot">
      @if (session('successMessage'))
      <x-alert class="bg-green-400" iconClass="fa fa-check">
        <x-slot name="boldMessage">
          {{__('Done.')}}
        </x-slot>
        <x-slot name="message">
          {{session('successMessage')}}
        </x-slot>
      </x-alert>
    @endif
    @if (session('erroMessage'))
      <x-alert class="bg-red-500" iconClass="fa fa-times">
        <x-slot name="boldMessage">
          {{__('Whoops!')}}
        </x-slot>
        <x-slot name="message">
          {{session('erroMessage')}}
        </x-slot>
      </x-alert>
    @endif
    <div class="min-h-screen flex items-center justify-center bg-gray-50">
      <livewire:quiz-donation></livewire:quiz-donation>
    </div>
    </x-slot>
</x-guest-layout>