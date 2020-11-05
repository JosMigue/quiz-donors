<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    //
  }

  public function store(Request $request)
  {
    //
  }

  public function show(Donor $donor)
  {
    //
  }

  public function edit(Donor $donor)
  {
    //
  }

  public function update(Request $request, Donor $donor)
  {
    //
  }

  public function destroy(Donor $donor)
  {
    //
  }
}
