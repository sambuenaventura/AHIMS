{{-- <section id="step2" class="hero step" style="display: none"> --}}
      {{-- <form action="/nurse-patients/edit/{{$patient->patient_id}}" method="POST" class="flex flex-col" enctype="multipart/form-data">
          @method('PUT')
          @csrf --}}
          <div class="flex flex-col">

          <div class="hero-content">
              <div class="left">
                  <div class="left-1">
                      <h1>Edit Patient Complete History - Step 4</h1>
                      <h3>Neurological Examination</h3>


                      <div class="">
                          <p>
                              <label for="neuro_gcs">GCS:</label>
                              <input placeholder="" type="text" id="neuro_gcs" name="neuro_gcs" value="{{ optional($patient->neurologicalExamination)->neuro_gcs }}"/>
                              @error('neuro_gcs')
                              <p class="text-red-500 text-xs p-1">
                                  {{$message}}
                              </p>
                              @enderror                        
                          </p>
                          <p>
                              <label for="neuro_cn_i">CN I:</label>
                              <input placeholder="" type="text" id="neuro_cn_i" name="neuro_cn_i" value="{{ optional($patient->neurologicalExamination)->neuro_cn_i }}"/>
                              @error('neuro_cn_i')
                              <p class="text-red-500 text-xs p-1">
                                  {{$message}}
                              </p>
                              @enderror                        
                          </p>
                          <p>
                              <label for="neuro_cn_ii">CN II:</label>
                              <input placeholder="" type="text" id="neuro_cn_ii" name="neuro_cn_ii" value="{{ optional($patient->neurologicalExamination)->neuro_cn_ii }}"/>
                              @error('neuro_cn_ii')
                              <p class="text-red-500 text-xs p-1">
                                  {{$message}}
                              </p>
                              @enderror                        
                          </p>
                          <p>
                              <label for="neuro_cn_iii_iv_vi">CN III, IV, VI:</label>
                              <input placeholder="" type="text" id="neuro_cn_iii_iv_vi" name="neuro_cn_iii_iv_vi" value="{{ optional($patient->neurologicalExamination)->neuro_cn_iii_iv_vi }}"/>
                              @error('neuro_cn_iii_iv_vi')
                              <p class="text-red-500 text-xs p-1">
                                  {{$message}}
                              </p>
                              @enderror                        
                          </p>
                          <p>
                              <label for="neuro_cn_v">CN V:</label>
                              <input placeholder="" type="text" id="neuro_cn_v" name="neuro_cn_v" value="{{ optional($patient->neurologicalExamination)->neuro_cn_v }}"/>
                              @error('neuro_cn_v')
                              <p class="text-red-500 text-xs p-1">
                                  {{$message}}
                              </p>
                              @enderror                        
                          </p>
                          <p>
                              <label for="neuro_cn_vii">CN VII:</label>
                              <input placeholder="" type="text" id="neuro_cn_vii" name="neuro_cn_vii" value="{{ optional($patient->neurologicalExamination)->neuro_cn_vii }}"/>
                              @error('neuro_cn_vii')
                              <p class="text-red-500 text-xs p-1">
                                  {{$message}}
                              </p>
                              @enderror                        
                          </p>
                          <p>
                              <label for="neuro_cn_viii">CN VIII:</label>
                              <input placeholder="" type="text" id="neuro_cn_viii" name="neuro_cn_viii" value="{{ optional($patient->neurologicalExamination)->neuro_cn_viii }}"/>
                              @error('neuro_cn_viii')
                              <p class="text-red-500 text-xs p-1">
                                  {{$message}}
                              </p>
                              @enderror                        
                          </p>
                          <p>
                              <label for="neuro_cn_ix_x">CN IX, X:</label>
                              <input placeholder="" type="text" id="neuro_cn_ix_x" name="neuro_cn_ix_x" value="{{ optional($patient->neurologicalExamination)->neuro_cn_ix_x }}"/>
                              @error('neuro_cn_ix_x')
                              <p class="text-red-500 text-xs p-1">
                                  {{$message}}
                              </p>
                              @enderror                        
                          </p>
                          <p>
                              <label for="neuro_cn_xi">CN XI:</label>
                              <input placeholder="" type="text" id="neuro_cn_xi" name="neuro_cn_xi" value="{{ optional($patient->neurologicalExamination)->neuro_cn_xi }}"/>
                              @error('neuro_cn_xi')
                              <p class="text-red-500 text-xs p-1">
                                  {{$message}}
                              </p>
                              @enderror                        
                          </p>
                          <p>
                              <label for="neuro_cn_xii">CN XII:</label>
                              <input placeholder="" type="text" id="neuro_cn_xii" name="neuro_cn_xii" value="{{ optional($patient->neurologicalExamination)->neuro_cn_xii }}"/>
                              @error('neuro_cn_xii')
                              <p class="text-red-500 text-xs p-1">
                                  {{$message}}
                              </p>
                              @enderror                        
                          </p>

                        <p class="flexi">
                          <input
                              type="checkbox"
                              id="neuro_babinski"
                              name="neuro_babinski"
                              value="1"
                              {{ $patient->neurologicalExamination && $patient->neurologicalExamination->neuro_babinski ? 'checked' : '' }}
                          />
                          <label for="neuro_babinski">Babinski</label>
                        </p>


                        <div class="flex-col">
                            <label for="neuro_motor">Motor:</label>
                            <input placeholder="Motor details" type="text" id="neuro_motor" name="neuro_motor" value="{{ optional($patient->neurologicalExamination)->neuro_motor }}"/>
                            @error('neuro_motor')
                            <p class="text-red-500 text-xs p-1">
                                {{$message}}
                            </p>
                            @enderror
                          </div>
                        <div class="flex-col">
                            <label for="neuro_sensory">Sensory:</label>
                            <input placeholder="Sensory details" type="text" id="neuro_sensory" name="neuro_sensory" value="{{ optional($patient->neurologicalExamination)->neuro_sensory }}"/>
                            @error('neuro_sensory')
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
  