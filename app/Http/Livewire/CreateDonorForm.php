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
    public $donor;
    public $selectedState = '';
    public $selectedDate = '';
    public $calculatedAge = '';

    public function mount()
    {
        $this->cities = City::where('state_id', $this->donor->state_id)->get();
        $this->selectedState = $this->donor->state->id;
        $this->selectedDate = $this->donor->born_date;
        $this->calculatedAge = $this->donor->age;
    }
    
    public function render()
    {
        $states = State::all();
        $bloodTypes = Donor::getEnum('bloodtype');
        $genderTypes = Donor::getEnum('gendertype');
        $donorTypes = Donor::getEnum('donortype');
        $donor = $this->donor;
        return view('livewire.create-donor-form', compact('states','bloodTypes', 'genderTypes', 'donorTypes', 'donor'));
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
