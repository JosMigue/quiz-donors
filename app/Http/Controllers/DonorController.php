<?php

namespace App\Http\Controllers;
use App\Http\Requests\SaveDonorRequest;
use App\Http\Requests\UpdateDonorRequest;
use Illuminate\Http\Request;
use App\Models\Donor;

class DonorController extends Controller
{

  public function __construct(){
    $this->middleware('auth');
  }

  public function index()
  {
    return view('donor.index');
  }

  public function create()
  {
    return view('donor.create');
  }

  public function store(SaveDonorRequest $request)
  {
    if(Donor::create($request->validated())){
      return redirect()->route('donors.index')->with('successMessage', __('Donor has been added succesfully'));
    }else{
      return redirect()->route('donors.index')->with('errorMessage', __('Someting went wrong, try again later'));
    }
  }

  public function show(Donor $donor)
  {
    //
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
