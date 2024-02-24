@include('partials.header', ['bgColor' => 'bg-custom-700'])

<?php $array = array('title' => 'HIMS');?>
<x-nav :data="$array"/>

@include('partials.header', [$title])
{{-- <style>
    h1 {
    font-size: 1.6rem;
    font-weight: 700;
    }
    h3 {
    font-size: 1rem;
    font-weight: 700;
    }
    .step {
    display: none;
    }

    .step.active {
    display: flex;
    }
    .hero {
    /* height: 100vh;*/
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #f8f8f8;
    border: 1px dotted red;
    margin-top: 2rem;
    }

    .bg-card {
    background-color: #dceddd;
    }
    .flexi {
    display: flex;
    gap: 2rem;
    align-items: flex-start;
    }
    .flex-col {
    display: flex;
    flex-direction: column;
    }
    .flex-only {
    display: flex;
    justify-content: space-between; /* Center items horizontally within the container */
    /* align-items: flex-start; */
    }
    .flex-col input[type="text"] {
    width: 40rem; /* Adjust the width as needed */
    padding: 8px;
    font-size: 16px;
    }
    #button {
    background-color: #dceddd;
    }
    label {
    display: inline-block;
    width: 160px; /* Adjust the width as needed for your layout */
    margin-bottom: 5px;
    }

    .label-nospace {
    display: inline-block;
    width: auto; /* Adjust the width as needed for your layout */
    margin-bottom: 5px;
    }

    .hero-content {
    display: flex;
    /* align-items: center; */
    justify-content: center;
    width: 100%;
    max-width: 90rem;
    padding: 1.8rem 1.2rem;
    gap: 2.5rem;
    border: 1px dotted red;
    }
    .left {
    border: 1px dotted cyan;
    width: 80rem;
    height: auto;
    overflow: hidden; /* This prevents the child from overflowing */
    }
    .right {
    border: 1px dotted cyan;
    width: 40rem;
    height: 25rem;
    /* overflow: ;  This prevents the child from overflowing */
    }
    .bg-card {
    padding: 2rem;
    border-radius: 25px;
    }
</style> --}}
<link rel="stylesheet" href="{{ asset('css/mainFormStyles.css') }}">

<main class="bg-custom-901 mt-20">
    <form action="/nurse-patients/edit/{{$patient->patient_id}}" method="POST"  enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <section id="step1" class="step active hero">
            @include('form.step1')
        </section>
        <section id="step2" class="hero step" style="display: none">
            @include('form.step2')
        </section>
        <section id="step3" class="hero step" style="display: none">
            @include('form.step3')
        </section>
        <section id="step4" class="hero step" style="display: none">
            @include('form.step4')
        </section>
        <section id="step5" class="hero step" style="display: none">
            @include('form.step5')
        </section>
        <section id="step6" class="hero step" style="display: none">
            @include('form.step6')
        </section>
    </form>
</main>

{{-- <script>
    let currentStep = 1;

    function nextStep() {
    document.getElementById(`step${currentStep}`).style.display = "none";
    currentStep++;
    document.getElementById(`step${currentStep}`).style.display = "flex";
    }

    function prevStep() {
    document.getElementById(`step${currentStep}`).style.display = "none";
    currentStep--;
    document.getElementById(`step${currentStep}`).style.display = "flex";
    }

    function submitForm() {
    // Handle form submission logic
    alert("Form submitted!");
    }

</script> --}}


<script src="{{ asset('js/mainFormScripts.js') }}"></script>


@include('partials.footer ')
