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
                            <h6 class="text-success bg-success bg-opacity-25 rounded-1 p-1">Neurological Examinations</h6>
                        </div>
                        <div class="card">
                        <div class="card-body">
                            <div class="row mt-2">
                                <div class="col">
                                    <div class="form-floating mt-2 bg-light">
                                        <textarea class="form-control" name="neuro_gcs" id="neuro_gcs"
                                            style="height: 50px">{{ optional($patient->neurologicalExamination)->neuro_gcs }}</textarea>
                                        <label for="neuro_gcs">GCS</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <div class="form-floating mt-2">
                                        <textarea class="form-control" name="neuro_cn_i" id="neuro_cn_i"
                                            style="height: 50px">{{ optional($patient->neurologicalExamination)->neuro_cn_i }}</textarea>
                                        <label for="neuro_cn_i">CN I</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <div class="form-floating mt-2">
                                        <textarea class="form-control" name="neuro_cn_ii" id="neuro_cn_ii"
                                            style="height: 50px">{{ optional($patient->neurologicalExamination)->neuro_cn_ii }}</textarea>
                                        <label for="neuro_cn_ii">CN II</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <div class="form-floating mt-2">
                                        <textarea class="form-control" name="neuro_cn_iii_iv_vi" id="neuro_cn_iii_iv_vi"
                                            style="height: 50px">{{ optional($patient->neurologicalExamination)->neuro_cn_iii_iv_vi }}</textarea>
                                        <label for="neuro_cn_iii_iv_vi">CN III IV, VI</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <div class="form-floating mt-2">
                                        <textarea class="form-control" name="neuro_cn_v" id="neuro_cn_v"
                                            style="height: 50px">{{ optional($patient->neurologicalExamination)->neuro_cn_v }}</textarea>
                                        <label for="neuro_cn_v">CN V</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <div class="form-floating mt-2">
                                        <textarea class="form-control" name="neuro_cn_vii" id="neuro_cn_vii"
                                            style="height: 50px">{{ optional($patient->neurologicalExamination)->neuro_cn_vii }}</textarea>
                                        <label for="neuro_cn_vii">CN VII</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <div class="form-floating mt-2">
                                        <textarea class="form-control" name="neuro_cn_viii" id="neuro_cn_viii"
                                            style="height: 50px">{{ optional($patient->neurologicalExamination)->neuro_cn_viii }}</textarea>
                                        <label for="neuro_cn_viii">CN VIII</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <div class="form-floating mt-2">
                                        <textarea class="form-control" name="neuro_cn_ix_x" id="neuro_cn_ix_x"
                                            style="height: 50px">{{ optional($patient->neurologicalExamination)->neuro_cn_ix_x }}</textarea>
                                        <label for="neuro_cn_ix_x">CN IX, X</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <div class="form-floating mt-2">
                                        <textarea class="form-control" name="neuro_cn_xi" id="neuro_cn_xi"
                                            style="height: 50px">{{ optional($patient->neurologicalExamination)->neuro_cn_xi }}</textarea>
                                        <label for="neuro_cn_xi">CN XI</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <div class="form-floating mt-2">
                                        <textarea class="form-control" name="neuro_cn_xii" id="neuro_cn_xii"
                                            style="height: 50px">{{ optional($patient->neurologicalExamination)->neuro_cn_xii }}</textarea>
                                        <label for="neuro_cn_xii">CN XII</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <div class="d-flex">
                                        <div class="form-check bg-light rounded-2 mt-2 bg-light px-4 rounded-2">
                                            <input class="form-check-input" name="neuro_babinski" type="checkbox" value=""
                                                id="neuro_babinski" {{ $patient->neurologicalExamination && $patient->neurologicalExamination->neuro_babinski ? 'checked' : '' }}>
                                            <label class="form-check-label" for="neuro_babinski">
                                                Babinski
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <div class="form-floating mt-2">
                                        <textarea class="form-control" name="neuro_motor" id="neuro_motor"
                                            style="height: 50px">{{ optional($patient->neurologicalExamination)->neuro_motor }}</textarea>
                                        <label for="neuro_motor">Motor</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <div class="form-floating mt-2">
                                        <textarea class="form-control" name="neuro_sensory" id="neuro_sensory"
                                            style="height: 50px">{{ optional($patient->neurologicalExamination)->neuro_sensory }}</textarea>
                                        <label for="neuro_sensory">Sensory</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>


                    </div>
                    <!-- RIGHT -->
                    <div class="col-6">
                        <h5 class="text-success">ㅤ</h5>
                        <div class="card bg-light my-2 inputs">
                            <div class="card-body">
                                <!-- Vital Signs -->
                                <!-- Clinical Impression -->
                                <div class="form-floating mt-2">
                                    <textarea class="form-control" name="clinical_impression" id="clinical_impression"
                                    style="height: 375px">{{ optional($patient->neurologicalExamination)->clinical_impression }}</textarea>                                    
                                    <label for="clinical_impression">Clinical Impression</label>
                                </div>
                            
                                <!-- Work up -->
                                <div class="form-floating mt-2">
                                    <textarea class="form-control" name="work_up" id="work_up"
                                    style="height: 375px">{{ optional($patient->neurologicalExamination)->work_up }}</textarea>
                                    <label for="work_up">Work Up</label>
                                </div>
                            </div>
                            
                        </div>
                        <div class="buttons my-4 float-end">
                            <button type="button" onclick="prevStep()" class="btn btn-light me-2">Back</button>
                            <button type="button" onclick="nextStep()" class="btn btn-success">Next</button>
                        </div>
                    </div>
                </div>
          </div>
      {{-- </form> --}}
  
  {{-- </section> --}}
  