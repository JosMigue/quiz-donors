<div>
  <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
    <div class="grid grid-cols-1">
      <div class="flex justify-center">
        <input class="form-input rounded shadow-sm mt-1 lg:w-1/2 w-full" type="text" wire:model="search" wire:keydown="searchDonor()" placeholder="{{__('Search donor...')}}">
      </div>
      <div class="flex justify-center">
        <div class="absolute bg-white lg:w-1/2 w-full lg:px-20 px-4 px-0">
          @if ($search != '')
            @if ($searchResults->count()>0)
              <div class="bg-white py-2 px-5 border rounded">
                resultados:
              </div>
              @foreach ($searchResults as $searchResult)
                <a href="{{route('donors.show', $searchResult->id)}}">
                  <div class="bg-white py-2 px-5 border rounded hover:bg-blue-200 hover:text-white text-lg cursor-pointer">
                    <div class="flex items-center">
                      <div class="flex-shrink-0 h-10 w-10">
                        <img class="h-10 w-10 rounded-full bg-indigo-100" src="https://ui-avatars.com/api/?name=.{{$searchResult->name}}" alt="{{$searchResult->name}}">
                      </div>
                      <div class="ml-4">
                        <div class="text-sm leading-5 font-medium text-gray-900">
                          {{$searchResult->name}} {{$searchResult->parental_surname}} {{$searchResult->maternal_surname}}
                        </div>
                        <div class="text-sm leading-5 text-gray-500">
                          {{$searchResult->email}}
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
              @endforeach
            @else
            <div class="bg-white py-2 px-5 border rounded">
              No hay resultado para la búsqueda "{{$search}}"
            </div>
            @endif
          @endif
        </div>
      </div>
    </div>
  </div>
  <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6 z-30">
    <div class="flex flex-col">
      <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
          <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
              <thead>
                <tr>
                  <th class="px-2 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    {{__('Name')}}
                  </th>
                  <th class="px-2 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    {{__('City')}}
                  </th>
                  <th class="px-2 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    {{__('State')}}
                  </th>
                  <th class="px-2 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    {{__('Blood type')}}
                  </th>
                  <th class="px-2 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    {{__('Donor type')}}
                  </th>
                  <th class="px-2 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    {{__('E-Mail Address')}}
                  </th>
                  <th class="px-2 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    {{__('Mobile')}}
                  </th>
                  <th class="px-2 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    {{__('Created at')}}
                  </th>
                  <th class="px-2 py-3 bg-gray-50">
                    {{__('Actions')}}
                  </th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                @if ($donors->count())
                  @foreach ($donors as $donor)                     
                    <tr class="hover:bg-gray-100">
                      <td class="px-2 py-4 whitespace-no-wrap">
                        <div class="flex items-center">
                          <div class="flex-shrink-0 h-10 w-10">
                            <img class="h-10 w-10 rounded-full bg-indigo-100" src="https://ui-avatars.com/api/?name=.{{$donor->name}}" alt="{{$donor->name}}">
                          </div>
                          <div class="ml-4">
                            <div class="text-sm leading-5 font-medium text-gray-900">
                              {{$donor->name}} {{$donor->parental_surname}} {{$donor->maternal_surname}}
                            </div>
                            <div class="text-sm leading-5 text-gray-500">
                              {{$donor->email}}
                            </div>
                          </div>
                        </div>
                      </td>
                      <td class="px-2 py-4 whitespace-no-wrap">
                        {{$donor->city->name}}
                      </td>
                      <td class="px-2 py-4 whitespace-no-wrap">
                        {{$donor->state->name}}
                      </td>
                      <td class="px-2 py-4 whitespace-no-wrap">
                        {{$bloodTypes[$donor->bloodtype]}}
                      </td>
                      <td class="px-2 py-4 whitespace-no-wrap">
                        {{$donorTypes[$donor->donortype]}}
                      </td>
                      <td class="px-2 py-4 whitespace-no-wrap">
                        {{$genderTypes[$donor->gendertype]}}
                      </td>
                      <td class="px-2 py-4 whitespace-no-wrap">
                        {{$donor->mobile}}
                      </td>
                      <td class="px-2 py-4 whitespace-no-wrap">
                        {{$donor->created_at}}
                      </td>
                      <td class="px-2 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                        <div class="flex justify-center ml-6 z-10">
                          @if ($donor->role!=1)
                            <a href="{{route('donors.edit', $donor->id)}}" class="mx-1 py-2 px-3 rounded bg-yellow-300 text-white hover:text-yellow-900"><i class="fa fa-pencil"></i></a>
                            <a href="{{route('donors.show', $donor->id)}}" class="mx-1 py-2 px-3 rounded bg-blue-500 text-white hover:text-blue-900"><i class="fa fa-eye"></i></a>
                            <form method="POST" action="{{route('donors.destroy',$donor->id)}}">
                              @csrf 
                              @method('DELETE')
                              <button type="sumbit" class="mx-1 py-2 px-3 rounded bg-red-600 text-white hover:text-red-900"><i class="fa fa-trash"></i></button>
                            </form>
                          @endif
                        </div>
                      </td>
                    </tr>
                  @endforeach
                @else
                @if ($search == "")
                  <td class="px-6 py-4 whitespace-no-wrap text-center" colspan="9">
                    {{__('There is not nothing to show')}} <i class="fa fa-frown-o" aria-hidden="true"></i>
                  </td>
                @else
                  <td class="px-6 py-4 whitespace-no-wrap text-center" colspan="9">
                    {{__('There is not results for search')}} "{{$search}}" <i class="fa fa-frown-o" aria-hidden="true"></i>
                  </td>
                @endif
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
    {{$donors->links()}}
  </div>
</div>
