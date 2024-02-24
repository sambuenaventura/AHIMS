{{-- <section id="step1" class="step active hero"> --}}
    {{-- <form action="/nurse-patients/edit/{{$patient->patient_id}}" method="POST" class="flex flex-col" enctype="multipart/form-data"> --}}
        <div class="flex flex-col">

        <div class="hero-content">
            <div class="left">
                <div class="left-1">
                    <h1>Edit Patient Complete History - Step 1</h1>
                    <h3>I. Medical History</h3>
                    <div class="flex-col">
                        <label for="complete_history">Complete History</label>
                        <input type="text" id="complete_history" name="complete_history" value="{{ optional($patient->medicalHistory)->complete_history }}"/>
                        @error('complete_history')
                        <p class="text-red-500 text-xs p-1">
                            {{$message}}
                        </p>
                        @enderror
                    </div>

                    <h5>Past Medical History</h5>
                    <div class="checkboxes">
                        <p class="flexi">

                        <input
                        type="checkbox"
                        id="hypertension"
                        name="hypertension"
                        value="true"
                        {{ $patient->medicalHistory && $patient->medicalHistory->hypertension ? 'checked' : '' }}
                    />
                    <label for="hypertension">Hypertension</label>
                            <input
                                type="checkbox"
                                id="cvd"
                                name="cvd"
                                value="true"
                                {{ $patient->medicalHistory && $patient->medicalHistory->cvd ? 'checked' : '' }}
                            />
                            <label for="cvd">Cardiovascular Disease</label>
                        </p>
                        <p class="flexi">
                            <input
                                type="checkbox"
                                id="diabetes"
                                name="diabetes"
                                value="true"
                                {{ $patient->medicalHistory && $patient->medicalHistory->diabetes ? 'checked' : '' }}
                            />
                            <label for="diabetes">Diabetes</label>
                            <input
                                type="checkbox"
                                id="stroke"
                                name="stroke"
                                value="true"
                                {{ $patient->medicalHistory && $patient->medicalHistory->stroke ? 'checked' : '' }}
                                />
                            <label for="stroke">Stroke</label>
                        </p>
                        <p class="flexi">
                            <input
                                type="checkbox"
                                id="asthma"
                                name="asthma"
                                value="true"
                                {{ $patient->medicalHistory && $patient->medicalHistory->asthma ? 'checked' : '' }}
                            />
                            <label for="asthma">Asthma</label>
                            <input
                                type="checkbox"
                                id="mental_neuropsychiatric_illness"
                                name="mental_neuropsychiatric_illness"
                                value="true"
                                {{ $patient->medicalHistory && $patient->medicalHistory->mental_neuropsychiatric_illness ? 'checked' : '' }}
                                />
                            <label for="mental_neuropsychiatric_illness">Mental Neuropsychiatric Illness</label>
                        </p>
                        <p class="flexi">
                            <input
                                type="checkbox"
                                id="previous_hospitalization"
                                name="previous_hospitalization"
                                value="true"
                                {{ $patient->medicalHistory && $patient->medicalHistory->previous_hospitalization ? 'checked' : '' }}
                                />
                            <label for="previous_hospitalization">Previous Hospitalization</label>
                            <input
                                type="checkbox"
                                id="medications"
                                name="medications"
                                value="true"
                                {{ $patient->medicalHistory && $patient->medicalHistory->medications ? 'checked' : '' }}
                                />
                            <label for="medications">Medications</label>
                        </p>
                        <p class="flexi">
                            <input
                                type="checkbox"
                                id="allergies"
                                name="allergies"
                                value="true"
                                {{ $patient->medicalHistory && $patient->medicalHistory->allergies ? 'checked' : '' }}
                            />
                            <label for="allergies">Allergies</label>
                            <input
                                type="checkbox"
                                id="others_checkbox"
                                name="others_checkbox"
                                value="true"
                                {{ $patient->medicalHistory && $patient->medicalHistory->others_checkbox ? 'checked' : '' }}
                                />
                            <label for="others_checkbox">Others</label>
                        </p>
                        <div class="">
                            <p>
                                <label for="hypertension_years">Hypertension:</label>
                                <input type="number" id="hypertension_years" name="hypertension_years" value="{{ optional($patient->medicalHistory)->hypertension_years }}" disabled/>
                                @error('hypertension_years')
                                <p class="text-red-500 text-xs p-1">
                                    {{$message}}
                                </p>
                                @enderror
                            </p>
                            
                            
                            <p>
                                <label for="diabetes_years">Diabetes:</label>
                                <input type="number" id="diabetes_years" name="diabetes_years" value="{{ optional($patient->medicalHistory)->diabetes_years }}" disabled/>
                                @error('diabetes_years')
                                <p class="text-red-500 text-xs p-1">
                                    {{$message}}
                                </p>
                                @enderror
                            </p>
                            <p>
                                <label for="asthma_years">Asthma:</label>
                                <input type="number" id="asthma_years" name="asthma_years" value="{{ optional($patient->medicalHistory)->asthma_years }}" disabled/>
                                @error('asthma_years')
                                <p class="text-red-500 text-xs p-1">
                                    {{$message}}
                                </p>
                                @enderror                                </p>
                            <div class="flex-col">
                                <label for="hospitalization_details">Previous Hospitalization</label>
                                <input type="text" id="hospitalization_details" name="hospitalization_details" value="{{ optional($patient->medicalHistory)->hospitalization_details }}" disabled/>
                                @error('hospitalization_details')
                                <p class="text-red-500 text-xs p-1">
                                    {{$message}}
                                </p>
                                @enderror                              </div>
                            <p>
                                <div class="flex-col">
                                <label for="allergies_details">Allergies</label>
                                <input type="text" id="allergies_details" name="allergies_details" value="{{ optional($patient->medicalHistory)->allergies_details }}" disabled/>
                                @error('allergies_details')
                                <p class="text-red-500 text-xs p-1">
                                    {{$message}}
                                </p>
                                @enderror                           </div>
                            <p>
                                <label for="cvd_year">CVD:</label>
                                <input type="number" id="cvd_year" name="cvd_year" value="{{ optional($patient->medicalHistory)->cvd_year }}" disabled/>
                                @error('cvd_year')
                                <p class="text-red-500 text-xs p-1">
                                    {{$message}}
                                </p>
                                @enderror                              </p>
                            <p>
                                <label for="stroke_year">Stroke:</label>
                                <input type="number" id="stroke_year" name="stroke_year" value="{{ optional($patient->medicalHistory)->stroke_year }}" disabled/>
                                @error('stroke_year')
                                <p class="text-red-500 text-xs p-1">
                                    {{$message}}
                                </p>
                                @enderror                                </p>
                            <div class="flex-col">
                                <label for="mental_neuropsychiatric_illness_details">Mental / Neuropsyciatric Illness:</label>
                                <input type="text" id="mental_neuropsychiatric_illness_details" name="mental_neuropsychiatric_illness_details" value="{{ optional($patient->medicalHistory)->mental_neuropsychiatric_illness_details }}" disabled/>
                                @error('mental_neuropsychiatric_illness_details')
                                <p class="text-red-500 text-xs p-1">
                                    {{$message}}
                                </p>
                                @enderror                                 </div>
                            <div class="flex-col">
                                <label for="medications_details">Medications:</label>
                                <input type="text" id="medications_details" name="medications_details" value="{{ optional($patient->medicalHistory)->medications_details }}" disabled/>
                                @error('medications_details')
                                <p class="text-red-500 text-xs p-1">
                                    {{$message}}
                                </p>
                                @enderror                              </div>
                            <div class="flex-col">
                                <label for="others_details">Others:</label>
                                <input type="text" id="others_details" name="others_details" value="{{ optional($patient->medicalHistory)->others_details }}" disabled/>
                                @error('others_details')
                                <p class="text-red-500 text-xs p-1">
                                    {{$message}}
                                </p>
                                @enderror                              
                             </div>
                            
                        </div> 

                            <!-- Repeat the pattern for other past medical history checkboxes -->
                            <!-- ... -->
                        
                    </div>

                     <h5>Family History</h5>
                    <div class="checkboxes">
                        <p class="flexi">
                            <input
                                type="checkbox"
                                id="family_hypertension"
                                name="family_hypertension"
                                value="true"
                                {{ $patient->medicalHistory && $patient->medicalHistory->family_hypertension ? 'checked' : '' }}/>
                            <label for="family_hypertension">Hypertension</label>
                            <input
                                type="checkbox"
                                id="family_asthma"
                                name="family_asthma"
                                value="true"
                                {{ $patient->medicalHistory && $patient->medicalHistory->family_asthma ? 'checked' : '' }}/>
                            <label for="family_asthma">Asthma</label>
                        </p>
                        <p class="flexi">
                            <input
                                type="checkbox"
                                id="family_diabetes"
                                name="family_diabetes"
                                value="true"
                                {{ $patient->medicalHistory && $patient->medicalHistory->family_diabetes ? 'checked' : '' }}/>
                            <label for="family_diabetes">Diabetes</label>
                            <input
                                type="checkbox"
                                id="family_heart_disease"
                                name="family_heart_disease"
                                value="true"
                                {{ $patient->medicalHistory && $patient->medicalHistory->family_heart_disease ? 'checked' : '' }}/>
                            <label for="family_heart_disease">Heart Disease</label>
                        </p>
                        <p class="flexi">
                            <input
                                type="checkbox"
                                id="family_cancer"
                                name="family_cancer"
                                value="true"
                                {{ $patient->medicalHistory && $patient->medicalHistory->family_cancer ? 'checked' : '' }}/>
                            <label for="family_cancer">Cancer</label>
                            <input
                                type="checkbox"
                                id="family_others_checkbox"
                                name="family_others_checkbox"
                                value="true"
                                {{ $patient->medicalHistory && $patient->medicalHistory->family_others_checkbox ? 'checked' : '' }}/>
                            <label for="family_others_checkbox">Others</label>
                        </p>
                            <!-- Repeat the pattern for other family history checkboxes -->
                            <!-- ... -->
                        </p>
                    </div>
                    <h5>Personal/Social History</h5>
                    <div class="checkboxes">
                        <p class="flexi">
                            <input
                                type="checkbox"
                                id="personal_smoker"
                                name="personal_smoker"
                                value="true"
                                {{ $patient->medicalHistory && $patient->medicalHistory->personal_smoker ? 'checked' : '' }}/>
                            <label for="personal_smoker">Smoker</label>
                            <input
                                type="checkbox"
                                id="personal_drug_abuse"
                                name="personal_drug_abuse"
                                value="true"
                                {{ $patient->medicalHistory && $patient->medicalHistory->personal_drug_abuse ? 'checked' : '' }}/>
                            <label for="personal_drug_abuse">Drug Abuse</label>

                        </p>
                        <p class="flexi">
                            <input
                                type="checkbox"
                                id="personal_alcohol_drinker"
                                name="personal_alcohol_drinker"
                                value="true"
                                {{ $patient->medicalHistory && $patient->medicalHistory->personal_alcohol_drinker ? 'checked' : '' }}/>
                            <label for="personal_alcohol_drinker">Alcohol Drinker</label>
                        </p>
                            <!-- Repeat the pattern for other personal/social history checkboxes -->
                            <!-- ... -->
                        
                    </div>

                    <h5>Menstrual History</h5>
                    <div class="">
                        <p>
                            <label for="menstrual_interval">Menstrual Interval:</label>
                            <input type="text" id="menstrual_interval" name="menstrual_interval" value="{{ optional($patient->medicalHistory)->menstrual_interval }}"/>
                            @error('menstrual_interval')
                            <p class="text-red-500 text-xs p-1">
                                {{$message}}
                            </p>
                            @enderror                        
                        </p>
                        <p>
                            <label for="menstrual_duration">Menstrual Duration:</label>
                            <input type="text" id="menstrual_duration" name="menstrual_duration" value="{{ optional($patient->medicalHistory)->menstrual_duration }}"/>
                            @error('menstrual_duration')
                            <p class="text-red-500 text-xs p-1">
                                {{$message}}
                            </p>
                            @enderror                          
                        </p>
                        <p>
                            <label for="menstrual_dysmenorrhea">Dysmenorrhea:</label>
                            <input type="text" id="menstrual_dysmenorrhea" name="menstrual_dysmenorrhea" value="{{ optional($patient->medicalHistory)->menstrual_dysmenorrhea }}"/>
                            @error('menstrual_dysmenorrhea')
                            <p class="text-red-500 text-xs p-1">
                                {{$message}}
                            </p>
                            @enderror                            
                        </p>
                    </div>

                    <h5>For Obstetrical History</h5>
                    <div class="">
                        <p class="flexi">
                            <label for="obstetrical_lmp">LMP:</label>
                            <input type="text" id="obstetrical_lmp" name="obstetrical_lmp" value="{{ optional($patient->medicalHistory)->obstetrical_lmp }}"/>
                            @error('obstetrical_lmp')
                            <p class="text-red-500 text-xs p-1">
                                {{$message}}
                            </p>
                            @enderror   
                            <label for="obstetrical_pmp">PMP:</label>
                            <input type="text" id="obstetrical_pmp" name="obstetrical_pmp" value="{{ optional($patient->medicalHistory)->obstetrical_pmp }}"/>
                            @error('obstetrical_pmp')
                            <p class="text-red-500 text-xs p-1">
                                {{$message}}
                            </p>
                            @enderror
                        </p>
                        <p class="flexi">
                            <label for="obstetrical_aog">AOG:</label>
                            <input type="text" id="obstetrical_aog" name="obstetrical_aog" value="{{ optional($patient->medicalHistory)->obstetrical_aog }}"/>
                            @error('obstetrical_aog')
                            <p class="text-red-500 text-xs p-1">
                                {{$message}}
                            </p>
                            @enderror

                            <label for="obstetrical_edc">EDC:</label>
                            <input type="text" id="obstetrical_edc" name="obstetrical_edc" value="{{ optional($patient->medicalHistory)->obstetrical_edc }}"/>
                            @error('obstetrical_edc')
                            <p class="text-red-500 text-xs p-1">
                                {{$message}}
                            </p>
                            @enderror
                        </p>
                        <p>
                            <label for="obstetrical_prenatal_checkups">Prenatal Check-ups:</label>
                            <input type="text" id="obstetrical_prenatal_checkups" name="obstetrical_prenatal_checkups" value="{{ optional($patient->medicalHistory)->obstetrical_prenatal_checkups }}"/>
                            @error('obstetrical_prenatal_checkups')
                            <p class="text-red-500 text-xs p-1">
                                {{$message}}
                            </p>
                            @enderror
                        </p>
                        <p class="flexi">
                            <label for="obstetrical_gravida">The Patient is Gravida:</label>
                            <input type="text" id="obstetrical_gravida" name="obstetrical_gravida" value="{{ optional($patient->medicalHistory)->obstetrical_gravida }}"/>
                            @error('obstetrical_gravida')
                            <p class="text-red-500 text-xs p-1">
                                {{$message}}
                            </p>
                            @enderror
                            <label for="obstetrical_para">Para:</label>
                            <input type="text" id="obstetrical_para" name="obstetrical_para" value="{{ optional($patient->medicalHistory)->obstetrical_para }}"/>
                            @error('obstetrical_para')
                            <p class="text-red-500 text-xs p-1">
                                {{$message}}
                            </p>
                            @enderror                        
                        </p>
                    </div>

                    <h5>First Pregnancy</h5>
                    <div class="flexi">
                        <label for="obstetrical_first_pregnancy_delivered_on">Delivered on</label>
                        <input type="date" id="obstetrical_first_pregnancy_delivered_on" name="obstetrical_first_pregnancy_delivered_on" value="{{ optional($patient->medicalHistory)->obstetrical_first_pregnancy_delivered_on }}"/>
                        @error('obstetrical_first_pregnancy_delivered_on')
                        <p class="text-red-500 text-xs p-1">
                            {{ $message }}
                        </p>
                        @enderror

                        <label for="obstetrical_first_pregnancy_term_preterm">to a</label>
                        <select id="obstetrical_first_pregnancy_term_preterm" name="obstetrical_first_pregnancy_term_preterm">
                            <option value=""></option>
                            <option value="term" {{ old('obstetrical_first_pregnancy_term_preterm', optional($patient->medicalHistory)->obstetrical_first_pregnancy_term_preterm) === 'term' ? 'selected' : '' }}>term</option>
                            <option value="preterm" {{ old('obstetrical_first_pregnancy_term_preterm', optional($patient->medicalHistory)->obstetrical_first_pregnancy_term_preterm) === 'preterm' ? 'selected' : '' }}>preterm</option>
                        </select>
                        @error('obstetrical_first_pregnancy_term_preterm')
                            <p class="text-red-500 text-xs p-1">{{ $message }}</p>
                        @enderror
                        
                    </div>
                    <div class="flexi">
                        <label for="obstetrical_first_pregnancy_girl_boy">birth living</label>
                        <select id="obstetrical_first_pregnancy_girl_boy" name="obstetrical_first_pregnancy_girl_boy">
                            <option value=""></option>
                            <option value="girl" {{ old('obstetrical_first_pregnancy_girl_boy', optional($patient->medicalHistory)->obstetrical_first_pregnancy_girl_boy) === 'girl' ? 'selected' : '' }}>girl</option>
                            <option value="boy" {{ old('obstetrical_first_pregnancy_girl_boy', optional($patient->medicalHistory)->obstetrical_first_pregnancy_girl_boy) === 'boy' ? 'selected' : '' }}>boy</option>
                        </select>
                        @error('obstetrical_first_pregnancy_girl_boy')
                            <p class="text-red-500 text-xs p-1">{{ $message }}</p>
                        @enderror

                        <label class="label-nospace" for="obstetrical_first_pregnancy_delivery_method">via</label>
                        <select id="obstetrical_first_pregnancy_delivery_method" name="obstetrical_first_pregnancy_delivery_method">
                            <option value=""></option>
                            <option value="nsd" {{ old('obstetrical_first_pregnancy_delivery_method', optional($patient->medicalHistory)->obstetrical_first_pregnancy_delivery_method) === 'nsd' ? 'selected' : '' }}>nsd</option>
                            <option value="cs" {{ old('obstetrical_first_pregnancy_delivery_method', optional($patient->medicalHistory)->obstetrical_first_pregnancy_delivery_method) === 'cs' ? 'selected' : '' }}>cs</option>
                        </select>
                        @error('obstetrical_first_pregnancy_delivery_method')
                            <p class="text-red-500 text-xs p-1">{{ $message }}</p>
                        @enderror
                        <label for="obstetrical_first_pregnancy_delivery_place">at a</label>
                        <input type="text" id="obstetrical_first_pregnancy_delivery_place" name="obstetrical_first_pregnancy_delivery_place" value="{{ optional($patient->medicalHistory)->obstetrical_first_pregnancy_delivery_place }}"/>
                        @error('obstetrical_first_pregnancy_delivery_place')
                            <p class="text-red-500 text-xs p-1">
                                {{$message}}
                            </p>
                        @enderror                    
                    </div>

                    <h5>Pediatric Medical History</h5>
                    <div class="flexi">
                        <label for="pediatric_term">Term</label>
                        <input type="text" id="pediatric_term" name="pediatric_term" value="{{ optional($patient->medicalHistory)->pediatric_term }}"/>
                        @error('pediatric_term')
                            <p class="text-red-500 text-xs p-1">
                                {{$message}}
                            </p>
                            @enderror                    
    
                            <label for="pediatric_preterm">Preterm</label>
                            <input type="text" id="pediatric_preterm" name="pediatric_preterm" value="{{ optional($patient->medicalHistory)->pediatric_preterm }}"/>
                            @error('pediatric_preterm')
                            <p class="text-red-500 text-xs p-1">
                                {{$message}}
                            </p>
                        @enderror                      
                    </div>
                    <div class="flexi">
                        <label for="pediatric_postterm">Postterm</label>
                        <input type="text" id="pediatric_postterm" name="pediatric_postterm" value="{{ optional($patient->medicalHistory)->pediatric_postterm }}"/>
                        @error('pediatric_postterm')
                            <p class="text-red-500 text-xs p-1">
                                {{$message}}
                            </p>
                        @enderror
                        <p>(AOG)</p>
                    </div>
                    <div class="flexi">
                        <label for="pediatric_age_of_mother_at_pregnancy">Age of mother at pregnancy:</label>
                        <input type="text" id="pediatric_age_of_mother_at_pregnancy" name="pediatric_age_of_mother_at_pregnancy" value="{{ optional($patient->medicalHistory)->pediatric_age_of_mother_at_pregnancy }}"/>
                        @error('pediatric_age_of_mother_at_pregnancy')
                            <p class="text-red-500 text-xs p-1">
                                {{$message}}
                            </p>
                        @enderror
                    </div>
                    <div class="flexi">
                        <label for="pediatric_no_of_pregnancy">No. of pregnancy:</label>
                        <input type="text" id="pediatric_no_of_pregnancy" name="pediatric_no_of_pregnancy" value="{{ optional($patient->medicalHistory)->pediatric_no_of_pregnancy }}"/>
                        @error('pediatric_no_of_pregnancy')
                            <p class="text-red-500 text-xs p-1">
                                {{$message}}
                            </p>
                        @enderror

                        <label for="pediatric_no_of_pregnancy_first">first</label>
                        <input type="text" id="pediatric_no_of_pregnancy_first" name="pediatric_no_of_pregnancy_first" value="{{ optional($patient->medicalHistory)->pediatric_no_of_pregnancy_first }}"/>
                        @error('pediatric_no_of_pregnancy_first')
                            <p class="text-red-500 text-xs p-1">
                                {{$message}}
                            </p>
                        @enderror                    
                    </div>
                    <div class="flexi">
                        <label for="pediatric_no_of_pregnancy_second">second</label>
                        <input type="text" id="pediatric_no_of_pregnancy_second" name="pediatric_no_of_pregnancy_second" value="{{ optional($patient->medicalHistory)->pediatric_no_of_pregnancy_second }}"/>
                        @error('pediatric_no_of_pregnancy_second')
                            <p class="text-red-500 text-xs p-1">
                                {{$message}}
                            </p>
                        @enderror

                        <label for="pediatric_no_of_pregnancy_third">third</label>
                        <input type="text" id="pediatric_no_of_pregnancy_third" name="pediatric_no_of_pregnancy_third" value="{{ optional($patient->medicalHistory)->pediatric_no_of_pregnancy_third }}"/>
                        @error('pediatric_no_of_pregnancy_third')
                            <p class="text-red-500 text-xs p-1">
                                {{$message}}
                            </p>
                        @enderror

                        <label for="pediatric_no_of_pregnancy_others">others</label>
                        <input type="text" id="pediatric_no_of_pregnancy_others" name="pediatric_no_of_pregnancy_others" value="{{ optional($patient->medicalHistory)->pediatric_no_of_pregnancy_others }}"/>
                        @error('pediatric_no_of_pregnancy_others')
                            <p class="text-red-500 text-xs p-1">
                                {{$message}}
                            </p>
                        @enderror                    
                    </div>
                    <div class="flex-col">
                        <label for="pediatric_complications_during_pregnancy">Maternal Complication during pregnancy:</label>
                        <input type="text" id="pediatric_complications_during_pregnancy" name="pediatric_complications_during_pregnancy" value="{{ optional($patient->medicalHistory)->pediatric_complications_during_pregnancy }}"/>
                        @error('pediatric_complications_during_pregnancy')
                            <p class="text-red-500 text-xs p-1">
                                {{$message}}
                            </p>
                        @enderror                    
                    </div>
                    <div class="flex-col">
                        <label for="pediatric_immunizations">Immunizations:</label>
                        <input type="text" id="pediatric_immunizations" name="pediatric_immunizations" value="{{ optional($patient->medicalHistory)->pediatric_immunizations }}"/>
                        @error('pediatric_immunizations')
                            <p class="text-red-500 text-xs p-1">
                                {{$message}}
                            </p>
                        @enderror                    
                    </div> 

                    <button type="button" onclick="nextStep()" class="block py-2 pr-3 pl-3 bg-custom-50 rounded-lg text-white">Next</button>
                </div>
            </div>
        </div>
            <button type="submit" class="bg-custom-50 hover:bg-custom-50 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200" type="submit">
                Update
            </button>
        </div>

    {{-- </form> --}}

{{-- </section> --}}
