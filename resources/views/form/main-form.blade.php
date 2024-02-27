@include('partials.header', ['bgColor' => 'bg-custom-700'])
<style>

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
  
    html {
      background-color: #eee;
    }
  
    #admission {
      height: 100vh;
      display: flex;
      justify-content: center;
      /* background-color: #f8f8f8; */
      margin-left: 10rem;
    }
    .admission-content {
      /* display: flex; */
      /* align-items: center; */
      /* justify-content: center; */
      width: 100%;
      max-width: 100rem;
      padding: 1.8rem 1.2rem;
      gap: 3rem;
    }
    .boxes {
      display: grid;
      grid-template-columns: repeat(1, 1fr);
      grid-template-rows: repeat(1, 1fr);
      grid-gap: 20px;
      justify-content: space-evenly;
    }
  
    .box {
      /* Add styling for the boxes as needed */
      padding: 20px;
    }
  
    #datePlaceholder {
      font-size: 0.9rem;
  
    }
  
    .boxes .box {
      border-radius: 10px;
      color: black;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.4rem;
      font-family: sans-serif;
      gap: 2rem;
    }
    .box1 {
      gap: 0 !important;
  
    }
    .left {
      width: 50rem;
      height: 50rem;
      overflow: hidden; /* This prevents the child from overflowing */
    }
    .right {
      width: 170rem;
      height: 50rem;
      overflow: auto; /* This prevents the child from overflowing */
    }
    .pregnancy p {
        font-size: 1em;
        margin-bottom: 0;
        margin-right: 0.5rem;

    }    
    .pregnancy input {
    }
    .pregnancy select {
    }
    .pregnancy {
    display: flex; /* Use flexbox layout */
    align-items: center; /* Align items vertically */
    }

  /* Ensure input and select elements have consistent width */
  .pregnancy input,
  .pregnancy select {
      width: auto; /* Adjust width as needed */
      flex: 1; /* Allow elements to grow to fill available space */
      margin-right: 10px; /* Add spacing between elements */
  }

</style>
<?php $array = array('title' => 'HIMS');?>
<x-nav :data="$array"/>

@include('partials.header', [$title])

{{-- <link rel="stylesheet" href="{{ asset('css/mainFormStyles.css') }}"> --}}

<section id="admission">
    <div class="admission-content">
      <form action="/nurse-patients/edit/{{$patient->patient_id}}" method="POST"  enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <section id="step1" class="step active hero">
                @include('form.step1')
        </section>

        <section id="step2" class="hero step" style="display: none">
            @include('form.step2')
        </section>

        <section id="step3" class="hero step" style="display: none; min-width: 100%;">
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
    </div>
</section>

<script src="{{ asset('js/mainFormScripts.js') }}"></script>


@include('partials.footer ')
