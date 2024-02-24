<section id="step1" class="step active hero">
    <div class="hero-content">
        <div class="left">
            <div class="left-1">
                <h1>Edit Patient Complete History - Step 1</h1>
                <h3>I. Medical History</h3>
                <h5 class="flex-col">
                    <label for="complete_history">Complete History</label>
                    <input type="text" id="complete_history" name="complete_history" />
                </h5>

                <h5>Family History</h5>
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
                        <label for="family_diabetes">Diabetes</label>
                        <input
                            type="checkbox"
                            id="family_cancer"
                            name="family_cancer"
                            value="true"
                        />
                        <label for="family_cancer">Cancer</label>
                        <input
                            type="checkbox"
                            id="family_asthma"
                            name="family_asthma"
                            value="true"
                        />
                        <label for="family_asthma">Asthma</label>
                        <input
                            type="checkbox"
                            id="family_heart_disease"
                            name="family_heart_disease"
                            value="true"
                        />
                        <label for="family_heart_disease">Heart Disease</label>
                        <!-- Repeat the pattern for other family history checkboxes -->
                        <!-- ... -->
                    </p>
                </div>

                <h5>Past Medical History</h5>
                <div class="checkboxes">
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
                            id="cvd"
                            name="cvd"
                            value="true"
                        />
                        <label for="cvd">Cardiovascular Disease</label>
                        <input
                            type="checkbox"
                            id="stroke"
                            name="stroke"
                            value="true"
                        />
                        <label for="stroke">Stroke</label>
                        <input
                            type="checkbox"
                            id="mental_neuropsychiatric_illness"
                            name="mental_neuropsychiatric_illness"
                            value="true"
                        />
                        <label for="mental_neuropsychiatric_illness">Mental Neuropsychiatric Illness</label>
                        <input
                            type="checkbox"
                            id="medications"
                            name="medications"
                            value="true"
                        />
                        <label for="medications">Medications</label>
                        <input
                            type="checkbox"
                            id="others_checkbox"
                            name="others_checkbox"
                            value="true"
                        />
                        <label for="others_checkbox">Others</label>
                        <!-- Repeat the pattern for other past medical history checkboxes -->
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
                            id="personal_alcohol_drinker"
                            name="personal_alcohol_drinker"
                            value="true"
                        />
                        <label for="personal_alcohol_drinker">Alcohol Drinker</label>
                        <input
                            type="checkbox"
                            id="personal_drug_abuse"
                            name="personal_drug_abuse"
                            value="true"
                        />
                        <label for="personal_drug_abuse">Drug Abuse</label>
                        <!-- Repeat the pattern for other personal/social history checkboxes -->
                        <!-- ... -->
                    </p>
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
                </h5>

                <button onclick="nextStep()" class="block py-2 pr-3 pl-3 bg-custom-50 rounded-lg text-white">Next</button>
            </div>
        </div>
    </div>
</section>
