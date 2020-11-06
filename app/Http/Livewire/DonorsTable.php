<?php

namespace App\Http\Livewire;

use App\Models\Donor;
use Livewire\Component;
use Livewire\WithPagination;

class DonorsTable extends Component
{
    use WithPagination;

    public $queryString = ['search' => ['except' => '']];

    public $search = '';

    public $searchResults = [];

    public function mount(){
        if($this->search){
            $this->searchDonor();
        }
    }

    public function render()
    {
        $bloodTypes = Donor::getEnum('bloodtype');
        $genderTypes = Donor::getEnum('gendertype');
        $donorTypes = Donor::getEnum('donortype');
        $donors = Donor::with('city', 'state')->paginate(15);
        return view('livewire.donors-table', compact('donors','bloodTypes', 'genderTypes', 'donorTypes'));
    }

    public function searchDonor(){
        $this->searchResults = Donor::where('name','LIKE', '%'.$this->search.'%')->get();
    }
}
