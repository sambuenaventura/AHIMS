{{-- <section id="step2" class="hero step" style="display: none"> --}}
      {{-- <form action="/nurse-patients/edit/{{$patient->patient_id}}" method="POST" class="flex flex-col" enctype="multipart/form-data">
          @method('PUT')
          @csrf --}}
          <div class="">
            <div class="card-body m-1">
                <h4 class="font-bold">Edit Patient Complete History</h4>
                <div class="card pe-0">
                <!-- BAR -->
                <div class="bar mt-5">
                    <div class="position-relative mb-5 mx-5">
                        <div class="progress" role="progressbar" aria-label="Progress" aria-valuenow="50"
                            aria-valuemin="0" aria-valuemax="100" style="height: 1px;">
                            <div class="progress-bar bg-success" style="width: 50%"></div>
                        </div>
                        <button type="button"
                            class="position-absolute top-0 start-0 translate-middle btn btn-sm btn-success rounded-pill"
                            style="width: 2rem; height:2rem;">1</button>
                        <button type="button"
                            class="position-absolute top-0 start-50 translate-middle btn btn-sm btn-success rounded-pill"
                            style="width: 2rem; height:2rem;">2</button>
                        <button type="button"
                            class="position-absolute top-0 start-100 translate-middle btn btn-sm btn-secondary rounded-pill"
                            style="width: 2rem; height:2rem;">3</button>
                    </div>
                </div>

                <div class="row overflow-auto mx-4">
                    <!-- LEFT -->
                    <div class="col-6">
                        <div class="d-flex">
                            <h5 class="text-success me-3">I. Medical History</h5>
                            <h6 class="text-success bg-success bg-opacity-25 rounded-1 p-1">Review of Systems</h6>
                        </div>

                        <!-- Constitutonal -->
                        <div class="card my-2 checkboxes">
                            <div class="card-body">
                                <p>Constitutonal</p>
                                <div class="row mt-2">
                                    <div class="col">
                                        <div class="form-check bg-light rounded-2 py-1">
                                            <input class="form-check-input" type="checkbox" id="consti_fever"
                                            name="consti_fever"
                                            value="1"
                                            {{ $patient->reviewOfSystems && $patient->reviewOfSystems->consti_fever ? 'checked' : '' }}
                                        />
                                            <label class="form-check-label" for="consti_fever">
                                                Fever
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check bg-light rounded-2 py-1">
                                            <input class="form-check-input" type="checkbox" id="consti_anorexia"
                                            name="consti_anorexia"
                                            value="1"
                                            {{ $patient->reviewOfSystems && $patient->reviewOfSystems->consti_anorexia ? 'checked' : '' }}
                                        />
                                            <label class="form-check-label" for="consti_anorexia">
                                                Anorexia
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check bg-light rounded-2 py-1">
                                            <input class="form-check-input" type="checkbox" id="consti_weight_loss"
                                            name="consti_weight_loss"
                                            value="1"
                                            {{ $patient->reviewOfSystems && $patient->reviewOfSystems->consti_weight_loss ? 'checked' : '' }}
                                        />
                                            <label class="form-check-label" for="consti_weight_loss">
                                                Weight Loss
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check bg-light rounded-2 py-1">
                                            <input class="form-check-input" type="checkbox" id="consti_fatigue"
                                            name="consti_fatigue"
                                            value="1"
                                            {{ $patient->reviewOfSystems && $patient->reviewOfSystems->consti_fatigue ? 'checked' : '' }}
                                        />
                                            <label class="form-check-label" for="consti_fatigue">
                                                Fatigue
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Hermatology -->
                        <div class="card my-2 checkboxes">
                            <div class="card-body">
                                <p>Hermatology</p>
                                <div class="row mt-2">
                                    <div class="col">
                                        <div class="form-check bg-light rounded-2 py-1">
                                            <input class="form-check-input" type="checkbox" id="hema_easy_bruisability"
                                            name="hema_easy_bruisability"
                                            value="1"
                                            {{ $patient->reviewOfSystems && $patient->reviewOfSystems->hema_easy_bruisability ? 'checked' : '' }}
                                        />
                                            <label class="form-check-label" for="hema_easy_bruisability">
                                                Easy Bruisability
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check bg-light rounded-2 py-1">
                                            <input class="form-check-input" type="checkbox" id="hema_abnormal_bleeding"
                                            name="hema_abnormal_bleeding"
                                            value="1"
                                            {{ $patient->reviewOfSystems && $patient->reviewOfSystems->hema_abnormal_bleeding ? 'checked' : '' }}
                                        />
                                            <label class="form-check-label" for="hema_abnormal_bleeding">
                                                Abnormal bleeding
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- EENT -->
                        <div class="card my-2 checkboxes">
                            <div class="card-body">
                                <p>EENT</p>
                                <div class="row mt-2">
                                    <div class="col">
                                        <div class="form-check bg-light rounded-2 py-1">
                                            <input class="form-check-input" type="checkbox" id="eent_blurring_of_vision"
                                            name="eent_blurring_of_vision"
                                            value="1"
                                            {{ $patient->reviewOfSystems && $patient->reviewOfSystems->eent_blurring_of_vision ? 'checked' : '' }}
                                        />
                                            <label class="form-check-label" for="eent_blurring_of_vision">
                                                Blurring of vision
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check bg-light rounded-2 py-1">
                                            <input class="form-check-input" type="checkbox" id="eent_ear_discharges"
                                            name="eent_ear_discharges"
                                            value="1"
                                            {{ $patient->reviewOfSystems && $patient->reviewOfSystems->eent_ear_discharges ? 'checked' : '' }}
                                        />
                                            <label class="form-check-label" for="eent_ear_discharges">
                                                Ear discharges
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col">
                                        <div class="form-check bg-light rounded-2 py-1">
                                            <input class="form-check-input" type="checkbox" id="eent_hearing_loss"
                                            name="eent_hearing_loss"
                                            value="1"
                                            {{ $patient->reviewOfSystems && $patient->reviewOfSystems->eent_hearing_loss ? 'checked' : '' }}
                                        />
                                            <label class="form-check-label" for="eent_hearing_loss">
                                                Hearing loss
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check bg-light rounded-2 py-1">
                                            <input class="form-check-input" type="checkbox" id="eent_nose_bleed"
                                            name="eent_nose_bleed"
                                            value="1"
                                            {{ $patient->reviewOfSystems && $patient->reviewOfSystems->eent_nose_bleed ? 'checked' : '' }}
                                        />
                                            <label class="form-check-label" for="eent_nose_bleed">
                                                Nose bleed
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col">
                                        <div class="form-check bg-light rounded-2 py-1">
                                            <input class="form-check-input" type="checkbox" id="eent_tinnitus"
                                            name="eent_tinnitus"
                                            value="1"
                                            {{ $patient->reviewOfSystems && $patient->reviewOfSystems->eent_tinnitus ? 'checked' : '' }}
                                        />
                                            <label class="form-check-label" for="eent_tinnitus">
                                                Tinnitus
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check bg-light rounded-2 py-1">
                                            <input class="form-check-input" type="checkbox" id="eent_mouth_snores"
                                            name="eent_mouth_snores"
                                            value="1"
                                            {{ $patient->reviewOfSystems && $patient->reviewOfSystems->eent_mouth_snores ? 'checked' : '' }}
                                        />
                                            <label class="form-check-label" for="eent_mouth_snores">
                                                Mouth snores
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- CNS -->
                        <div class="card my-2 checkboxes">
                            <div class="card-body">
                                <p>CNS</p>
                                <div class="row mt-2">
                                    <div class="col">
                                        <div class="form-check bg-light rounded-2 py-1">
                                            <input class="form-check-input" type="checkbox" id="cns_headache"
                                            name="cns_headache"
                                            value="1"
                                            {{ $patient->reviewOfSystems && $patient->reviewOfSystems->cns_headache ? 'checked' : '' }}
                                        />
                                            <label class="form-check-label" for="cns_headache">
                                                Headache
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check bg-light rounded-2 py-1">
                                            <input class="form-check-input" type="checkbox" id="cns_tremors"
                                            name="cns_tremors"
                                            value="1"
                                            {{ $patient->reviewOfSystems && $patient->reviewOfSystems->cns_tremors ? 'checked' : '' }}
                                        />
                                            <label class="form-check-label" for="cns_tremors">
                                                Tremors
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col">
                                        <div class="form-check bg-light rounded-2 py-1">
                                            <input class="form-check-input" type="checkbox" id="cns_dizziness"
                                            name="cns_dizziness"
                                            value="1"
                                            {{ $patient->reviewOfSystems && $patient->reviewOfSystems->cns_dizziness ? 'checked' : '' }}
                                        />
                                            <label class="form-check-label" for="cns_dizziness">
                                                Dizziness
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check bg-light rounded-2 py-1">
                                            <input class="form-check-input" type="checkbox" id="cns_paralysis"
                                            name="cns_paralysis"
                                            value="1"
                                            {{ $patient->reviewOfSystems && $patient->reviewOfSystems->cns_paralysis ? 'checked' : '' }}
                                        />
                                            <label class="form-check-label" for="cns_paralysis">
                                                Paralysis
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col">
                                        <div class="form-check bg-light rounded-2 py-1">
                                            <input class="form-check-input" type="checkbox" id="cns_seizures"
                                            name="cns_seizures"
                                            value="1"
                                            {{ $patient->reviewOfSystems && $patient->reviewOfSystems->cns_seizures ? 'checked' : '' }}
                                        />
                                            <label class="form-check-label" for="cns_seizures">
                                                Seizures
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check bg-light rounded-2 py-1">
                                            <input class="form-check-input" type="checkbox" id="cns_numbness_or_tingling_of_sensations"
                                            name="cns_numbness_or_tingling_of_sensations"
                                            value="1"
                                            {{ $patient->reviewOfSystems && $patient->reviewOfSystems->cns_numbness_or_tingling_of_sensations ? 'checked' : '' }}
                                        />
                                            <label class="form-check-label" for="cns_numbness_or_tingling_of_sensations">
                                                Numbness of tingling of sensations
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Respiratory -->
                        <div class="card my-2 checkboxes">
                            <div class="card-body">
                                <p>Respiratory</p>
                                <div class="row mt-2">
                                    <div class="col">
                                        <div class="form-check bg-light rounded-2 py-1">
                                            <input class="form-check-input" type="checkbox" id="respi_dyspnea"
                                            name="respi_dyspnea"
                                            value="1"
                                            {{ $patient->reviewOfSystems && $patient->reviewOfSystems->respi_dyspnea ? 'checked' : '' }}
                                        />
                                            <label class="form-check-label" for="respi_dyspnea">
                                                Dyspnes
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check bg-light rounded-2 py-1">
                                            <input class="form-check-input" type="checkbox" id="respi_orthopnea"
                                            name="respi_orthopnea"
                                            value="1"
                                            {{ $patient->reviewOfSystems && $patient->reviewOfSystems->respi_orthopnea ? 'checked' : '' }}
                                        />
                                            <label class="form-check-label" for="respi_orthopnea">
                                                Ortopnea
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col">
                                        <div class="form-check bg-light rounded-2 py-1">
                                            <input class="form-check-input" type="checkbox" id="respi_cough"
                                            name="respi_cough"
                                            value="1"
                                            {{ $patient->reviewOfSystems && $patient->reviewOfSystems->respi_cough ? 'checked' : '' }}
                                        />
                                            <label class="form-check-label" for="respi_cough">
                                                Cough
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check bg-light rounded-2 py-1">
                                            <input class="form-check-input" type="checkbox" id="respi_shortness_of_breath"
                                            name="respi_shortness_of_breath"
                                            value="1"
                                            {{ $patient->reviewOfSystems && $patient->reviewOfSystems->respi_shortness_of_breath ? 'checked' : '' }}
                                        />
                                            <label class="form-check-label" for="respi_shortness_of_breath">
                                                Shortness of breath
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col">
                                        <div class="form-check bg-light rounded-2 py-1">
                                            <input class="form-check-input" type="checkbox" id="respi_colds"
                                            name="respi_colds"
                                            value="1"
                                            {{ $patient->reviewOfSystems && $patient->reviewOfSystems->respi_colds ? 'checked' : '' }}
                                        />
                                            <label class="form-check-label" for="respi_colds">
                                                Colds
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check bg-light rounded-2 py-1">
                                            <input class="form-check-input" type="checkbox" id="respi_hemoptysis"
                                            name="respi_hemoptysis"
                                            value="1"
                                            {{ $patient->reviewOfSystems && $patient->reviewOfSystems->respi_hemoptysis ? 'checked' : '' }}
                                        />
                                            <label class="form-check-label" for="respi_hemoptysis">
                                                Hemoptysis
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- CVS -->
                        <div class="card my-2 checkboxes">
                            <div class="card-body">
                                <p>CVS</p>
                                <div class="row mt-2">
                                    {{-- <div class="col">
                                        <div class="form-check bg-light rounded-2 py-1">
                                            <input class="form-check-input" type="checkbox" id="cvs_chest_pain"
                                            name="cvs_chest_pain"
                                            value="1"
                                            {{ $patient->reviewOfSystems && $patient->reviewOfSystems->cvs_chest_pain ? 'checked' : '' }}
                                        />
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Chest pain
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check bg-light rounded-2 py-1">
                                            <input class="form-check-input" type="checkbox" id="cvs_palpitations"
                                            name="cvs_palpitations"
                                            value="1"
                                            {{ $patient->reviewOfSystems && $patient->reviewOfSystems->cvs_palpitations ? 'checked' : '' }}
                                        />
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Palpitation
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check bg-light rounded-2 py-1">
                                            <input class="form-check-input" type="checkbox" id="cvs_swelling_of_lower_extremities"
                                            name="cvs_swelling_of_lower_extremities"
                                            value="1"
                                            {{ $patient->reviewOfSystems && $patient->reviewOfSystems->cvs_swelling_of_lower_extremities ? 'checked' : '' }}
                                        />
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Swelling of lower extremeties
                                            </label>
                                        </div>
                                    </div> --}}
                                    <div class="row mt-2">
                                        <div class="col">
                                            <div class="form-check bg-light rounded-2 py-1">
                                                <input class="form-check-input" type="checkbox" id="cvs_chest_pain"
                                            name="cvs_chest_pain"
                                            value="1"
                                            {{ $patient->reviewOfSystems && $patient->reviewOfSystems->cvs_chest_pain ? 'checked' : '' }}
                                        />
                                                <label class="form-check-label" for="cvs_chest_pain">
                                                    Chest pain
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-check bg-light rounded-2 py-1">
                                                <input class="form-check-input" type="checkbox" id="cvs_palpitations"
                                                name="cvs_palpitations"
                                                value="1"
                                                {{ $patient->reviewOfSystems && $patient->reviewOfSystems->cvs_palpitations ? 'checked' : '' }}
                                            />
                                                <label class="form-check-label" for="cvs_palpitations">
                                                    Palpitation
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col">
                                            <div class="form-check bg-light rounded-2 py-1">
                                                <input class="form-check-input" type="checkbox" id="cvs_swelling_of_lower_extremities"
                                                name="cvs_swelling_of_lower_extremities"
                                                value="1"
                                                {{ $patient->reviewOfSystems && $patient->reviewOfSystems->cvs_swelling_of_lower_extremities ? 'checked' : '' }}
                                            />
                                                <label class="form-check-label" for="cvs_swelling_of_lower_extremities">
                                                    Swelling of lower extremities
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-check rounded-2 py-1">
                                                <input class="form-check-input hidden" type="checkbox" id=""
                                                name=""
                                                value=""
                                                disabled
                                            />
    
                                                <label class="form-check-label" for="">
                                                    
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- GIT -->
                        <div class="card my-2 checkboxes">
                            <div class="card-body">
                                <p>GIT</p>
                                <div class="row mt-2">
                                    <div class="col">
                                        <div class="form-check bg-light rounded-2 py-1">
                                            <input class="form-check-input" type="checkbox" id="git_diarrhea"
                                            name="git_diarrhea"
                                            value="1"
                                            {{ $patient->reviewOfSystems && $patient->reviewOfSystems->git_diarrhea ? 'checked' : '' }}
                                        />
                                            <label class="form-check-label" for="git_diarrhea">
                                                Diarrhea
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check bg-light rounded-2 py-1">
                                            <input class="form-check-input" type="checkbox" id="git_change_in_bowel_movement"
                                            name="git_change_in_bowel_movement"
                                            value="1"
                                            {{ $patient->reviewOfSystems && $patient->reviewOfSystems->git_change_in_bowel_movement ? 'checked' : '' }}
                                        />
                                            <label class="form-check-label" for="git_change_in_bowel_movement">
                                                Change in bowel movement
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col">
                                        <div class="form-check bg-light rounded-2 py-1">
                                            <input class="form-check-input" type="checkbox" id="git_constipation"
                                            name="git_constipation"
                                            value="1"
                                            {{ $patient->reviewOfSystems && $patient->reviewOfSystems->git_constipation ? 'checked' : '' }}
                                        />
                                            <label class="form-check-label" for="git_constipation">
                                                Constipation
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check bg-light rounded-2 py-1">
                                            <input class="form-check-input" type="checkbox" id="git_nausea"
                                            name="git_nausea"
                                            value="1"
                                            {{ $patient->reviewOfSystems && $patient->reviewOfSystems->git_nausea ? 'checked' : '' }}
                                        />

                                            <label class="form-check-label" for="git_nausea">
                                                Nausea
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col">
                                        <div class="form-check bg-light rounded-2 py-1">
                                            <input class="form-check-input" type="checkbox" id="git_abdominal_pain"
                                            name="git_abdominal_pain"
                                            value="1"
                                            {{ $patient->reviewOfSystems && $patient->reviewOfSystems->git_abdominal_pain ? 'checked' : '' }}
                                        />
                                            <label class="form-check-label" for="git_abdominal_pain">
                                                Abdominal pain
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check bg-light rounded-2 py-1">
                                            <input class="form-check-input" type="checkbox" id="git_vomiting"
                                            name="git_vomiting"
                                            value="1"
                                            {{ $patient->reviewOfSystems && $patient->reviewOfSystems->git_vomiting ? 'checked' : '' }}
                                        />
                                            <label class="form-check-label" for="git_vomiting">
                                                Vomiting
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col">
                                        <div class="form-check bg-light rounded-2 py-1">
                                            <input class="form-check-input" type="checkbox" id="git_loss_of_appetite"
                                            name="git_loss_of_appetite"
                                            value="1"
                                            {{ $patient->reviewOfSystems && $patient->reviewOfSystems->git_loss_of_appetite ? 'checked' : '' }}
                                        />
                                            <label class="form-check-label" for="git_loss_of_appetite">
                                                Loss of appetite
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check bg-light rounded-2 py-1">
                                            <input class="form-check-input" type="checkbox" id="git_hematochezia"
                                            name="git_hematochezia"
                                            value="1"
                                            {{ $patient->reviewOfSystems && $patient->reviewOfSystems->git_hematochezia ? 'checked' : '' }}
                                        />
                                            <label class="form-check-label" for="git_hematochezia">
                                                Hematochezia
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Genitourinary Tract -->
                        <div class="card my-2 checkboxes">
                            <div class="card-body">
                                <p> Genitourinary Tract</p>
                                <div class="row mt-2">
                                    <div class="col">
                                        <div class="form-check bg-light rounded-2 py-1">
                                            <input class="form-check-input" type="checkbox" id="genittract_dysuria"
                                            name="genittract_dysuria"
                                            value="1"
                                            {{ $patient->reviewOfSystems && $patient->reviewOfSystems->genittract_dysuria ? 'checked' : '' }}
                                        />
                                            <label class="form-check-label" for="genittract_dysuria">
                                                Dysuria
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check bg-light rounded-2 py-1">
                                            <input class="form-check-input" type="checkbox" id="genittract_flank_pain"
                                            name="genittract_flank_pain"
                                            value="1"
                                            {{ $patient->reviewOfSystems && $patient->reviewOfSystems->genittract_flank_pain ? 'checked' : '' }}
                                        />
                                            <label class="form-check-label" for="genittract_flank_pain">
                                                Flank pain
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col">
                                        <div class="form-check bg-light rounded-2 py-1">
                                            <input class="form-check-input" type="checkbox" id="genittract_urgency"
                                            name="genittract_urgency"
                                            value="1"
                                            {{ $patient->reviewOfSystems && $patient->reviewOfSystems->genittract_urgency ? 'checked' : '' }}
                                        />
                                            <label class="form-check-label" for="genittract_urgency">
                                                Urgency
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check bg-light rounded-2 py-1">
                                            <input class="form-check-input" type="checkbox" id="genittract_vaginal_discharge"
                                            name="genittract_vaginal_discharge"
                                            value="1"
                                            {{ $patient->reviewOfSystems && $patient->reviewOfSystems->genittract_vaginal_discharge ? 'checked' : '' }}
                                        />
                                            <label class="form-check-label" for="genittract_vaginal_discharge">
                                                Vaginal discharge
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col">
                                        <div class="d-flex">
                                            <div class="form-check bg-light rounded-2 py-1 pe-1">
                                                <input class="form-check-input" type="checkbox" id="genittract_frequency"
                                                name="genittract_frequency"
                                                value="1"
                                                {{ $patient->reviewOfSystems && $patient->reviewOfSystems->genittract_frequency ? 'checked' : '' }}
                                            />
                                                <label class="form-check-label" for="genittract_frequency">
                                                    Frequency
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Musculoskeletal -->
                        <div class="card my-2 checkboxes">
                            <div class="card-body">
                                <p> Musculoskeletal</p>
                                <div class="row mt-2">
                                    <div class="col">
                                        <div class="form-check bg-light rounded-2 py-1">
                                            <input class="form-check-input" type="checkbox" id="musculo_joint_pains"
                                            name="musculo_joint_pains"
                                            value="1"
                                            {{ $patient->reviewOfSystems && $patient->reviewOfSystems->musculo_joint_pains ? 'checked' : '' }}
                                        />
                                            <label class="form-check-label" for="musculo_joint_pains">
                                                Joint pains
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check bg-light rounded-2 py-1">
                                            <input class="form-check-input" type="checkbox" id="musculo_back_pains"
                                            name="musculo_back_pains"
                                            value="1"
                                            {{ $patient->reviewOfSystems && $patient->reviewOfSystems->musculo_back_pains ? 'checked' : '' }}
                                        />
                                            <label class="form-check-label" for="musculo_back_pains">
                                                Back pains
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col">
                                        <div class="form-check bg-light rounded-2 py-1">
                                            <input class="form-check-input" type="checkbox" id="musculo_muscle_weakness"
                                            name="musculo_muscle_weakness"
                                            value="1"
                                            {{ $patient->reviewOfSystems && $patient->reviewOfSystems->musculo_muscle_weakness ? 'checked' : '' }}
                                        />

                                            <label class="form-check-label" for="musculo_muscle_weakness">
                                                Muscle weakness
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check bg-light rounded-2 py-1">
                                            <input class="form-check-input" type="checkbox" id="musculo_difficulty_in_walking"
                                            name="musculo_difficulty_in_walking"
                                            value="1"
                                            {{ $patient->reviewOfSystems && $patient->reviewOfSystems->musculo_difficulty_in_walking ? 'checked' : '' }}
                                        />
                                            <label class="form-check-label" for="musculo_difficulty_in_walking">
                                                Difficulty in walking
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

  
                        {{-- <div class="X">
                            <div class="row mt-2">
                                <div class="col">
                                    <div class="form-floating mt-2 bg-light">
                                        <textarea class="form-control" id="floatingTextarea2"
                                            style="height: 50px">{{ optional($patient->neurologicalExamination)->neuro_gcs }}</textarea>
                                        <label for="floatingTextarea2">GCS</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <div class="form-floating mt-2">
                                        <textarea class="form-control" id="floatingTextarea2"
                                            style="height: 50px">{{ optional($patient->neurologicalExamination)->neuro_cn_i }}</textarea>
                                        <label for="floatingTextarea2">CN I</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating mt-2">
                                        <textarea class="form-control" id="floatingTextarea2"
                                            style="height: 50px">{{ optional($patient->neurologicalExamination)->neuro_cn_ii }}</textarea>
                                        <label for="floatingTextarea2">CN II</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating mt-2">
                                        <textarea class="form-control" id="floatingTextarea2"
                                            style="height: 50px">{{ optional($patient->neurologicalExamination)->neuro_cn_iii_iv_vi }}</textarea>
                                        <label for="floatingTextarea2">CN III IV, VI</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <div class="form-floating mt-2">
                                        <textarea class="form-control" id="floatingTextarea2"
                                            style="height: 50px">{{ optional($patient->neurologicalExamination)->neuro_cn_v }}</textarea>
                                        <label for="floatingTextarea2">CN V</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating mt-2">
                                        <textarea class="form-control" id="floatingTextarea2"
                                            style="height: 50px">{{ optional($patient->neurologicalExamination)->neuro_cn_vii }}</textarea>
                                        <label for="floatingTextarea2">CN VII</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating mt-2">
                                        <textarea class="form-control" id="floatingTextarea2"
                                            style="height: 50px">{{ optional($patient->neurologicalExamination)->neuro_cn_viii }}</textarea>
                                        <label for="floatingTextarea2">CN VIII</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <div class="form-floating mt-2">
                                        <textarea class="form-control" id="floatingTextarea2"
                                            style="height: 50px">{{ optional($patient->neurologicalExamination)->neuro_cn_ix_x }}</textarea>
                                        <label for="floatingTextarea2">CN IX, X</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating mt-2">
                                        <textarea class="form-control" id="floatingTextarea2"
                                            style="height: 50px">{{ optional($patient->neurologicalExamination)->neuro_cn_xi }}</textarea>
                                        <label for="floatingTextarea2">CN XI</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating mt-2">
                                        <textarea class="form-control" id="floatingTextarea2"
                                            style="height: 50px">{{ optional($patient->neurologicalExamination)->neuro_cn_xii }}</textarea>
                                        <label for="floatingTextarea2">CN XII</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <div class="d-flex">
                                        <div class="form-check bg-light rounded-2 mt-2 bg-light px-4 rounded-2">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault" {{ $patient->neurologicalExamination && $patient->neurologicalExamination->neuro_babinski ? 'checked' : '' }}>
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Babinski
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <div class="form-floating mt-2">
                                        <textarea class="form-control" id="floatingTextarea2"
                                            style="height: 50px">{{ optional($patient->neurologicalExamination)->neuro_motor }}</textarea>
                                        <label for="floatingTextarea2">Motor</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <div class="form-floating mt-2">
                                        <textarea class="form-control" id="floatingTextarea2"
                                            style="height: 50px">{{ optional($patient->neurologicalExamination)->neuro_sensory }}</textarea>
                                        <label for="floatingTextarea2">Sensory</label>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        


                    </div>

                    <!-- RIGHT -->
                    <div class="col-6">
                        <div class="d-flex">
                            <h6 class="text-success bg-success bg-opacity-25 rounded-1 p-1">Physical Examinations
                            </h6>
                        </div>
                        
                        <div class="card bg-light my-2 inputs">

                            <div class="card-body">
                                <!-- Vital Signs -->
                                <div class="row mt-2">
                                    <p>Vital Signs</p>
                                    <div class="col">
                                        <div class="form-floating mt-2">
                                            <textarea class="form-control" id="vitals_blood_pressure" name="vitals_blood_pressure" style="height: 50px">{{ optional($patient->physicalExamination)->vitals_blood_pressure }}</textarea>
                                            <label for="vitals_blood_pressure">Blood Pressure (mmHg)</label>
                                        </div>
                                        
                                    </div>
                                    <div class="col">
                                        <div class="form-floating mt-2">
                                            <textarea class="form-control" id="vitals_respiratory_rate" name="vitals_respiratory_rate" style="height: 50px">{{ optional($patient->physicalExamination)->vitals_respiratory_rate }}</textarea>
                                            <label for="vitals_respiratory_rate">Respiratory Rate (cpm)</label>
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="row mt-2">
                                    <div class="col">
                                        <div class="form-floating mt-2">
                                            <textarea class="form-control" id="vitals_pulse_rate" name="vitals_pulse_rate" style="height: 50px">{{ optional($patient->physicalExamination)->vitals_pulse_rate }}</textarea>
                                            <label for="vitals_pulse_rate">Pulse Rate (bpm)</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-floating mt-2">
                                            <textarea class="form-control" id="vitals_temperature" name="vitals_temperature" style="height: 50px">{{ optional($patient->physicalExamination)->vitals_temperature }}</textarea>
                                            <label for="vitals_temperature">Temperature (°C)</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-floating mt-2">
                                            <textarea class="form-control" id="vitals_weight" name="vitals_weight" style="height: 50px">{{ optional($patient->physicalExamination)->vitals_weight }}</textarea>
                                            <label for="vitals_weight">Weight (kg)</label>
                                        </div>
                                    </div>
                                </div>
                            
                                <!-- HEENT -->
                                <div class="form-floating mt-2">
                                    <textarea class="form-control" id="pe_heent" name="pe_heent" style="height: 100px">{{ optional($patient->physicalExamination)->pe_heent }}</textarea>
                                    <label for="pe_heent">HEENT</label>
                                </div>
                            
                                <!-- Neck -->
                                <div class="form-floating mt-2">
                                    <textarea class="form-control" id="pe_neck" name="pe_neck" style="height: 100px">{{ optional($patient->physicalExamination)->pe_neck }}</textarea>
                                    <label for="pe_neck">Neck</label>
                                </div>
                            
                                <!-- Chest -->
                                <div class="form-floating mt-2">
                                    <textarea class="form-control" id="pe_chest_left" name="pe_chest_left" style="height: 100px">{{ optional($patient->physicalExamination)->pe_chest_left }}</textarea>
                                    <label for="pe_chest_left">Chest Left</label>
                                </div>
                            
                                <div class="form-floating mt-2">
                                    <textarea class="form-control" id="pe_chest_right" name="pe_chest_right" style="height: 100px">{{ optional($patient->physicalExamination)->pe_chest_right }}</textarea>
                                    <label for="pe_chest_right">Chest Right</label>
                                </div>
                            
                                <!-- Lungs -->
                                <div class="form-floating mt-2">
                                    <textarea class="form-control" id="pe_lungs" name="pe_lungs" style="height: 100px">{{ optional($patient->physicalExamination)->pe_lungs }}</textarea>
                                    <label for="pe_lungs">Lungs</label>
                                </div>
                            
                                <!-- Heart -->
                                <div class="form-floating mt-2">
                                    <textarea class="form-control" id="pe_heart" name="pe_heart" style="height: 100px">{{ optional($patient->physicalExamination)->pe_heart }}</textarea>
                                    <label for="pe_heart">Heart</label>
                                </div>
                            
                                <!-- Breast -->
                                <div class="form-floating mt-2">
                                    <textarea class="form-control" id="pe_breast" name="pe_breast" style="height: 100px">{{ optional($patient->physicalExamination)->pe_breast }}</textarea>
                                    <label for="pe_breast">Breast</label>
                                </div>
                            
                                <!-- Extremities -->
                                <div class="form-floating mt-2">
                                    <textarea class="form-control" id="pe_extremities" name="pe_extremities" style="height: 100px">{{ optional($patient->physicalExamination)->pe_extremities }}</textarea>
                                    <label for="pe_extremities">Extremities</label>
                                </div>
                            
                                <!-- Internal Examination -->
                                <div class="form-floating mt-2">
                                    <textarea class="form-control" id="pe_internal_examination" name="pe_internal_examination" style="height: 100px">{{ optional($patient->physicalExamination)->pe_internal_examination }}</textarea>
                                    <label for="pe_internal_examination">Internal Examination</label>
                                </div>
                            
                                <!-- Rectal Examination -->
                                <div class="form-floating mt-2">
                                    <textarea class="form-control" id="pe_rectal_examination" name="pe_rectal_examination" style="height: 100px">{{ optional($patient->physicalExamination)->pe_rectal_examination }}</textarea>
                                    <label for="pe_rectal_examination">Rectal Examination</label>
                                </div>
                            
                            </div>
                            
                        </div>
                        <div class="buttons my-4 float-end">
                            <button type="button" class="btn btn-light ms-2 btn-custom-style btn-cancel" onclick="prevStep()" class="btn btn-light me-2">Back</button>
                            <button type="button" class="btn btn-success ms-2 btn-custom-style btn-submit" onclick="nextStep()" class="btn btn-success">Next</button>
                           
                        </div>
                    </div>
                </div>


            </div>
            </div>
          </div>
      {{-- </form> --}}
  
  {{-- </section> --}}
  