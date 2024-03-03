@include('partials.header', ['bgColor' => 'bg-custom-51'])
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
/* height: 100vh; */
display: flex;
align-items: center;
justify-content: center;
/* background-color: #f8f8f8; */
margin-left: 10rem;
margin-top: 3rem;
}
.admission-content {
display: flex;
  /* align-items: center; */
justify-content: center;
width: 100%;
max-width: 100rem;
padding: 1.8rem 1.2rem;
gap: 3rem;
/* height: 50rem; */
/* overflow: hidden; */
}
.boxes {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  grid-template-rows: repeat(1, 1fr);
  grid-gap: 1.75rem;
  justify-content: space-evenly;
}

.box {
  /* Add styling for the boxes as needed */
  padding: 20px;
  height: 11rem;
  max-width: 30rem;
}


#datePlaceholder {
font-size: 0.9rem;

}
.flexi {    display: flex;
  align-items: center;
  justify-content: center;}
.flex-row {
display: flex;
flex-direction: row;
}
.boxes .box {
  border-radius: 10px;
  color: black;

  font-size: 1.4rem;
  font-family: sans-serif;
  gap: 1rem;
}

.box-content {
  border-radius: 10px;
  color: black;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.4rem;
  font-family: sans-serif;
  gap: 1rem;
}
/* Rest of your CSS remains the same */

.box1 {
gap: 0 !important;

}
.left {
/* width: 50rem; */
/* height: 50rem; */
/* overflow: hidden; This prevents the child from overflowing */
}
.right {
width: 170rem;
/* height: 50rem; */
/* overflow: auto; This prevents the child from overflowing */
}
.custom-btn {
  width: 10rem;
  height: 30px;
  /* Add any additional styling here */
  font-size: 0.60em;
  display: flex;
  align-items: center;
  justify-content: center;
}
.text-small {
font-size: 0.75em;
text-align: center;
}

</style>
<?php $array = array('title' => 'HIMS');?>
<x-nav :data="$array"/>

<section id="admission">
    <div class="admission-content">
      <div class="left">
        <div class="boxes">
          <div class="box box1 flex-col flexi bg-custom-102 shadow">
            <p id="datePlaceholder" class="font-bold text-black"></p>
            <h1 id="timePlaceholder" class="font-bold text-black"></h1>
          </div>
          <div class="box flexi flex-row bg-custom-101 shadow">
                <div>
                    <img src="{{ asset('storage/image/physician-b.png') }}" alt="Physician Image" class="w-24 h-auto mr-4">
                </div>
                <div class="flex-col">
                  <h1 class="font-bold text-black">{{ $physicianCount }}</h1>
                  <p class="mb-1">Physicians</p>
                </div>
          </div>


          <div class="box flexi flex-row bg-custom-101 shadow">
              <div>
                <img src="{{ asset('storage/image/nurse-b.png') }}" alt="Nurse Image" class="w-24 h-auto mr-4 invert">
            </div>
              <div class="flex-col">
                <h1 class="font-bold text-black">{{ $nurseCount }}</h1>
                <p class="mb-1">Nurses</p>
              </div>
          </div>
          
          <div class="box flexi flex-row bg-custom-101 shadow">
              <div>
                  <img src="{{ asset('storage/image/medtech-b.png') }}" alt="medtech Image" class="w-24 h-auto mr-4">
              </div>
              <div class="flex-col">
                <h1 class="font-bold text-black">{{ $medtechCount }}</h1>
                <p class="mb-1">Medical Technologists</p>
              </div>
          </div>
          <div class="box flexi flex-row bg-custom-101 shadow">
              <div>
                  <img src="{{ asset('storage/image/radtech-b.png') }}" alt="Radtech Image" class="w-24 h-auto mr-4">
              </div>
              <div class="flex-col">
                <h1 class="font-bold text-black">{{ $radtechCount }}</h1>
                <p class="mb-1">Radiologic Technologist</p>
              </div>
          </div>
          {{-- <div class="box flexi flex-row bg-custom-101 shadow">
              <div>
                  <img src="{{ asset('storage/image/outpatient.png') }}" alt="Outpatient Image" class="w-24 h-auto mr-4">
              </div>
              <div class="flex-col">
                <h1 class="font-bold text-black">{{ $outpatientCount }}</h1>
                <p class="mb-1">Outpatient</p>
              </div>
          </div> --}}

          <!-- Remove one box -->
        </div>
      </div>
      

    
    </div>
</section>


  <script>
    function updateDateTime() {
        const timePlaceholder = document.getElementById('timePlaceholder');
        const datePlaceholder = document.getElementById('datePlaceholder');
        const currentDateTime = new Date();
        
        // Set the time zone to Manila/Philippine time
        const timeZone = 'Asia/Manila';

        // Options for formatting time
        //const timeOptions = { timeZone, hour12: true, hour: 'numeric', minute: 'numeric', second: 'numeric' };
        const timeOptions = { timeZone, hour12: true, hour: 'numeric', minute: 'numeric' };
        const formattedTime = currentDateTime.toLocaleTimeString('en-US', timeOptions);
        timePlaceholder.innerText = formattedTime;

        // Options for formatting date
        const dateOptions = { timeZone, weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        const formattedDate = currentDateTime.toLocaleDateString('en-US', dateOptions);
        datePlaceholder.innerText = formattedDate;
    }

    updateDateTime();
    setInterval(updateDateTime, 1000);

    
</script>
@include('partials.footer')