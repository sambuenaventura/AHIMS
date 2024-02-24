{{-- <section id="step2" class="hero step" style="display: none"> --}}
      {{-- <form action="/nurse-patients/edit/{{$patient->patient_id}}" method="POST" class="flex flex-col" enctype="multipart/form-data">
          @method('PUT')
          @csrf --}}
          <div class="flex flex-col">

          <div class="hero-content">
              <div class="left">
                  <div class="left-1">
                      <h1>Edit Patient Complete History - Step 2</h1>
                      <h3>I. Medical History</h3>
                      <h3>Review of Systems</h3>


                      <p>Constitutional:</p>
                      <div class="checkboxes">
                        <p class="flexi">
                          <input
                              type="checkbox"
                              id="consti_fever"
                              name="consti_fever"
                              value="1"
                              {{ $patient->reviewOfSystems && $patient->reviewOfSystems->consti_fever ? 'checked' : '' }}
                          />
                          <label for="consti_fever">Fever</label>
                      </p>
                      
                      <p class="flexi">
                          <input
                              type="checkbox"
                              id="consti_anorexia"
                              name="consti_anorexia"
                              value="1"
                              {{ $patient->reviewOfSystems && $patient->reviewOfSystems->consti_anorexia ? 'checked' : '' }}
                          />
                          <label for="consti_anorexia">Anorexia</label>
                      </p>
                      
                      <p class="flexi">
                          <input
                              type="checkbox"
                              id="consti_weight_loss"
                              name="consti_weight_loss"
                              value="1"
                              {{ $patient->reviewOfSystems && $patient->reviewOfSystems->consti_weight_loss ? 'checked' : '' }}
                          />
                          <label for="consti_weight_loss">Weight Loss</label>
                      </p>
                      
                      <p class="flexi">
                          <input
                              type="checkbox"
                              id="consti_fatigue"
                              name="consti_fatigue"
                              value="1"
                              {{ $patient->reviewOfSystems && $patient->reviewOfSystems->consti_fatigue ? 'checked' : '' }}
                          />
                          <label for="consti_fatigue">Fatigue</label>
                      </p>


                      <p>Hematology:</p>
                      <p class="flexi">
                            <input
                                type="checkbox"
                                id="hema_easy_bruisability"
                                name="hema_easy_bruisability"
                                value="1"
                                {{ $patient->reviewOfSystems && $patient->reviewOfSystems->hema_easy_bruisability ? 'checked' : '' }}
                            />
                            <label for="hema_easy_bruisability">Easy Bruisability</label>
                       </p>
                      <p class="flexi">
                            <input
                                type="checkbox"
                                id="hema_abnormal_bleeding"
                                name="hema_abnormal_bleeding"
                                value="1"
                                {{ $patient->reviewOfSystems && $patient->reviewOfSystems->hema_abnormal_bleeding ? 'checked' : '' }}
                            />
                            <label for="hema_abnormal_bleeding">Abnormal Bleeding</label>
                       </p>


                       <p>EENT:</p>
                       <p class="flexi">
                        <input
                            type="checkbox"
                            id="eent_blurring_of_vision"
                            name="eent_blurring_of_vision"
                            value="1"
                            {{ $patient->reviewOfSystems && $patient->reviewOfSystems->eent_blurring_of_vision ? 'checked' : '' }}
                        />
                        <label for="eent_blurring_of_vision">Blurring of vision</label>
                        <input
                            type="checkbox"
                            id="eent_ear_discharges"
                            name="eent_ear_discharges"
                            value="1"
                            {{ $patient->reviewOfSystems && $patient->reviewOfSystems->eent_ear_discharges ? 'checked' : '' }}
                        />
                        <label for="eent_ear_discharges">Ear Discharges</label>
                        </p>
                        <p class="flexi">
                            <input
                                type="checkbox"
                                id="eent_hearing_loss"
                                name="eent_hearing_loss"
                                value="1"
                                {{ $patient->reviewOfSystems && $patient->reviewOfSystems->eent_hearing_loss ? 'checked' : '' }}
                            />
                            <label for="eent_hearing_loss">Hearing loss</label>
                            <input
                                type="checkbox"
                                id="eent_nose_bleed"
                                name="eent_nose_bleed"
                                value="1"
                                {{ $patient->reviewOfSystems && $patient->reviewOfSystems->eent_nose_bleed ? 'checked' : '' }}
                            />
                            <label for="eent_nose_bleed">Nose bleed</label>
                        </p>
                        <p class="flexi">
                            <input
                                type="checkbox"
                                id="eent_tinnitus"
                                name="eent_tinnitus"
                                value="1"
                                {{ $patient->reviewOfSystems && $patient->reviewOfSystems->eent_tinnitus ? 'checked' : '' }}
                            />
                            <label for="eent_tinnitus">Tinnitus</label>
                            <input
                                type="checkbox"
                                id="eent_mouth_snores"
                                name="eent_mouth_snores"
                                value="1"
                                {{ $patient->reviewOfSystems && $patient->reviewOfSystems->eent_mouth_snores ? 'checked' : '' }}
                            />
                            <label for="eent_mouth_snores">Mouth snores</label>
                        </p>
  



                        <p>CNS:</p>
                        <p class="flexi">
                         <input
                             type="checkbox"
                             id="cns_headache"
                             name="cns_headache"
                             value="1"
                             {{ $patient->reviewOfSystems && $patient->reviewOfSystems->cns_headache ? 'checked' : '' }}
                         />
                         <label for="cns_headache">Headache</label>
                         <input
                             type="checkbox"
                             id="cns_tremors"
                             name="cns_tremors"
                             value="1"
                             {{ $patient->reviewOfSystems && $patient->reviewOfSystems->cns_tremors ? 'checked' : '' }}
                         />
                         <label for="cns_tremors">Tremors</label>
                         </p>
                         <p class="flexi">
                             <input
                                 type="checkbox"
                                 id="cns_dizziness"
                                 name="cns_dizziness"
                                 value="1"
                                 {{ $patient->reviewOfSystems && $patient->reviewOfSystems->cns_dizziness ? 'checked' : '' }}
                             />
                             <label for="cns_dizziness">Dizziness</label>
                             <input
                                 type="checkbox"
                                 id="cns_paralysis"
                                 name="cns_paralysis"
                                 value="1"
                                 {{ $patient->reviewOfSystems && $patient->reviewOfSystems->cns_paralysis ? 'checked' : '' }}
                             />
                             <label for="cns_paralysis">Paralysis</label>
                         </p>
                         <p class="flexi">
                             <input
                                 type="checkbox"
                                 id="cns_seizures"
                                 name="cns_seizures"
                                 value="1"
                                 {{ $patient->reviewOfSystems && $patient->reviewOfSystems->cns_seizures ? 'checked' : '' }}
                             />
                             <label for="cns_seizures">Seizures</label>
                             <input
                                 type="checkbox"
                                 id="cns_numbness_or_tingling_of_sensations"
                                 name="cns_numbness_or_tingling_of_sensations"
                                 value="1"
                                 {{ $patient->reviewOfSystems && $patient->reviewOfSystems->cns_numbness_or_tingling_of_sensations ? 'checked' : '' }}
                             />
                             <label for="cns_numbness_or_tingling_of_sensations">Numbness or tingling of sensations</label>
                         </p>



                         <p>Respiratory:</p>
                         <p class="flexi">
                          <input
                              type="checkbox"
                              id="respi_dyspnea"
                              name="respi_dyspnea"
                              value="1"
                              {{ $patient->reviewOfSystems && $patient->reviewOfSystems->respi_dyspnea ? 'checked' : '' }}
                          />
                          <label for="respi_dyspnea">Dyspnea</label>
                          <input
                              type="checkbox"
                              id="respi_orthopnea"
                              name="respi_orthopnea"
                              value="1"
                              {{ $patient->reviewOfSystems && $patient->reviewOfSystems->respi_orthopnea ? 'checked' : '' }}
                          />
                          <label for="respi_orthopnea">Orthopnea</label>
                          </p>
                          <p class="flexi">
                              <input
                                  type="checkbox"
                                  id="respi_cough"
                                  name="respi_cough"
                                  value="1"
                                  {{ $patient->reviewOfSystems && $patient->reviewOfSystems->respi_cough ? 'checked' : '' }}
                              />
                              <label for="respi_cough">Cough</label>
                              <input
                                  type="checkbox"
                                  id="respi_shortness_of_breath"
                                  name="respi_shortness_of_breath"
                                  value="1"
                                  {{ $patient->reviewOfSystems && $patient->reviewOfSystems->respi_shortness_of_breath ? 'checked' : '' }}
                              />
                              <label for="respi_shortness_of_breath">Shortness of breath</label>
                          </p>
                          <p class="flexi">
                              <input
                                  type="checkbox"
                                  id="respi_colds"
                                  name="respi_colds"
                                  value="1"
                                  {{ $patient->reviewOfSystems && $patient->reviewOfSystems->respi_colds ? 'checked' : '' }}
                              />
                              <label for="respi_colds">Colds</label>
                              <input
                                  type="checkbox"
                                  id="respi_hemoptysis"
                                  name="respi_hemoptysis"
                                  value="1"
                                  {{ $patient->reviewOfSystems && $patient->reviewOfSystems->respi_hemoptysis ? 'checked' : '' }}
                              />
                              <label for="respi_hemoptysis">Hemoptysis</label>
                          </p>                         


                          <p>CVS:</p>
                          <p class="flexi">
                           <input
                               type="checkbox"
                               id="cvs_chest_pain"
                               name="cvs_chest_pain"
                               value="1"
                               {{ $patient->reviewOfSystems && $patient->reviewOfSystems->cvs_chest_pain ? 'checked' : '' }}
                           />
                           <label for="cvs_chest_pain">Chest pain</label>
                           </p>
                           <p class="flexi">
                               <input
                                   type="checkbox"
                                   id="cvs_palpitations"
                                   name="cvs_palpitations"
                                   value="1"
                                   {{ $patient->reviewOfSystems && $patient->reviewOfSystems->cvs_palpitations ? 'checked' : '' }}
                               />
                               <label for="cvs_palpitations">Palpitations</label>
                           </p>
                           <p class="flexi">
                               <input
                                   type="checkbox"
                                   id="cvs_swelling_of_lower_extremities"
                                   name="cvs_swelling_of_lower_extremities"
                                   value="1"
                                   {{ $patient->reviewOfSystems && $patient->reviewOfSystems->cvs_swelling_of_lower_extremities ? 'checked' : '' }}
                               />
                               <label for="cvs_swelling_of_lower_extremities">Swelling of lower extremities</label>
                           </p>   



                           <p>GIT:</p>
                           <p class="flexi">
                            <input
                                type="checkbox"
                                id="git_diarrhea"
                                name="git_diarrhea"
                                value="1"
                                {{ $patient->reviewOfSystems && $patient->reviewOfSystems->git_diarrhea ? 'checked' : '' }}
                            />
                            <label for="git_diarrhea">Diarrhea</label>
                            <input
                                type="checkbox"
                                id="git_change_in_bowel_movement"
                                name="git_change_in_bowel_movement"
                                value="1"
                                {{ $patient->reviewOfSystems && $patient->reviewOfSystems->git_change_in_bowel_movement ? 'checked' : '' }}
                            />
                            <label for="git_change_in_bowel_movement">Change in bowel movement</label>
                            </p>
                            <p class="flexi">
                                <input
                                    type="checkbox"
                                    id="git_constipation"
                                    name="git_constipation"
                                    value="1"
                                    {{ $patient->reviewOfSystems && $patient->reviewOfSystems->git_constipation ? 'checked' : '' }}
                                />
                                <label for="git_constipation">Constipation</label>
                                <input
                                    type="checkbox"
                                    id="git_nausea"
                                    name="git_nausea"
                                    value="1"
                                    {{ $patient->reviewOfSystems && $patient->reviewOfSystems->git_nausea ? 'checked' : '' }}
                                />
                                <label for="git_nausea">Nausea</label>
                            </p>
                            <p class="flexi">
                                <input
                                    type="checkbox"
                                    id="git_abdominal_pain"
                                    name="git_abdominal_pain"
                                    value="1"
                                    {{ $patient->reviewOfSystems && $patient->reviewOfSystems->git_abdominal_pain ? 'checked' : '' }}
                                />
                                <label for="git_abdominal_pain">Abdominal pain</label>
                                <input
                                    type="checkbox"
                                    id="git_vomiting"
                                    name="git_vomiting"
                                    value="1"
                                    {{ $patient->reviewOfSystems && $patient->reviewOfSystems->git_vomiting ? 'checked' : '' }}
                                />
                                <label for="git_vomiting">Vomiting</label>
                            </p>  
                            <p class="flexi">
                                <input
                                    type="checkbox"
                                    id="git_loss_of_appetite"
                                    name="git_loss_of_appetite"
                                    value="1"
                                    {{ $patient->reviewOfSystems && $patient->reviewOfSystems->git_loss_of_appetite ? 'checked' : '' }}
                                />
                                <label for="git_loss_of_appetite">Loss of appetite</label>
                                <input
                                    type="checkbox"
                                    id="git_hematochezia"
                                    name="git_hematochezia"
                                    value="1"
                                    {{ $patient->reviewOfSystems && $patient->reviewOfSystems->git_hematochezia ? 'checked' : '' }}
                                />
                                <label for="git_hematochezia">Hematochezia</label>
                            </p>  


                            <p>Genitourinary tract:</p>
                            <p class="flexi">
                             <input
                                 type="checkbox"
                                 id="genittract_dysuria"
                                 name="genittract_dysuria"
                                 value="1"
                                 {{ $patient->reviewOfSystems && $patient->reviewOfSystems->genittract_dysuria ? 'checked' : '' }}
                             />
                             <label for="genittract_dysuria">Dysuria</label>
                             </p>
                             <p class="flexi">
                                 <input
                                     type="checkbox"
                                     id="genittract_urgency"
                                     name="genittract_urgency"
                                     value="1"
                                     {{ $patient->reviewOfSystems && $patient->reviewOfSystems->genittract_urgency ? 'checked' : '' }}
                                 />
                                 <label for="genittract_urgency">Urgency</label>
                             </p>
                             <p class="flexi">
                                 <input
                                     type="checkbox"
                                     id="genittract_frequency"
                                     name="genittract_frequency"
                                     value="1"
                                     {{ $patient->reviewOfSystems && $patient->reviewOfSystems->genittract_frequency ? 'checked' : '' }}
                                 />
                                 <label for="genittract_frequency">Frequency</label>
                             </p>  
                             <p class="flexi">
                                 <input
                                     type="checkbox"
                                     id="genittract_flank_pain"
                                     name="genittract_flank_pain"
                                     value="1"
                                     {{ $patient->reviewOfSystems && $patient->reviewOfSystems->genittract_flank_pain ? 'checked' : '' }}
                                 />
                                 <label for="genittract_flank_pain">Flank pain</label>
                             </p>  
                             <p class="flexi">
                                 <input
                                     type="checkbox"
                                     id="genittract_vaginal_discharge"
                                     name="genittract_vaginal_discharge"
                                     value="1"
                                     {{ $patient->reviewOfSystems && $patient->reviewOfSystems->genittract_vaginal_discharge ? 'checked' : '' }}
                                 />
                                 <label for="genittract_vaginal_discharge">Vaginal discharge</label>
                             </p>  







                             <p>Musculoskeletal:</p>
                             <p class="flexi">
                              <input
                                  type="checkbox"
                                  id="musculo_joint_pains"
                                  name="musculo_joint_pains"
                                  value="1"
                                  {{ $patient->reviewOfSystems && $patient->reviewOfSystems->musculo_joint_pains ? 'checked' : '' }}
                              />
                              <label for="musculo_joint_pains">Joint pains</label>
                              </p>
                              <p class="flexi">
                                  <input
                                      type="checkbox"
                                      id="musculo_muscle_weakness"
                                      name="musculo_muscle_weakness"
                                      value="1"
                                      {{ $patient->reviewOfSystems && $patient->reviewOfSystems->musculo_muscle_weakness ? 'checked' : '' }}
                                  />
                                  <label for="musculo_muscle_weakness">Muscle weakness</label>
                              </p>
                              <p class="flexi">
                                  <input
                                      type="checkbox"
                                      id="musculo_back_pains"
                                      name="musculo_back_pains"
                                      value="1"
                                      {{ $patient->reviewOfSystems && $patient->reviewOfSystems->musculo_back_pains ? 'checked' : '' }}
                                  />
                                  <label for="musculo_back_pains">Back pains</label>
                              </p>  
                              <p class="flexi">
                                  <input
                                      type="checkbox"
                                      id="musculo_difficulty_in_walking"
                                      name="musculo_difficulty_in_walking"
                                      value="1"
                                      {{ $patient->reviewOfSystems && $patient->reviewOfSystems->musculo_difficulty_in_walking ? 'checked' : '' }}
                                  />
                                  <label for="musculo_difficulty_in_walking">Difficulty in walking</label>
                              </p>  









                   
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
  