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
                        <div class="flex-col">
                            <label for="mh_clinical_impression">Clinical Impression:</label>
                            <input placeholder="Clinical Impression" type="text" id="mh_clinical_impression" name="mh_clinical_impression" value="{{ optional($patient->medicalHistory)->mh_clinical_impression }}"/>
                            @error('mh_clinical_impression')
                                <p class="text-red-500 text-xs p-1">
                                    {{$message}}
                                </p>
                            @enderror                    
                        </div> 
                        <div class="flex-col">
                            <label for="mh_work_up">Work Up:</label>
                            <input placeholder="Work Up" type="text" id="mh_work_up" name="mh_work_up" value="{{ optional($patient->medicalHistory)->mh_work_up }}"/>
                            @error('mh_work_up')
                                <p class="text-red-500 text-xs p-1">
                                    {{$message}}
                                </p>
                            @enderror                    
                        </div> 













                              <!-- Repeat the pattern for other past medical history checkboxes -->
                              <!-- ... -->
                          
                      </div>

                      <div class="flexi">
                        <button type="button" onclick="prevStep()" class="block py-2 pr-3 pl-3 bg-custom-50 rounded-lg text-white">Back</button>
                        <button type="button" onclick="nextStep()" class="block py-2 pr-3 pl-3 bg-custom-50 rounded-lg text-white">Next</button>
                      </div>
                    
                      {{-- <button type="button" onclick="nextStep()" class="block py-2 pr-3 pl-3 bg-custom-50 rounded-lg text-white">Next</button> --}}
                  </div>
              </div>
          </div>
          <button type="submit" class="bg-custom-50 hover:bg-custom-50 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200" type="submit">Update</button>
          </div>
      {{-- </form> --}}
  
  {{-- </section> --}}
  