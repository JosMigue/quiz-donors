<?php

namespace App\Http\Controllers;
use App\Http\Requests\SaveDonorRequest;
use App\Http\Requests\UpdateDonorRequest;
use Illuminate\Http\Request;
use App\Models\Donor;

class DonorController extends Controller
{

  public function __construct(){
    $this->middleware('auth')->except(['create', 'store']);
  }

  public function index()
  {
    return view('donor.index');
  }

  public function create(){
    return view('donor.create');
  }

  public function store(SaveDonorRequest $request)
  {
    if(Donor::create($request->validated())){
      return redirect()->route('/blood_donation')->with('successMessage', __('Donor has been added succesfully'));
    }else{
      return redirect()->route('/blood_donation')->with('errorMessage', __('Someting went wrong, try again later'));
    }
  }

  public function show(Donor $donor)
  {
    $bloodTypes = Donor::getEnum('bloodtype');
    $genderTypes = Donor::getEnum('gendertype');
    $donorTypes = Donor::getEnum('donortype');
    $answers = [ 
      ['question' => '¿Tienes más de 18 años?', 'response' => true],
      ['question' => '¿Estás embarazada o lactando?', 'response' => false],
      ['question' => '¿Traes contigo una identificación oficial con fotografía?', 'response' => true],
      ['question' => '¿Pesas más de 50 kilos?', 'response' => true],
      ['question' => '¿Has padecido de ataques epilépticos, convulsiones o enfermedades del corazón?', 'response' => false],
      ['question' => '¿Te has sometido a una operación en los últimos meses?', 'response' => false],
      ['question' => '¿Te has tatuado o hecho piercings en los últimos 12 meses?', 'response' => false],
      ['question' => '¿Te has vacunado en los últimos 30 días?', 'response' => false],
      ['question' => '¿Padeciste hepatitis después de los 10 años?', 'response' => false],
      ['question' => '¿Tienes síntomas como tos o dolor de garganta?', 'response' => false ],
      ['question' => '¿Has tomado medicamentos en los últimos 5 días?', 'response' => false]
    ];
    return view('donor.show', compact('donor','bloodTypes', 'genderTypes', 'donorTypes', 'answers'));
  }

  public function edit(Donor $donor)
  {
    return view('donor.edit', compact('donor'));
  }

  public function update(UpdateDonorRequest $request, Donor $donor)
  {
    if($donor->update($request->validated())){
      return redirect()->route('donors.index')->with('successMessage', __('Donor has been updated succesfully'));
    }else{
      return redirect()->route('donors.index')->with('errorMessage', __('Something went wrong, try again later'));
    }
  }

  public function destroy(Donor $donor)
  {
    if($donor->delete()){
      return redirect()->route('donors.index')->with('successMessage', __('Donor has been deleted successfully'));
    }else{
      return redirect()->route('donors.index')->with('errorMessage', __('Something went wrong, try again later'));
    }
  }
}
