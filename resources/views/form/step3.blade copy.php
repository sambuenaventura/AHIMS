{{-- <section id="step2" class="hero step" style="display: none"> --}}
      {{-- <form action="/nurse-patients/edit/{{$patient->patient_id}}" method="POST" class="flex flex-col" enctype="multipart/form-data">
          @method('PUT')
          @csrf --}}
          <div class="flex flex-col">

          <div class="hero-content">
              <div class="left">
                  <div class="left-1">
                      <h1>Edit Patient Complete History - Step 3</h1>
                      <h3>Physical Examination</h3>


                      <p>Vital Signs</p>
                      <div class="">
                          <p>
                              <label for="vitals_blood_pressure">Blood pressure:</label>
                              <input placeholder="mmHg" type="text" id="vitals_blood_pressure" name="vitals_blood_pressure" value="{{ optional($patient->physicalExamination)->vitals_blood_pressure }}"/>
                              @error('vitals_blood_pressure')
                              <p class="text-red-500 text-xs p-1">
                                  {{$message}}
                              </p>
                              @enderror                        
                          </p>
                          <p>
                              <label for="vitals_respiratory_rate">Respiratory rate:</label>
                              <input placeholder="cpm" type="text" id="vitals_respiratory_rate" name="vitals_respiratory_rate" value="{{ optional($patient->physicalExamination)->vitals_respiratory_rate }}"/>
                              @error('vitals_respiratory_rate')
                              <p class="text-red-500 text-xs p-1">
                                  {{$message}}
                              </p>
                              @enderror                        
                          </p>
                          <p>
                              <label for="vitals_pulse_rate">Pulse rate:</label>
                              <input placeholder="bpm" type="text" id="vitals_pulse_rate" name="vitals_pulse_rate" value="{{ optional($patient->physicalExamination)->vitals_pulse_rate }}"/>
                              @error('vitals_pulse_rate')
                              <p class="text-red-500 text-xs p-1">
                                  {{$message}}
                              </p>
                              @enderror                        
                          </p>
                          <p>
                              <label for="vitals_temperature">Temperature:</label>
                              <input placeholder="celcius" type="text" id="vitals_temperature" name="vitals_temperature" value="{{ optional($patient->physicalExamination)->vitals_temperature }}"/>
                              @error('vitals_temperature')
                              <p class="text-red-500 text-xs p-1">
                                  {{$message}}
                              </p>
                              @enderror                        
                          </p>
                          <p>
                              <label for="vitals_weight">Weight:</label>
                              <input placeholder="kg" type="text" id="vitals_weight" name="vitals_weight" value="{{ optional($patient->physicalExamination)->vitals_weight }}"/>
                              @error('vitals_weight')
                              <p class="text-red-500 text-xs p-1">
                                  {{$message}}
                              </p>
                              @enderror                        
                          </p>



                          <div class="flex-col">
                            <label for="pe_heent">HEENT:</label>
                            <input placeholder="HEENT details" type="text" id="pe_heent" name="pe_heent" value="{{ optional($patient->physicalExamination)->pe_heent }}"/>
                            @error('pe_heent')
                            <p class="text-red-500 text-xs p-1">
                                {{$message}}
                            </p>
                            @enderror
                          </div>
                          <div class="flex-col">
                            <label for="pe_neck">Neck:</label>
                            <input placeholder="Neck details" type="text" id="pe_neck" name="pe_neck" value="{{ optional($patient->physicalExamination)->pe_neck }}"/>
                            @error('pe_neck')
                            <p class="text-red-500 text-xs p-1">
                                {{$message}}
                            </p>
                            @enderror
                          </div>
                          <div class="flex-col">
                            <label for="pe_chest_left">Chest:</label>
                            <input placeholder="Chest details" type="text" id="pe_chest_left" name="pe_chest_left" value="{{ optional($patient->physicalExamination)->pe_chest_left }}"/>
                            @error('pe_chest_left')
                            <p class="text-red-500 text-xs p-1">
                                {{$message}}
                            </p>
                            @enderror
                          </div>
                          <div class="flex-col">
                            <label for="pe_chest_right">Chest:</label>
                            <input placeholder="Chest details" type="text" id="pe_chest_right" name="pe_chest_right" value="{{ optional($patient->physicalExamination)->pe_chest_right }}"/>
                            @error('pe_chest_right')
                            <p class="text-red-500 text-xs p-1">
                                {{$message}}
                            </p>
                            @enderror
                          </div>
                          <div class="flex-col">
                            <label for="pe_lungs">Lungs:</label>
                            <input placeholder="Lungs details" type="text" id="pe_lungs" name="pe_lungs" value="{{ optional($patient->physicalExamination)->pe_lungs }}"/>
                            @error('pe_lungs')
                            <p class="text-red-500 text-xs p-1">
                                {{$message}}
                            </p>
                            @enderror
                          </div>
                          <div class="flex-col">
                            <label for="pe_heart">Heart:</label>
                            <input placeholder="Heart details" type="text" id="pe_heart" name="pe_heart" value="{{ optional($patient->physicalExamination)->pe_heart }}"/>
                            @error('pe_heart')
                            <p class="text-red-500 text-xs p-1">
                                {{$message}}
                            </p>
                            @enderror
                          </div>
                          <div class="flex-col">
                            <label for="pe_breast">Breast:</label>
                            <input placeholder="Breast details" type="text" id="pe_breast" name="pe_breast" value="{{ optional($patient->physicalExamination)->pe_breast }}"/>
                            @error('pe_breast')
                            <p class="text-red-500 text-xs p-1">
                                {{$message}}
                            </p>
                            @enderror
                          </div>
                          <div class="flex-col">
                            <label for="pe_extremities">Extremities:</label>
                            <input placeholder="Extremities details" type="text" id="pe_extremities" name="pe_extremities" value="{{ optional($patient->physicalExamination)->pe_extremities }}"/>
                            @error('pe_extremities')
                            <p class="text-red-500 text-xs p-1">
                                {{$message}}
                            </p>
                            @enderror
                          </div>
                          <div class="flex-col">
                            <label for="pe_internal_examination">Internal Examination:</label>
                            <input placeholder="Internal Examination details" type="text" id="pe_internal_examination" name="pe_internal_examination" value="{{ optional($patient->physicalExamination)->pe_internal_examination }}"/>
                            @error('pe_internal_examination')
                            <p class="text-red-500 text-xs p-1">
                                {{$message}}
                            </p>
                            @enderror
                          </div>
                          <div class="flex-col">
                            <label for="pe_rectal_examination">Rectal Examination:</label>
                            <input placeholder="Rectal Examination details" type="text" id="pe_rectal_examination" name="pe_rectal_examination" value="{{ optional($patient->physicalExamination)->pe_rectal_examination }}"/>
                            @error('pe_rectal_examination')
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
  