<?php

namespace App\Http\Livewire;
use App\Models\City;
use App\Models\State;
use App\Models\Donor;
use Carbon\Carbon;
use Livewire\Component;

class CreateDonorForm extends Component
{
    public $cities = [];

    public $selectedState = '';
    public $selectedDate = '';

    public $calculatedAge = '';

    public function render()
    {
        $states = State::all();
        $bloodTypes = Donor::getEnum('bloodtype');
        $genderTypes = Donor::getEnum('gendertype');
        $donorTypes = Donor::getEnum('donortype');
        return view('livewire.create-donor-form', compact('states','bloodTypes', 'genderTypes', 'donorTypes'));
    }

    public function getCitiesOfSelectedState(){
        $state = State::find($this->selectedState);
        $this->cities = $state->cities()->get();
    }

    public function caculateAge(){
        $dateOfBirth = $this->selectedDate;
        $this->calculatedAge = Carbon::parse($dateOfBirth)->age;
    }
}
