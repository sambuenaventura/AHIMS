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
  grid-template-columns: repeat(1, 1fr);
  grid-template-rows: repeat(1, 1fr);
  justify-content: space-evenly;
}

.box {
  /* Add styling for the boxes as needed */
  /* padding: 20px; */
}

 #datePlaceholder {
  font-size: 0.9rem;

}

.boxes .box {
  border-radius: 10px;
  color: black;
  display: flex;
  justify-content: center;
  font-family: sans-serif;
  gap: 1.25rem;
  width: 22rem; /* Set a fixed width */
  /*height: 14rem;  Set a fixed height 
  overflow: hidden;*/
  padding: 2rem 2.5rem;
  font-size: 1em;

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
.flexi {
    display: flex;
    gap: 2rem;
    align-items: flex-start;
    justify-content: space-between;
}


    .flex-col {
    display: flex;
    flex-direction: column;
    }
    .flex-row {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    }
</style>
<?php $array = array('title' => 'HIMS');?>
<x-nav :data="$array"/>

<style>
    
    </style>

<section id="admission">

    <div class="admission-content">
        
      <div class="left">
        <div class="boxes">
            <div class="box box1 flex-col bg-custom-101">
                <div class="left-top-1">
                    <h4 class="font-bold">{{  $patient->first_name }} {{  $patient->last_name }}</h4>
                    <p class="font-bold">ID{{  $patient->patient_id }}</p>
                </div>
                <div class="left-top-2 flexi">
                    <p class="font-bold">{{ Carbon\Carbon::parse($patient->date_of_birth)->age }}</p>
                    <p class="font-bold">Weight</p>
                    <p class="font-bold">Blood Pressure</p>
                </div>
            </div>
            <div class="box box1 flex-col bg-white">
                <p class="font-bold">Patient Information</p>
                <div class="left-top-1 flex-row">
                    <p class="">Name:</p>
                    <p class="">{{  $patient->first_name }} {{  $patient->last_name }}</p>
                </div>
                <div class="left-top-1 flex-row">
                    <p class="">Birth Date:</p>
                    <p class="">{{  $patient->date_of_birth }}</p>
                </div>
                <div class="left-top-1 flex-row">
                    <p class="">Gender:</p>
                    <p class="">{{  $patient->gender }}</p>
                </div>
                <div class="left-top-1 flex-row">
                    <p class="">Contact Number:</p>
                    <p class="">{{  $patient->contact_number }}</p>
                </div>
                <div class="left-top-1 flexi text-right">
                    <p class="">Address:</p>
                    <p class="">{{  $patient->address }}</p>
                </div>
            </div>
            <div class="box box1 flex-col bg-white">
                <p class="font-bold">Person In-charge Information</p>
                <div class="left-top-1 flex-row">
                    <p class="">Name:</p>
                    <p class="">{{  $patient->pic_first_name }} {{  $patient->pic_last_name }}</p>
                </div>
                <div class="left-top-1 flex-row">
                    <p class="">Relation to Patient:</p>
                    <p class="">{{  $patient->pic_relation }}</p>
                </div>
                <div class="left-top-1 flex-row">
                    <p class="">Contact Number:</p>
                    <p class="">{{  $patient->pic_contact_number }}</p>
                </div>
            </div>
        </div>
      </div>
      
      <div class="right">
        <div class="card pe-0">
            <div class="card-body m-1">
              <div class="d-flex justify-content-between mb-4">
                <h4 class="font-bold">Patient Complete History</h4>
                <a href="/nurse-patients/edit/{{$patient->patient_id}}" class="btn btn-outline-success" type="submit">View/Edit</a>
            </div>  
                <hr>
                {{-- TEXT HERE --}}
            </div>
        </div>
        <div class="card pe-0">
            <div class="card-body m-1">
              <div class="d-flex justify-content-between mb-4">
                <h4 class="font-bold">Nurse Remarks</h4>
                <a href="/nurse-patients/add-remark/{{$patient->patient_id}}" class="btn btn-outline-success" type="submit">Add Remark</a>
            </div>  
                <div class="table-header">
                    <p class="font-bold">Vital Signs</p>
                    <hr>
                </div>
                <table class="table table-striped mt-3 Add">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Date</th> <!-- Removed text-center class -->
                            <th scope="col">Shift</th> <!-- Removed text-center class -->
                            <th scope="col">Specialist</th> <!-- Removed text-center class -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($patient->medicationRemarks as $medicationRemark)
                        <tr>
                            <td>{{ $medicationRemark->medication_remark_id ?? 'N/A' }}</td>
                            <td>{{ $medicationRemark->medication_date ?? 'N/A' }}</td>
                            <td>{{ $medicationRemark->shift ?? 'N/A' }}</td>
                            <td>{{ $patient->specialist ?? 'N/A' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="table-header">
                    <p class="font-bold">Vital Signs</p>
                    <hr>
                </div>
                <table class="table table-striped mt-3 Add">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Date</th> <!-- Removed text-center class -->
                            <th scope="col">Shift</th> <!-- Removed text-center class -->
                            <th scope="col">Specialist</th> <!-- Removed text-center class -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($patient->medicationRemarks as $medicationRemark)
                        <tr>
                            <td>{{ $medicationRemark->medication_remark_id ?? 'N/A' }}</td>
                            <td>{{ $medicationRemark->medication_date ?? 'N/A' }}</td>
                            <td>{{ $medicationRemark->shift ?? 'N/A' }}</td>
                            <td>{{ $patient->specialist ?? 'N/A' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
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