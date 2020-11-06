<x-app-layout>
  <x-slot name="header">
    <h4 class="font-semibold text-xl text-gray-800 leading-tight">{{__('Show donor')}}: {{$donor->name}} {{$donor->parental_surname}} {{$donor->maternal_surname}}</h4>
  </x-slot>
  <x-slot name="slot">
    <div class="flex justify-center">
      <div class="bg-white border shadow lg:w-1/2 w-full lg:h-auto h-full rounded p-10 lg:m-5">
        <div class="grid grid-cols-1 gap-6">
          <div class="flex flex-row flex-wrap justify-between ">
            {{__('Created at')}}: <br>{{$donor->created_at->format('Y-m-d')}}
            <style>
              .dropdown:hover > .dropdown-content {
                display: block;
              }
              </style>
              
              <div class="dropdown inline-block relative">
                <button class="bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded inline-flex items-center">
                  <span>{{__('Contact')}} 🠋</span>
                </button>
                <ul class="dropdown-content absolute hidden text-gray-700 pt-1">
                  <li class="dropdown">
                    <a class="bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="tel:{{$donor->phone}}">{{__('Call')}}</a>
                  </li>
                  <li><a class="rounded-b bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="mailto:{{$donor->email}}">{{__('Send Email')}}</a></li>
                </ul>
              </div>
          </div>
        </div>
        <div class="grid lg:grid-cols-3 grid-cols-2 gap-6 mt-4">
          <div>
            {{__('Name')}}: <br>
            {{$donor->name}} {{$donor->parental_surname}} {{$donor->maternal_surname}}
          </div>
          <div>
            {{__('City')}}: <br>
            {{$donor->city->name}}
          </div>
          <div>
            {{__('State')}}: <br>
            {{$donor->state->name}}
          </div>
          <div>
            {{__('Blood type')}}: <br>
            {{$bloodTypes[$donor->bloodtype]}}
          </div>
          <div>
            {{__('Donor type')}}: <br>
            {{$donorTypes[$donor->donortype]}}
          </div>
          <div>
            {{__('Gender type')}}: <br>
            {{$genderTypes[$donor->gendertype]}}
          </div>
          <div>
            {{__('Born date')}}: <br>
            {{$donor->born_date}}
          </div>
          <div>
            {{__('Age')}}: <br>
            {{$donor->age}}
          </div>
          <div>
            {{__('E-Mail Address')}}: <br>
            {{$donor->email}}
          </div>
          <div>
            {{__('Phone')}}: <br>
            {{$donor->mobile}}
          </div>
        </div>
      </div>
    </div>
  </x-slot>
</x-app-layout>