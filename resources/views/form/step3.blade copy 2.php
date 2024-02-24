{{-- <section id="step2" class="hero step" style="display: none"> --}}
      {{-- <form action="/nurse-patients/edit/{{$patient->patient_id}}" method="POST" class="flex flex-col" enctype="multipart/form-data">
          @method('PUT')
          @csrf --}}
          <div class="">
            <div class="card-body m-1" style="width: auto;">
                <h3>Edit Patient Complete History</h3>
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
                        <div class="X">
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
                        </div>
                        


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

                            
                            
                            
                                <!-- Clinical Impression -->
                                <div class="form-floating mt-2">
                                    <textarea class="form-control" id="floatingTextarea2"
                                    style="height: 375px">{{ optional($patient->neurologicalExamination)->clinical_impression }}</textarea>                                    
                                    <label for="pe_clinical_impression">Clinical Impression</label>
                                </div>
                            
                                <!-- Work up -->
                                <div class="form-floating mt-2">
                                    <textarea class="form-control" id="floatingTextarea2"
                                    style="height: 375px">{{ optional($patient->neurologicalExamination)->work_up }}</textarea>
                                    <label for="floatingTextarea2">Work Up</label>
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
            </div>
          </div>
      {{-- </form> --}}
  
  {{-- </section> --}}
  