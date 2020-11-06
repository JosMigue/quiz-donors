<div>
  <div class="flex flex-column items-center justify-center" >
    <div class="shadow-md p-5 mb-5 mt-5 bg-white rounded" style="width:700px; height:565px;">
      @if (!$isAbleToDonate)
        <div class="flex flex-row justify-center mt-5">
          <h1 class="text-center font-weight-bold">QUIERO SER DONADOR</h1>
        </div>
      @endif
      @if (!$isAbleToDonate)
        <div class="flex flex-row justify-center p-4">
          <p class="text-justify">Antes que nada, debes tener 100% la voluntad de donar sin esperar recibir nada cambio, sólo la satisfacción de ayudar a quien lo necesite. Para saber si cumples con los requisitos básicos para donar, contesta este sencillo cuestionario:</p>        
        </div>
      @endif
      @if ($isAbleToDonate)
        <div class="grid grid-cols-1 gap-6 mt-6">
          <div>
            <h1 class="text-center font-bold">¡FELICIDADES!</h1>
          </div>
          <div>
            <p class="text-center">Calificas como donante. Ahora sólo queda acercarte a tu centro de donación más cercano.</p>
          </div>
          <div class="flex justify-center">
            <a class="py-2 px-5 bg-red-500 hover:bg-red-700 rounded font-bold text-white" href="{{route('donors.register')}}">Registrase</a>
          </div>
        </div>
      @endif
      @if (!$isWrongAnswer && !$isAbleToDonate)
        <div class="border-dotted border-2 border-gray-600 my-5 py-1 py-10" >
          <div class="flex flex-row justify-center mb-4">
            <p class="text-center">{{$questions[$counter]['question']}}</p>
          </div>
          <div class="flex flex-row justify-evenly">
            <div class="flex flex-column justify-center">
              <button class="py-2 px-5 bg-red-700 hover:bg-red-500 rounded font-bold text-white" wire:click="checkResponse(true)">Sí</button>
            </div>
            <div class="flex flex-column justify-center">
              <button class="py-2 px-5 bg-red-700 hover:bg-red-500 rounded font-bold text-white" wire:click="checkResponse(false)">No</button>
            </div>
          </div>
        </div>
      @endif
      @if ($isWrongAnswer)
        <div class="border-dotted border-2 border-gray-600 my-5 py-1 py-10">
            <div class="grid grid-cols-1 gap-6">
                <div>
                  <p class="text-center">{{$questions[$counter]['badResponse']}}</p>
                  <p class="text-center">Donar de otra manera</p>
                </div>
                <div class="flex justify-around">
                  <a class="py-2 px-5 bg-red-700 hover:bg-red-600 rounded font-bold text-white" href="https://donadorescompulsivos.org/voluntario-compulsivo/">Donar como volutario compulsivo</a>
                  <a class="py-2 px-5 bg-red-700 hover:bg-red-600 rounded font-bold text-white" href="https://donadorescompulsivos.org/solidario-compulsivo/" >Donar como solidario compulsivo</a>
                </div>
            </div>
        </div>
      @endif
    </div>
  </div>
</div>
