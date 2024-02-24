{{-- <section id="step2" class="hero step" style="display: none"> --}}
      {{-- <form action="/nurse-patients/edit/{{$patient->patient_id}}" method="POST" class="flex flex-col" enctype="multipart/form-data">
          @method('PUT')
          @csrf --}}
          <div class="flex flex-col">

          <div class="hero-content">
              <div class="left">
                  <div class="left-1">
                      <h1>Edit Patient Complete History - Step 5</h1>
                      <h3>Neurological Examination</h3>


                      <div class="">
                        <p class="flex-col">
                            <p>Name of medication and dosage:</p>
                            <input placeholder="Name of Medication" type="text" id="current_medications" name="current_medications" value="{{ optional($patient->currentMedication)->current_medications }}"/>
                            @error('current_medications')
                            <p class="text-red-500 text-xs p-1">
                                {{$message}}
                            </p>
                            @enderror   
                            <input placeholder="Dosage" type="text" id="current_dosage" name="current_dosage" value="{{ optional($patient->currentMedication)->current_dosage }}"/>
                            @error('current_dosage')
                            <p class="text-red-500 text-xs p-1">
                                {{$message}}
                            </p>
                            @enderror
                        </p>
                        <p class="flex-col">
                            <p>Frequency:</p>
                            <input placeholder="Frequency" type="text" id="current_frequency" name="current_frequency" value="{{ optional($patient->currentMedication)->current_frequency }}"/>
                            @error('current_frequency')
                            <p class="text-red-500 text-xs p-1">
                                {{$message}}
                            </p>
                            @enderror   
                        </p>
                        <p class="flex-col">
                            <p>Prescribing Physician:</p>
                            <input placeholder="Prescribing Physician" type="text" id="current_prescribing_physician" name="current_prescribing_physician" value="{{ optional($patient->currentMedication)->current_prescribing_physician }}"/>
                            @error('current_prescribing_physician')
                            <p class="text-red-500 text-xs p-1">
                                {{$message}}
                            </p>
                            @enderror   
                        </p>
                        













                              <!-- Repeat the pattern for other past medical history checkboxes -->
                              <!-- ... -->
                          
                      </div>

                      <div class="flexi">
                        <button type="button" onclick="prevStep()" class="block py-2 pr-3 pl-3 bg-custom-50 rounded-lg text-white">Back</button>
                      </div>
                    
                      {{-- <button type="button" onclick="nextStep()" class="block py-2 pr-3 pl-3 bg-custom-50 rounded-lg text-white">Next</button> --}}
                  </div>
              </div>
          </div>
          <button type="submit" class="bg-custom-50 hover:bg-custom-50 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200" type="submit">Update</button>
          </div>
      {{-- </form> --}}
  
  {{-- </section> --}}
  