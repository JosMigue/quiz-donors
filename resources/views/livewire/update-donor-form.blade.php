<div>
  <div class="p-6 bg-white rounded-md shadow-md">
    <h2 class="text-lg text-gray-700 font-semibold capitalize">{{__('Data')}}</h2>
    <form action="{{route('donors.update', $donor->id)}}" method="POST">
      @csrf
      @method('PATCH')
      <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mt-4">
        <div>
          <label class="text-gray-700" for="name">{{__('Name')}}</label>
          <input id="name" type="text" name="name"  value="{{$donor->name}}" class="w-full mt-2 px-4 py-2 block rounded bg-white text-gray-800 border border-gray-300 focus:border-blue-500 focus:outline-none focus:shadow-outline" required>
        </div>
        <div>
          <label class="text-gray-700" for="parental_surname">{{__('Parental surname')}}</label>
          <input id="parental_surname" name="parental_surname" value="{{$donor->parental_surname}}" type="text" class="w-full mt-2 px-4 py-2 block rounded bg-white text-gray-800 border border-gray-300 focus:border-blue-500 focus:outline-none focus:shadow-outline" required>
        </div>
        <div>
          <label class="text-gray-700" for="maternal_surname">{{__('Maternal surname')}}</label>
          <input id="maternal_surname" name="maternal_surname" value="{{$donor->maternal_surname}}" type="text" class="w-full mt-2 px-4 py-2 block rounded bg-white text-gray-800 border border-gray-300 focus:border-blue-500 focus:outline-none focus:shadow-outline" required>
        </div>
        <div>
          <label class="text-gray-700" for="state_id">{{__('State')}}</label>
          <select name="state_id" wire:model="selectedState" wire:change="getCitiesOfSelectedState()" id="state_id" class="block appearance-none w-full bg-white rounded-sm pl-4 py-3 pr-8 cursor-pointer focus:outline-none border border-gray-300 hover:border-gray-400" required>
            @foreach ($states as $state)
              <option value="{{$state->id}}" >{{$state->name}}</option>
            @endforeach
          </select>
        </div>
        <div>
          <label class="text-gray-700" for="city_id">{{__('City')}}</label>
          <select name="city_id" id="city_id"class="block appearance-none w-full bg-white rounded-sm pl-4 py-3 pr-8 cursor-pointer focus:outline-none border border-gray-300 hover:border-gray-400" required>
            @foreach ($cities as $city)
              <option value="{{$city->id}}" @if($donor->city->id == $city->id) selected @endif>{{$city->name}}</option>
            @endforeach
          </select>
        </div>
        <div>
          <label class="text-gray-700" for="bloodtype">{{__('Blood type')}}</label>
          <select id="bloodtype" name="bloodtype" class="block appearance-none w-full bg-white rounded-sm pl-4 py-3 pr-8 cursor-pointer focus:outline-none border border-gray-300 hover:border-gray-400" required>
            <option value="" selected disabled>{{__('Select blood type...')}}</option>
            @foreach ($bloodTypes as $key => $bloodType)
              <option value="{{$key}}" @if($donor->bloodtype == $key) selected @endif>{{$bloodType}}</option>
            @endforeach
          </select>
        </div>
        <div>
          <label class="text-gray-700" for="donortype">{{__('Donor type')}}</label>
          <select id="donortype" name="donortype" class="block appearance-none w-full bg-white rounded-sm pl-4 py-3 pr-8 cursor-pointer focus:outline-none border border-gray-300 hover:border-gray-400" required>
            <option value="" selected disabled>{{__('Select donor type...')}}</option>
            @foreach ($donorTypes as $key => $donorType)
              <option value="{{$key}}" @if($donor->donortype == $key) selected @endif>{{$donorType}}</option>
            @endforeach
          </select>
        </div>
        <div>
          <label class="text-gray-700" for="gendertype">{{__('Gender type')}}</label>
          <select id="gendertype" name="gendertype" class="block appearance-none w-full bg-white rounded-sm pl-4 py-3 pr-8 cursor-pointer focus:outline-none border border-gray-300 hover:border-gray-400" required>
            <option value="" selected disabled>{{__('Select donor type...')}}</option>
            @foreach ($genderTypes as $key => $genderType)
              <option value="{{$key}}" @if($donor->gendertype == $key) selected @endif>{{$genderType}}</option>
            @endforeach
          </select>
        </div>
        <div>
          <label class="text-gray-700" for="born_date">{{__('Born date')}}</label>
          <input id="born_date" name="born_date" type="date" wire:model="selectedDate" wire:change="caculateAge(this)" class="w-full mt-2 px-4 py-2 block rounded bg-white text-gray-800 border border-gray-300 focus:border-blue-500 focus:outline-none focus:shadow-outline" required>
        </div>
        <div>
          <label class="text-gray-700" for="age">{{__('Age')}}</label>
          <input id="age" name="age" type="text" readonly  wire:model="calculatedAge" class="w-full mt-2 px-4 py-2 block rounded bg-gray-200 text-gray-800 border border-gray-300 focus:border-blue-500 focus:outline-none focus:shadow-outline" readonly required>
        </div>
        <div>
          <label class="text-gray-700" for="email">{{__('E-Mail Address')}}</label>
          <input id="email" name="email" type="email" value="{{$donor->email}}" class="w-full mt-2 px-4 py-2 block rounded bg-white text-gray-800 border border-gray-300 focus:border-blue-500 focus:outline-none focus:shadow-outline" required>
        </div>
        <div>
          <label class="text-gray-700" for="mobile">{{__('Phone')}}</label>
          <input id="mobile" name="mobile" type="phone" value="{{$donor->mobile}}" max="10" min="10" maxlength="10" class="w-full mt-2 px-4 py-2 block rounded bg-white text-gray-800 border border-gray-300 focus:border-blue-500 focus:outline-none focus:shadow-outline" required>
        </div>
      </div>
      <div class="flex justify-end mt-4">
        <button class="px-4 py-2 bg-gray-800 text-gray-200 rounded hover:bg-gray-700 focus:outline-none focus:bg-gray-700">{{__('Save')}}</button>
      </div>
    </form>
  </div>
</div>