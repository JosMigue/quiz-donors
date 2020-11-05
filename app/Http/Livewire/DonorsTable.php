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

    public function render()
    {
        $bloodTypes = Donor::getEnum('bloodtype');
        $genderTypes = Donor::getEnum('gendertype');
        $donorTypes = Donor::getEnum('donortype');
        $donors = Donor::with('city', 'state')->paginate(15);
        return view('livewire.donors-table', compact('donors','bloodTypes', 'genderTypes', 'donorTypes'));
    }
}