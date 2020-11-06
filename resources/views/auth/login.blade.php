<x-guest-layout>
    <x-guest-layout>
        <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
          <div class="max-w-md w-full">
            <div>
              <img class="mx-auto h-12 w-auto" src="{{asset('img/drop-blood.png')}}" alt="Workflow">
              <h2 class="mt-6 text-center text-3xl leading-9 font-extrabold text-gray-900">
                {{__('Sign in to your account')}}
              </h2>
            </div>
            <x-jet-validation-errors />
            <form class="mt-8"method="POST" action="{{ route('login') }}">
              @if (session('status'))
                <x-alert class="bg-blue-700" iconClass="fa fa-info">
                  <x-slot name="boldMessage">
                  </x-slot>
                  <x-slot name="message">
                    {{session('status')}}
                  </x-slot>
                </x-alert>
              @endif
              @if (session('loginMessage'))
                <x-alert class="bg-blue-600" iconClass="fa fa-info">
                  <x-slot name="boldMessage">
                  </x-slot>
                  <x-slot name="message">
                    {{session('loginMessage')}}
                  </x-slot>
                </x-alert>
              @endif
              @csrf
              <div class="rounded-md shadow-sm">
                <div>
                  <input autofocus aria-label="{{__('E-Mail Address')}}" name="email" type="email" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5" placeholder="{{__('E-Mail Address')}}" value="{{old('email')}}">
                </div>
                <div class="-mt-px">
                  <input aria-label="{{__('Password')}}" name="password" type="password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5" placeholder="{{__('Password')}}">
                </div>
              </div>
              <div class="mt-6 flex items-center justify-between">
                <div class="flex items-center">
                  <input id="remember_me" name="remember" type="checkbox" class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                  <label for="remember_me" class="ml-2 block text-sm leading-5 text-gray-900">
                    {{__('Remember me')}}
                  </label>
                </div>
      
                <div class="text-sm leading-5">
                  <a href="{{ route('password.request') }}" class="font-medium text-red-600 hover:text-red-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                    {{__('Forgot your password?')}}
                  </a>
                </div>
              </div>
              <div class="mt-6">
                <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-red-600 hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-700 transition duration-150 ease-in-out">
                  <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                    <svg class="h-5 w-5 text-red-500 group-hover:text-red-400 transition ease-in-out duration-150" fill="currentColor" viewBox="0 0 20 20">
                      <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                    </svg>
                  </span>
                  {{__('Login')}}
                </button>
              </div>
            </form>
          </div>
        </div>
      </x-guest-layout>
</x-guest-layout>
