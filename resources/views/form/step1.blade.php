{{-- <section id="step1" class="step active hero"> --}}
    {{-- <form action="/nurse-patients/edit/{{$patient->patient_id}}" method="POST" class="flex flex-col" enctype="multipart/form-data"> --}}
        <div class="">
            <div class="card-body m-1">
            <h4 class="font-bold" style="color:black;   ">Edit Patient Complete History</h4>
        <div class="card pe-0">
                <!-- BAR -->
                <div class="bar mt-5">
                    <div class="position-relative mb-5 mx-5">
                        <div class="progress" role="progressbar" aria-label="Progress" aria-valuenow="50"
                            aria-valuemin="0" aria-valuemax="100" style="height: 1px;">
                            <div class="progress-bar bg-success"></div>
                        </div>
                        <button type="button"
                            class="position-absolute top-0 start-0 translate-middle btn btn-sm btn-success rounded-pill"
                            style="width: 2rem; height:2rem;">1</button>
                        <button type="button"
                            class="position-absolute top-0 start-50 translate-middle btn btn-sm btn-secondary rounded-pill"
                            style="width: 2rem; height:2rem;">2</button>
                        <button type="button"
                            class="position-absolute top-0 start-100 translate-middle btn btn-sm btn-secondary rounded-pill"
                            style="width: 2rem; height:2rem;">3</button>
                    </div>
                </div>
        
                <div class="row overflow-auto mx-4">
                    <!-- LEFT -->
                    <div class="col-6">

                        <h5 class="text-success">I. Medical History</h5>
                        <div @if($patient->archived) style="pointer-events: none; opacity: 0.6;"@endif>

                        <div class="form-floating">
                            <textarea name="complete_history" class="form-control" id="floatingTextarea2" style="height: 400px">{{ optional($patient->medicalHistory)->complete_history }}</textarea>
                            <label for="floatingTextarea2">Complete History</label>
                        </div>
                        @error('complete_history')
                            <p class="text-red-500 text-xs p-1">
                                {{$message}}
                            </p>
                        @enderror
                        
                        <!-- CHECK BOXES -->
                        <!-- Past Medical History -->
                        <div class="card my-2 checkboxes">
                            <div class="card-body">
                                <p>Past Medical History</p>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-check bg-light rounded-2 py-1">
                                            <input class="form-check-input" type="checkbox" value=""
                                            id="hypertension"
                                            name="hypertension"
                                            value="true"
                                            {{ $patient->medicalHistory && $patient->medicalHistory->hypertension ? 'checked' : '' }}
                                        />
                                            <label class="form-check-label" for="hypertension">
                                                Hypertension
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check bg-light rounded-2 py-1">
                                            <input class="form-check-input" type="checkbox"                                 id="allergies"
                                            name="allergies"
                                            value="true"
                                            {{ $patient->medicalHistory && $patient->medicalHistory->allergies ? 'checked' : '' }}
                                        />
                                            <label class="form-check-label" for="allergies">
                                                Allergies
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check bg-light rounded-2 py-1">
                                            <input class="form-check-input" type="checkbox"                                 id="medications"
                                            name="medications"
                                            value="true"
                                            {{ $patient->medicalHistory && $patient->medicalHistory->medications ? 'checked' : '' }}
                                            />
                                            <label class="form-check-label" for="medications">
                                                Medications
                                            </label>
                                        </div>
                                    </div>
                                </div>
        
                                <div class="row">
                                    <div class="col">
                                        <div class="form-check bg-light rounded-2 py-1">
                                            <input class="form-check-input" type="checkbox"                                 id="diabetes"
                                            name="diabetes"
                                            value="true"
                                            {{ $patient->medicalHistory && $patient->medicalHistory->diabetes ? 'checked' : '' }}
                                        />
                                            <label class="form-check-label" for="diabetes">
                                                Diabetes
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check bg-light rounded-2 py-1">
                                            <input class="form-check-input" type="checkbox"                                 id="stroke"
                                            name="stroke"
                                            value="true"
                                            {{ $patient->medicalHistory && $patient->medicalHistory->stroke ? 'checked' : '' }}
                                            />
                                            <label class="form-check-label" for="stroke">
                                                Stroke
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check bg-light rounded-2 py-1">
                                            <input class="form-check-input" type="checkbox"                                 id="previous_hospitalization"
                                            name="previous_hospitalization"
                                            value="true"
                                            {{ $patient->medicalHistory && $patient->medicalHistory->previous_hospitalization ? 'checked' : '' }}
                                            />
                                            <label class="form-check-label" for="previous_hospitalization">
                                                Previous Hospitalization
                                            </label>
                                        </div>
                                    </div>
                                </div>
        
                                <div class="row">
                                    <div class="col">
                                        <div class="form-check bg-light rounded-2 py-1">
                                            <input class="form-check-input" type="checkbox"                                 id="asthma"
                                            name="asthma"
                                            value="true"
                                            {{ $patient->medicalHistory && $patient->medicalHistory->asthma ? 'checked' : '' }}
                                        />
                                            <label class="form-check-label" for="asthma">
                                                Asthma
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check bg-light rounded-2 py-1">
                                            <input class="form-check-input" type="checkbox"                                 id="cvd"
                                            name="cvd"
                                            value="true"
                                            {{ $patient->medicalHistory && $patient->medicalHistory->cvd ? 'checked' : '' }}
                                        />
                                            <label class="form-check-label" for="cvd">
                                                CVD
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check bg-light rounded-2 py-1">
                                            <input class="form-check-input" type="checkbox"                                 id="mental_neuropsychiatric_illness"
                                            name="mental_neuropsychiatric_illness"
                                            value="true"
                                            {{ $patient->medicalHistory && $patient->medicalHistory->mental_neuropsychiatric_illness ? 'checked' : '' }}
                                        />
                                            <label class="form-check-label" for="mental_neuropsychiatric_illness">
                                                Mental Illness
                                            </label>
                                        </div>
                                    </div>
                                </div>
        
                                <div class="row">
                                    <div class="col">
                                        <div class="form-check bg-light rounded-2 py-1">
                                            <input class="form-check-input mt-2" type="checkbox" id="others_checkbox" name="others_checkbox" value="true"
                                            {{ $patient->medicalHistory && $patient->medicalHistory->others_checkbox ? 'checked' : '' }} />
                                            <div class="d-flex align-items-center">
                                                <label class="form-check-label" for="others_checkbox">
                                                    Others:
                                                </label>
                                                <input type="text" class="form-control form-control-sm border-light rounded-2 ms-2" id="others_details" name="others_details" value="{{ old('others_details', optional($patient->medicalHistory)->others_details) }}" {{ $patient->medicalHistory && $patient->medicalHistory->others_checkbox ? '' : 'disabled' }}/>

                                            </div>
                                            @error('others_details')
                                            <p class="text-red-500 text-xs p-1 m-0">
                                                {{$message}}
                                            </p>
                                        @enderror
                                        </div>
                                    </div>
                                </div>
                                
                                
                                
                            </div>
                        </div>
        
                        <!-- Family History -->
                        <div class="card my-2 checkboxes">
                            <div class="card-body">
                                <p>Family History</p>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-check bg-light rounded-2 py-1">
                                            <input class="form-check-input" type="checkbox"                                 id="family_hypertension"
                                            name="family_hypertension"
                                            value="true"
                                            {{ $patient->medicalHistory && $patient->medicalHistory->family_hypertension ? 'checked' : '' }}/>
                                            <label class="form-check-label" for="family_hypertension">
                                                Hypertention
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check bg-light rounded-2 py-1">
                                            <input class="form-check-input" type="checkbox"                                 id="family_cancer"
                                            name="family_cancer"
                                            value="true"
                                            {{ $patient->medicalHistory && $patient->medicalHistory->family_cancer ? 'checked' : '' }}/>
                                            <label class="form-check-label" for="family_cancer">
                                                Cancer
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check bg-light rounded-2 py-1">
                                            <input class="form-check-input" type="checkbox"                                 id="family_heart_disease"
                                            name="family_heart_disease"
                                            value="true"
                                            {{ $patient->medicalHistory && $patient->medicalHistory->family_heart_disease ? 'checked' : '' }}/>
                                            <label class="form-check-label" for="family_heart_disease">
                                                Heart Disease
                                            </label>
                                        </div>
                                    </div>
                                </div>
        
                                <div class="row">
                                    <div class="col">
                                        <div class="form-check bg-light rounded-2 py-1">
                                            <input class="form-check-input" type="checkbox"                                 id="family_diabetes"
                                            name="family_diabetes"
                                            value="true"
                                            {{ $patient->medicalHistory && $patient->medicalHistory->family_diabetes ? 'checked' : '' }}/>
                                            <label class="form-check-label" for="family_diabetes">
                                                Diabetes
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check bg-light rounded-2 py-1">
                                            <input class="form-check-input" type="checkbox"                                 id="family_asthma"
                                            name="family_asthma"
                                            value="true"
                                            {{ $patient->medicalHistory && $patient->medicalHistory->family_asthma ? 'checked' : '' }}/>
                                            <label class="form-check-label" for="family_asthma">
                                                Asthma
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col invisible">
                                        <div class="form-check bg-light rounded-2 py-1">
                                            <input class="form-check-input" type="checkbox"                                 id=""
                                            name=""
                                            value=""/ disabled>
                                            <label class="form-check-label" for="">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-check bg-light rounded-2 py-1">
                                            <input class="form-check-input mt-2" type="checkbox" id="family_others_checkbox" name="family_others_checkbox" value="true"
                                            {{ $patient->medicalHistory && $patient->medicalHistory->family_others_checkbox ? 'checked' : '' }} />
                                            <div class="d-flex align-items-center">
                                                <label class="form-check-label" for="family_others_checkbox">
                                                    Others:
                                                </label>
                                                <input type="text" class="form-control form-control-sm border-light rounded-2 ms-2" id="family_others_details" name="family_others_details" value="{{ old('family_others_details', optional($patient->medicalHistory)->family_others_details) }}" {{ $patient->medicalHistory && $patient->medicalHistory->family_others_details ? '' : 'disabled' }}/>

                                            </div>
                                            @error('family_others_details')
                                            <p class="text-red-500 text-xs p-1 m-0">
                                                {{$message}}
                                            </p>
                                        @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
        
                        <!-- Personal/Social History -->
                        <div class="card my-2 checkboxes">
                            <div class="card-body">
                                <p>Personal/Social History</p>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-check bg-light rounded-2 py-1">
                                            <input class="form-check-input" type="checkbox"                                 id="personal_smoker"
                                            name="personal_smoker"
                                            value="true"
                                            {{ $patient->medicalHistory && $patient->medicalHistory->personal_smoker ? 'checked' : '' }}/>
                                            <label class="form-check-label" for="personal_smoker">
                                                Smoker
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check bg-light rounded-2 py-1">
                                            <input class="form-check-input" type="checkbox"                                 id="personal_drug_abuse"
                                            name="personal_drug_abuse"
                                            value="true"
                                            {{ $patient->medicalHistory && $patient->medicalHistory->personal_drug_abuse ? 'checked' : '' }}/>
                                            <label class="form-check-label" for="personal_drug_abuse">
                                                Drug Abuse
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check bg-light rounded-2 py-1">
                                            <input class="form-check-input" type="checkbox"                                 id="personal_alcohol_drinker"
                                            name="personal_alcohol_drinker"
                                            value="true"
                                            {{ $patient->medicalHistory && $patient->medicalHistory->personal_alcohol_drinker ? 'checked' : '' }}/>
                                            <label class="form-check-label" for="personal_alcohol_drinker">
                                                Alcoholic
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
        
                        <!-- Menstrual History -->
                        <div class="card my-2 bg-light inputs"@if($patient->gender != 'Female') style="pointer-events: none; opacity: 0.6;"@endif >
                            <div class="card-body">
                                <p>Menstrual History</p>
                                <div class="row">
                                    <div class="col">
                                        <input type="text" class="form-control rounded-4" placeholder="Interval" id="menstrual_interval" name="menstrual_interval" value="{{ optional($patient->medicalHistory)->menstrual_interval }}"/>
                                        @error('menstrual_interval')
                                            <p class="text-red-500 text-xs p-1">
                                                {{$message}}
                                            </p>
                                        @enderror    
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control rounded-4" placeholder="Duration" id="menstrual_duration" name="menstrual_duration" value="{{ optional($patient->medicalHistory)->menstrual_duration }}"/>
                                        @error('menstrual_duration')
                                            <p class="text-red-500 text-xs p-1">
                                                {{$message}}
                                            </p>
                                        @enderror    
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control rounded-4" placeholder="Dysmenorrhea" id="menstrual_dysmenorrhea" name="menstrual_dysmenorrhea" value="{{ optional($patient->medicalHistory)->menstrual_dysmenorrhea }}"/>
                                        @error('menstrual_dysmenorrhea')
                                            <p class="text-red-500 text-xs p-1">
                                                {{$message}}
                                            </p>
                                        @enderror   
                                    </div>
                                </div>
                            </div>
                        </div>
                    
        
        
                    </div>
                    </div>
        
                    <!-- RIGHT -->

                        <div class="col-6">
                            <div @if($patient->gender != 'Female' || $patient->archived) style="pointer-events: none; opacity: 0.6;"@endif>
                                <h5 class="text-success">ㅤ</h5>
                                                        <!-- Obstetrical History -->
                                <div class="card my-2 bg-light inputs">
                                    <div class="card-body">
                                        <p>Obstetrical History</p>
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" class="form-control rounded-4" placeholder="LMP" id="obstetrical_lmp" name="obstetrical_lmp" value="{{ optional($patient->medicalHistory)->obstetrical_lmp }}"/>
                                                @error('obstetrical_lmp')
                                                <p class="text-red-500 text-xs p-1">
                                                    {{$message}}
                                                </p>
                                                @enderror
                                            </div>
                                            <div class="col">
                                                <input type="text" class="form-control rounded-4" placeholder="PMP" id="obstetrical_pmp" name="obstetrical_pmp" value="{{ optional($patient->medicalHistory)->obstetrical_pmp }}"/>
                                                @error('obstetrical_pmp')
                                                <p class="text-red-500 text-xs p-1">
                                                    {{$message}}
                                                </p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row  mt-2">
                                            <div class="col">
                                                <input type="text" class="form-control rounded-4" placeholder="AOG" id="obstetrical_aog" name="obstetrical_aog" value="{{ optional($patient->medicalHistory)->obstetrical_aog }}"/>
                                                @error('obstetrical_aog')
                                                <p class="text-red-500 text-xs p-1">
                                                    {{$message}}
                                                </p>
                                                @enderror
                                            </div>
                                            <div class="col">
                                                <input type="text" class="form-control rounded-4" placeholder="EDC" id="obstetrical_edc" name="obstetrical_edc" value="{{ optional($patient->medicalHistory)->obstetrical_edc }}"/>
                                                @error('obstetrical_edc')
                                                <p class="text-red-500 text-xs p-1">
                                                    {{$message}}
                                                </p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row  mt-2">
                                            <div class="col">
                                                <input type="text" class="form-control rounded-4"
                                                    placeholder="Prenatal Check-ups" id="obstetrical_prenatal_checkups" name="obstetrical_prenatal_checkups" value="{{ optional($patient->medicalHistory)->obstetrical_prenatal_checkups }}"/>
                                                    @error('obstetrical_prenatal_checkups')
                                                    <p class="text-red-500 text-xs p-1">
                                                        {{$message}}
                                                    </p>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="row  mt-2">
                                            <div class="col">
                                                <input type="text" class="form-control rounded-4" placeholder="Gravida" id="obstetrical_gravida" name="obstetrical_gravida" value="{{ optional($patient->medicalHistory)->obstetrical_gravida }}"/>
                                                @error('obstetrical_gravida')
                                                <p class="text-red-500 text-xs p-1">
                                                    {{$message}}
                                                </p>
                                                @enderror
                                            </div>
                                            <div class="col">
                                                <input type="text" class="form-control rounded-4" placeholder="Para" id="obstetrical_para" name="obstetrical_para" value="{{ optional($patient->medicalHistory)->obstetrical_para }}"/>
                                                @error('obstetrical_para')
                                                <p class="text-red-500 text-xs p-1">
                                                    {{$message}}
                                                </p>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--  Pregnancy -->
                                        <div class="card my-2 rounded-4">
                                            <div class="card-body bg-custom-103 rounded-4">
                                                <p>First Pregnancy</p>
                                                <div class="d-flex pregnancy mb-2">
                                                    <p>Delivered on</p>
                                                    <input type="date" class="form-control rounded-4" placeholder="Date" id="obstetrical_first_pregnancy_delivered_on" name="obstetrical_first_pregnancy_delivered_on" value="{{ optional($patient->medicalHistory)->obstetrical_first_pregnancy_delivered_on }}"/>
                                                    @error('obstetrical_first_pregnancy_delivered_on')
                                                    <p class="text-red-500 text-xs p-1">
                                                        {{ $message }}
                                                    </p>
                                                    @enderror
                                                    <p>to a</p>
                                                    <select class="form-select" aria-label="Default select example" id="obstetrical_first_pregnancy_term_preterm" name="obstetrical_first_pregnancy_term_preterm">
                                                        <option value="" selected disabled>term/preterm</option>
                                                        <option value="term" {{ old('obstetrical_first_pregnancy_term_preterm', optional($patient->medicalHistory)->obstetrical_first_pregnancy_term_preterm) === 'term' ? 'selected' : '' }}>term</option>
                                                        <option value="preterm" {{ old('obstetrical_first_pregnancy_term_preterm', optional($patient->medicalHistory)->obstetrical_first_pregnancy_term_preterm) === 'preterm' ? 'selected' : '' }}>preterm</option>
                                                    </select>
                                                    @error('obstetrical_first_pregnancy_term_preterm')
                                                        <p class="text-red-500 text-xs p-1">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="d-flex pregnancy">
                                                    <p>birth living</p>
                                                    <select class="form-select" aria-label="Default select example" id="obstetrical_first_pregnancy_girl_boy" name="obstetrical_first_pregnancy_girl_boy">
                                                        <option value="" selected disabled>girl/boy</option>
                                                        <option value="girl" {{ old('obstetrical_first_pregnancy_girl_boy', optional($patient->medicalHistory)->obstetrical_first_pregnancy_girl_boy) === 'girl' ? 'selected' : '' }}>girl</option>
                                                        <option value="boy" {{ old('obstetrical_first_pregnancy_girl_boy', optional($patient->medicalHistory)->obstetrical_first_pregnancy_girl_boy) === 'boy' ? 'selected' : '' }}>boy</option>
                                                    </select>
                                                    @error('obstetrical_first_pregnancy_girl_boy')
                                                        <p class="text-red-500 text-xs p-1">{{ $message }}</p>
                                                    @enderror
                                                    <p>via</p>
                                                    <select class="form-select" aria-label="Default select example" id="obstetrical_first_pregnancy_delivery_method" name="obstetrical_first_pregnancy_delivery_method">
                                                        <option value="" selected disabled>nsd/cs</option>
                                                        <option value="nsd" {{ old('obstetrical_first_pregnancy_delivery_method', optional($patient->medicalHistory)->obstetrical_first_pregnancy_delivery_method) === 'nsd' ? 'selected' : '' }}>nsd</option>
                                                        <option value="cs" {{ old('obstetrical_first_pregnancy_delivery_method', optional($patient->medicalHistory)->obstetrical_first_pregnancy_delivery_method) === 'cs' ? 'selected' : '' }}>cs</option>
                                                    </select>
                                                    @error('obstetrical_first_pregnancy_delivery_method')
                                                        <p class="text-red-500 text-xs p-1">{{ $message }}</p>
                                                    @enderror
                                                    <p>at a</p>
                                                    <input type="text" class="form-control rounded-4"
                                                        placeholder="place of delivery" id="obstetrical_first_pregnancy_delivery_place" name="obstetrical_first_pregnancy_delivery_place" value="{{ optional($patient->medicalHistory)->obstetrical_first_pregnancy_delivery_place }}"/>
                                                        @error('obstetrical_first_pregnancy_delivery_place')
                                                            <p class="text-red-500 text-xs p-1">
                                                                {{$message}}
                                                            </p>
                                                        @enderror
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="upload mt-3">
                                            <div class="card-body py-4 text-success" style="border: 2px dotted #198754; padding: 3rem; border-radius: 10px;">
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <span class="plus-icon">
                                                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <mask id="mask0_1132_19213" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="40" height="40">
                                                                <rect width="40" height="40" fill="#D9D9D9"/>
                                                            </mask>
                                                            <g mask="url(#mask0_1132_19213)">
                                                                <path d="M18.3333 21.6666V26.6666C18.3333 27.1388 18.493 27.5346 18.8125 27.8541C19.1319 28.1735 19.5278 28.3333 20 28.3333C20.4722 28.3333 20.868 28.1735 21.1875 27.8541C21.5069 27.5346 21.6666 27.1388 21.6666 26.6666V21.6666H26.6666C27.1389 21.6666 27.5347 21.5069 27.8541 21.1874C28.1736 20.868 28.3333 20.4721 28.3333 19.9999C28.3333 19.5277 28.1736 19.1319 27.8541 18.8124C27.5347 18.493 27.1389 18.3333 26.6666 18.3333H21.6666V13.3333C21.6666 12.861 21.5069 12.4652 21.1875 12.1458C20.868 11.8263 20.4722 11.6666 20 11.6666C19.5278 11.6666 19.1319 11.8263 18.8125 12.1458C18.493 12.4652 18.3333 12.861 18.3333 13.3333V18.3333H13.3333C12.8611 18.3333 12.4653 18.493 12.1458 18.8124C11.8264 19.1319 11.6666 19.5277 11.6666 19.9999C11.6666 20.4721 11.8264 20.868 12.1458 21.1874C12.4653 21.5069 12.8611 21.6666 13.3333 21.6666H18.3333ZM20 36.6666C17.6944 36.6666 15.5278 36.2291 13.5 35.3541C11.4722 34.4791 9.70831 33.2916 8.20831 31.7916C6.70831 30.2916 5.52081 28.5277 4.64581 26.4999C3.77081 24.4721 3.33331 22.3055 3.33331 19.9999C3.33331 17.6944 3.77081 15.5277 4.64581 13.4999C5.52081 11.4721 6.70831 9.70825 8.20831 8.20825C9.70831 6.70825 11.4722 5.52075 13.5 4.64575C15.5278 3.77075 17.6944 3.33325 20 3.33325C22.3055 3.33325 24.4722 3.77075 26.5 4.64575C28.5278 5.52075 30.2916 6.70825 31.7916 8.20825C33.2916 9.70825 34.4791 11.4721 35.3541 13.4999C36.2291 15.5277 36.6666 17.6944 36.6666 19.9999C36.6666 22.3055 36.2291 24.4721 35.3541 26.4999C34.4791 28.5277 33.2916 30.2916 31.7916 31.7916C30.2916 33.2916 28.5278 34.4791 26.5 35.3541C24.4722 36.2291 22.3055 36.6666 20 36.6666ZM20 33.3333C23.7222 33.3333 26.875 32.0416 29.4583 29.4583C32.0416 26.8749 33.3333 23.7221 33.3333 19.9999C33.3333 16.2777 32.0416 13.1249 29.4583 10.5416C26.875 7.95825 23.7222 6.66659 20 6.66659C16.2778 6.66659 13.125 7.95825 10.5416 10.5416C7.95831 13.1249 6.66665 16.2777 6.66665 19.9999C6.66665 23.7221 7.95831 26.8749 10.5416 29.4583C13.125 32.0416 16.2778 33.3333 20 33.3333Z" fill="#418363"/>
                                                        </svg>
                                                    </span>
                                                </div>
                                                <p class="fs-4 text-center mt-2">Add Pregnancy</p>
                                            </div>
                                        </div> --}}
                                    
                                    
                                    </div>
                                </div>
                                        
                                                        <!-- Pediatric Medical History -->
                                <div class="card my-2 bg-light inputs">
                                    <div class="card-body">
                                        <p>Pediatric Medical History</p>
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" class="form-control rounded-4" placeholder="Term" id="pediatric_term" name="pediatric_term" value="{{ optional($patient->medicalHistory)->pediatric_term }}"/>
                                                @error('pediatric_term')
                                                    <p class="text-red-500 text-xs p-1">
                                                        {{$message}}
                                                    </p>
                                                    @enderror
                                            </div>
                                            <div class="col">
                                                <input type="text" class="form-control rounded-4" placeholder="Preterm" id="pediatric_preterm" name="pediatric_preterm" value="{{ optional($patient->medicalHistory)->pediatric_preterm }}"/>
                                                @error('pediatric_preterm')
                                                <p class="text-red-500 text-xs p-1">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="row  mt-2">
                                            <div class="col">
                                                <input type="text" class="form-control rounded-4"
                                                    placeholder="Postterm (AOG)" id="pediatric_postterm" name="pediatric_postterm" value="{{ optional($patient->medicalHistory)->pediatric_postterm }}"/>
                                                    @error('pediatric_postterm')
                                                        <p class="text-red-500 text-xs p-1">
                                                            {{$message}}
                                                        </p>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="row  mt-2">
                                            <div class="col">
                                                <input type="text" class="form-control rounded-4" placeholder="Birth by" id="pediatric_birth_by" name="pediatric_birth_by" value="{{ optional($patient->medicalHistory)->pediatric_birth_by }}"/>
                                                @error('pediatric_birth_by')
                                                    <p class="text-red-500 text-xs p-1">
                                                        {{$message}}
                                                    </p>
                                                @enderror
                                            </div>
                                            <div class="col">
                                                <input type="text" class="form-control rounded-4" placeholder="NSG/CS" id="pediatric_nsd_cs" name="pediatric_nsd_cs" value="{{ optional($patient->medicalHistory)->pediatric_nsd_cs }}"/>
                                                @error('pediatric_nsd_cs')
                                                    <p class="text-red-500 text-xs p-1">
                                                        {{$message}}
                                                    </p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row  mt-2">
                                            <div class="col">
                                                <input type="text" class="form-control rounded-4"
                                                    placeholder="Age of mother at pregnancy" id="pediatric_age_of_mother_at_pregnancy" name="pediatric_age_of_mother_at_pregnancy" value="{{ optional($patient->medicalHistory)->pediatric_age_of_mother_at_pregnancy }}"/>
                                                    @error('pediatric_age_of_mother_at_pregnancy')
                                                        <p class="text-red-500 text-xs p-1">
                                                            {{$message}}
                                                        </p>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="row  mt-2">
                                            <div class="col">
                                                <input type="text" class="form-control rounded-4"
                                                    placeholder="No. of Pregnancy" id="pediatric_no_of_pregnancy" name="pediatric_no_of_pregnancy" value="{{ optional($patient->medicalHistory)->pediatric_no_of_pregnancy }}"/>
                                                    @error('pediatric_no_of_pregnancy')
                                                        <p class="text-red-500 text-xs p-1">
                                                            {{$message}}
                                                        </p>
                                                    @enderror
                                            </div>
                                            <div class="col">
                                                <input type="text" class="form-control rounded-4" placeholder="First" id="pediatric_no_of_pregnancy_first" name="pediatric_no_of_pregnancy_first" value="{{ optional($patient->medicalHistory)->pediatric_no_of_pregnancy_first }}"/>
                                                @error('pediatric_no_of_pregnancy_first')
                                                    <p class="text-red-500 text-xs p-1">
                                                        {{$message}}
                                                    </p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row  mt-2">
                                            <div class="col">
                                                <input type="text" class="form-control rounded-4" placeholder="Second" id="pediatric_no_of_pregnancy_second" name="pediatric_no_of_pregnancy_second" value="{{ optional($patient->medicalHistory)->pediatric_no_of_pregnancy_second }}"/>
                                                @error('pediatric_no_of_pregnancy_second')
                                                    <p class="text-red-500 text-xs p-1">
                                                        {{$message}}
                                                    </p>
                                                @enderror
                                            </div>
                                            <div class="col">
                                                <input type="text" class="form-control rounded-4" placeholder="Third" id="pediatric_no_of_pregnancy_third" name="pediatric_no_of_pregnancy_third" value="{{ optional($patient->medicalHistory)->pediatric_no_of_pregnancy_third }}"/>
                                                @error('pediatric_no_of_pregnancy_third')
                                                    <p class="text-red-500 text-xs p-1">
                                                        {{$message}}
                                                    </p>
                                                @enderror
                                            </div>
                                            <div class="col">
                                                <input type="text" class="form-control rounded-4" placeholder="Others" id="pediatric_no_of_pregnancy_others" name="pediatric_no_of_pregnancy_others" value="{{ optional($patient->medicalHistory)->pediatric_no_of_pregnancy_others }}"/>
                                                @error('pediatric_no_of_pregnancy_others')
                                                    <p class="text-red-500 text-xs p-1">
                                                        {{$message}}
                                                    </p>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- Maternal complications -->
                                        <div class="form-floating mt-2">
                                            <textarea class="form-control" id="pediatric_complications_during_pregnancy" name="pediatric_complications_during_pregnancy" style="height: 100px">{{ optional($patient->medicalHistory)->pediatric_complications_during_pregnancy }}</textarea>
                                            <label for="pediatric_complications_during_pregnancy">Maternal complications</label>
                                        </div>
                                        @error('pediatric_complications_during_pregnancy')
                                            <p class="text-red-500 text-xs p-1">
                                                {{$message}}
                                            </p>
                                        @enderror
                                    
                                        <!-- Immunizations -->
                                        <div class="form-floating mt-2">
                                            <textarea class="form-control" id="pediatric_immunizations" name="pediatric_immunizations" style="height: 100px">{{ optional($patient->medicalHistory)->pediatric_immunizations }}</textarea>
                                            <label for="pediatric_immunizations">Immunizations</label>
                                        </div>
                                        @error('pediatric_immunizations')
                                            <p class="text-red-500 text-xs p-1">
                                                {{$message}}
                                            </p>
                                        @enderror
                                    
                                    </div>  
                                </div>
                            </div>
                          <!-- Buttons -->
                          <div class="buttons my-4 float-end">
                            <!-- Button included for all genders but disabled for females -->
                            <!-- Add any logic or conditions here if needed -->
                            <button type="button" class="btn btn-success ms-2 btn-custom-style btn-submit" onclick="nextStep()">Next</button>
                        </div>
                    </div>


                    

                </div>
            </div>
        </div>

    {{-- </form> --}}

{{-- </section> --}}

