<section id="step1" class="step active hero">
    <form action="/nurse-patients/edit/{{$patient->patient_id}}" method="POST" class="flex flex-col" enctype="multipart/form-data">
        @method('PUT')
        @csrf
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
                            <label for="complete_history">Complete History</label>
                            <input type="text" id="complete_history" name="complete_history" value="{{ optional($patient->medicalHistory)->complete_history }}"/>
                            @error('complete_history')
                            <p class="text-red-500 text-xs p-1">
                                {{$message}}
                            </p>
                        @enderror
                        </p>
                        {{-- <p class="flexi">
                            <input
                                type="checkbox"
                                id="Diabetes"
                                name="Diabetes"
                                value="true"
                            />
                            <label for="Diabetes">Diabetes</label>
                            <input
                                type="checkbox"
                                id="stroke"
                                name="stroke"
                                value="true"
                            />
                            <label for="stroke">Stroke</label>
                        </p>
                        <p class="flexi">
                            <input
                                type="checkbox"
                                id="asthma"
                                name="asthma"
                                value="true"
                            />
                            <label for="asthma">Asthma</label>
                            <input
                                type="checkbox"
                                id="mental_neuropsychiatric_illness"
                                name="mental_neuropsychiatric_illness"
                                value="true"
                            />
                            <label for="mental_neuropsychiatric_illness">Mental Neuropsychiatric Illness</label>
                        </p>
                        <p class="flexi">
                            <input
                                type="checkbox"
                                id="previous_hospitalization"
                                name="previous_hospitalization"
                                value="true"
                            />
                            <label for="previous_hospitalization">Previous Hospitalization</label>
                            <input
                                type="checkbox"
                                id="medications"
                                name="medications"
                                value="true"
                            />
                            <label for="medications">Medications</label>
                        </p>
                        <p class="flexi">
                            <input
                                type="checkbox"
                                id="allergies"
                                name="allergies"
                                value="true"
                            />
                            <label for="allergies">Allergies</label>
                            <input
                                type="checkbox"
                                id="others_checkbox"
                                name="others_checkbox"
                                value="true"
                            />
                            <label for="others_checkbox">Others</label>
                        </p>--}}
                        <div class="">
                            <p>
                                <label for="hypertension_years">Hypertension:</label>
                                <input type="text" id="hypertension_years" name="hypertension_years" 
                                    value="{{ old('hypertension_years', optional($patient->medicalHistory)->hypertension_years) }}"
                                    {{ old('hypertension_years') ? '' : 'disabled' }} />
                                
                                @error('hypertension_years')
                                    <p class="text-red-500 text-xs p-1">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </p>
                            
                            {{--
                            <p>
                                <label for="diabetes_years">Diabetes:</label>
                                <input type="text" id="diabetes_years" name="diabetes_years" />
                            </p>
                            <p>
                                <label for="Asthma_years">Asthma:</label>
                                <input type="text" id="Asthma_years" name="Asthma_years" />
                            </p>
                            <div class="flex-col">
                                <label for="hospitalization_details">Previous Hospitalization</label>
                                <input type="text" id="hospitalization_details" name="hospitalization_details" />
                            </div>
                            <p>
                                <label for="allergies_details">Allergies:</label>
                                <input type="text" id="allergies_details" name="allergies_details" />
                            </p>
                            <p>
                                <label for="cvd_year">CVD:</label>
                                <input type="text" id="cvd_year" name="cvd_year" />
                            </p>
                            <p>
                                <label for="stroke_year">Stroke:</label>
                                <input type="text" id="stroke_year" name="stroke_year" />
                            </p>
                            <div class="flex-col">
                                <label for="mental_neuropsychiatric_illness_details">Mental / Neuropsyciatric Illness:</label>
                                <input type="text" id="mental_neuropsychiatric_illness_details" name="mental_neuropsychiatric_illness_details" />
                            </div>
                            <div class="flex-col">
                                <label for="medications_details">Medications:</label>
                                <input type="text" id="medications_details" name="medications_details" />
                            </div>
                            <div class="flex-col">
                                <label for="others_details">Others:</label>
                                <input type="text" id="others_details" name="others_details" />
                            </div>
                            --}}
                        </div> 

                            <!-- Repeat the pattern for other past medical history checkboxes -->
                            <!-- ... -->
                        
                    </div>

                    {{-- <h5>Family History</h5>
                    <div class="checkboxes">
                        <p class="flexi">
                            <input
                                type="checkbox"
                                id="family_hypertension"
                                name="family_hypertension"
                                value="true"
                            />
                            <label for="family_hypertension">Hypertension</label>
                            <input
                                type="checkbox"
                                id="family_diabetes"
                                name="family_diabetes"
                                value="true"
                            />
                            <label for="family_diabetes">Asthma</label>
                        </p>
                        <p class="flexi">
                            <input
                                type="checkbox"
                                id="family_cancer"
                                name="family_cancer"
                                value="true"
                            />
                            <label for="family_cancer">Diabetes</label>
                            <input
                                type="checkbox"
                                id="family_asthma"
                                name="family_asthma"
                                value="true"
                            />
                            <label for="family_asthma">Heart Disease</label>
                        </p>
                        <p class="flexi">
                            <input
                                type="checkbox"
                                id="family_heart_disease"
                                name="family_heart_disease"
                                value="true"
                            />
                            <label for="family_heart_disease">Cancer</label>
                            <input
                                type="checkbox"
                                id="family_heart_disease"
                                name="family_heart_disease"
                                value="true"
                            />
                            <label for="family_heart_disease">Others</label>
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
                            />
                            <label for="personal_smoker">Smoker</label>
                            <input
                                type="checkbox"
                                id="personal_drug_abuse"
                                name="personal_drug_abuse"
                                value="true"
                            />
                            <label for="personal_drug_abuse">Drug Abuse</label>

                        </p>
                        <p class="flexi">
                            <input
                                type="checkbox"
                                id="personal_alcohol_drinker"
                                name="personal_alcohol_drinker"
                                value="true"
                            />
                            <label for="personal_alcohol_drinker">Alcohol Drinker</label>
                        </p>
                            <!-- Repeat the pattern for other personal/social history checkboxes -->
                            <!-- ... -->
                        
                    </div>

                    <h5>Menstrual History</h5>
                    <div class="">
                        <p>
                            <label for="menstrual_interval">Menstrual Interval:</label>
                            <input type="text" id="menstrual_interval" name="menstrual_interval" />
                        </p>
                        <p>
                            <label for="menstrual_duration">Menstrual Duration:</label>
                            <input type="text" id="menstrual_duration" name="menstrual_duration" />
                        </p>
                        <p>
                            <label for="menstrual_dysmenorrhea">Dysmenorrhea:</label>
                            <input type="text" id="menstrual_dysmenorrhea" name="menstrual_dysmenorrhea" />
                        </p>
                    </div>

                    <h5>For Obstetrical History</h5>
                    <div class="">
                        <p class="flexi">
                            <label class="label-nospace" for="obstetrical_lmp">LMP:</label>
                            <input type="text" id="obstetrical_lmp" name="obstetrical_lmp" />

                            <label class="label-nospace" for="obstetrical_pmp">PMP:</label>
                            <input type="text" id="obstetrical_pmp" name="obstetrical_pmp" />
                        </p>
                        <p class="flexi">
                            <label class="label-nospace" for="obstetrical_aog">AOG:</label>
                            <input type="text" id="obstetrical_aog" name="obstetrical_aog" />

                            <label class="label-nospace" for="obstetrical_edc">EDC:</label>
                            <input type="text" id="obstetrical_edc" name="obstetrical_edc" />
                        </p>
                        <p>
                            <label for="obstetrical_prenatal_checkups">Prenatal Check-ups:</label>
                            <input type="text" id="obstetrical_prenatal_checkups" name="obstetrical_prenatal_checkups" />
                        </p>
                        <p class="flexi">
                            <label class="label-nospace" for="obstetrical_gravida">The Patient is Gravida:</label>
                            <input type="text" id="obstetrical_gravida" name="obstetrical_gravida" />

                            <label class="label-nospace" for="obstetrical_para">Para:</label>
                            <input type="text" id="obstetrical_para" name="obstetrical_para" />
                        </p>
                    </div>

                    <h5>First Pregnancy</h5>
                    <div class="flexi">
                        <label class="label-nospace" for="obstetrical_first_pregnancy_delivered_on">Delivered on</label>
                        <input type="date" id="obstetrical_first_pregnancy_delivered_on" name="obstetrical_first_pregnancy_delivered_on" />
                        <label class="label-nospace" for="obstetrical_first_pregnancy_term_preterm">to a</label>
                        <select id="obstetrical_first_pregnancy_term_preterm" name="obstetrical_first_pregnancy_term_preterm">
                            <option value="term">Term</option>
                            <option value="preterm">Preterm</option>
                        </select>
                    </div>
                    <div class="flexi">
                        <label class="label-nospace" for="obstetrical_first_pregnancy_girl_boy">Birth Living</label>
                        <select id="obstetrical_first_pregnancy_girl_boy" name="obstetrical_first_pregnancy_girl_boy">
                            <option value="boy">Boy</option>
                            <option value="girl">Girl</option>
                        </select>
                        <label class="label-nospace" for="obstetrical_first_pregnancy_delivery_method">via</label>
                        <select id="obstetrical_first_pregnancy_delivery_method" name="obstetrical_first_pregnancy_delivery_method">
                            <option value="NSD">NSD</option>
                            <option value="CS">CS</option>
                        </select>
                        <label class="label-nospace" for="obstetrical_first_pregnancy_delivery_place">at a</label>
                        <input type="text" id="obstetrical_first_pregnancy_delivery_place" name="obstetrical_first_pregnancy_delivery_place" />
                    </div>

                    <h5>Pediatric Medical History</h5>
                    <div class="flexi">
                        <label class="label-nospace" for="pediatric_term">Term</label>
                        <input type="text" id="pediatric_term" name="pediatric_term" />
                        <label class="label-nospace" for="pediatric_preterm">Preterm</label>
                        <input type="text" id="pediatric_preterm" name="pediatric_preterm" />
                    </div>
                    <div class="flexi">
                        <label class="label-nospace" for="pediatric_postterm">Postterm</label>
                        <input type="text" id="pediatric_postterm" name="pediatric_postterm" />
                        <p>(AOG)</p>
                    </div>
                    <div class="flexi">
                        <label class="label-nospace" for="pediatric_age_of_mother_at_pregnancy">Age of mother at pregnancy:</label>
                        <input type="text" id="pediatric_age_of_mother_at_pregnancy" name="pediatric_age_of_mother_at_pregnancy" />
                    </div>
                    <div class="flexi">
                        <label class="label-nospace" for="pediatric_no_of_pregnancy">No. of pregnancy:</label>
                        <input type="text" id="pediatric_no_of_pregnancy" name="pediatric_no_of_pregnancy" />
                        <label class="label-nospace" for="pediatric_first">first</label>
                        <input type="text" id="pediatric_first" name="pediatric_first" />
                    </div>
                    <div class="flexi">
                        <label class="label-nospace" for="pediatric_second">second</label>
                        <input type="text" id="pediatric_second" name="pediatric_second" />
                        <label class="label-nospace" for="pediatric_third">third</label>
                        <input type="text" id="pediatric_third" name="pediatric_third" />
                        <label class="label-nospace" for="pediatric_others">others</label>
                        <input type="text" id="pediatric_others" name="pediatric_others" />
                    </div>
                    <h5 class="flex-col">
                        <label for="pediatric_complications_during_pregnancy">Maternal Complication during pregnancy:</label>
                        <input type="text" id="pediatric_complications_during_pregnancy" name="pediatric_complications_during_pregnancy" />
                    </h5>
                    <h5 class="flex-col">
                        <label for="pediatric_immunizations">Immunizations:</label>
                        <input type="text" id="pediatric_immunizations" name="pediatric_immunizations" />
                    </h5> --}}

                    <button type="button" onclick="nextStep()" class="block py-2 pr-3 pl-3 bg-custom-50 rounded-lg text-white">Next</button>
                </div>
            </div>
        </div>
        <button type="submit" class="bg-custom-50 hover:bg-custom-50 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200" type="submit">Update</button>

    </form>

</section>
