<div>
  <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
    <input class="form-input rounded shadow-sm mt-1 block w-full" type="text" wire:model="search" placeholder="{{__('Search donor..')}}">
  </div>
  <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
    <div class="flex flex-col">
      <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
          <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
              <thead>
                <tr>
                  <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    {{__('Name')}}
                  </th>
                  <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    {{__('City')}}
                  </th>
                  <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    {{__('State')}}
                  </th>
                  <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    {{__('Blood type')}}
                  </th>
                  <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    {{__('Donor type')}}
                  </th>
                  <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    {{__('E-Mail Address')}}
                  </th>
                  <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    {{__('Mobile')}}
                  </th>
                  <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    {{__('Created at')}}
                  </th>
                  <th class="px-6 py-3 bg-gray-50">
                    {{__('Actions')}}
                  </th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                @if ($donors->count())
                  @foreach ($donors as $donor)                     
                    <tr class="hover:bg-gray-100">
                      <td class="px-6 py-4 whitespace-no-wrap">
                        <div class="flex items-center">
                          <div class="flex-shrink-0 h-10 w-10">
                            <img class="h-10 w-10 rounded-full" src="{{$donor->profile_photo_url}}" alt="{{$donor->name}}">
                          </div>
                          <div class="ml-4">
                            <div class="text-sm leading-5 font-medium text-gray-900">
                              {{$donor->name}}
                            </div>
                            <div class="text-sm leading-5 text-gray-500">
                              {{$donor->email}}
                            </div>
                          </div>
                        </div>
                      </td>
                      <td class="px-6 py-4 whitespace-no-wrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                          Active
                        </span>
                      </td>
                      <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                        <div class="flex justify-center ml-6 z-10">
                          @if ($donor->role!=1)
                            <a href="{{route('donors.edit', $donor->id)}}" class="mx-1 py-2 px-3 rounded bg-yellow-300 text-white hover:text-indigo-900"><i class="fa fa-pencil"></i></a>
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
