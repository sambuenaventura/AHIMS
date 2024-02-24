@include('partials.header', ['bgColor' => 'bg-custom-51'])
<style>
    /* Adjust the styles based on your requirements */
    .scroller-container {
        width: 100%;
        overflow: auto;
        max-height: 40rem; /* Set a fixed height for the scroller container */
   
    }


    .scroller {
        display: flex;
        flex-wrap: nowrap;
        padding: 1px; /* Adjust as needed */
    }

    /* Optional: Style for the pagination */
    .pagination {
        margin-top: 10px;

        
    }
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
  align-items: center;
  justify-content: center;
  background-color: #f8f8f8;
}
.admission-content {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 100%;
  max-width: 83rem;
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

.left {
  width: 50rem;
  height: 50rem;
  overflow: hidden; /* This prevents the child from overflowing */
}
.right {
  width: 170rem;
  height: 50rem;
  overflow: hidden; /* This prevents the child from overflowing */
}
.personnel {
}
</style>
<?php $array = array('title' => 'HIMS');?>
<x-nav :data="$array"/>

<section id="admission">
    <div class="admission-content">
      <div class="left">
        <div class="boxes">
          <div class="box flex flex-col bg-custom-100">
            <p class="font-bold text-black" id="timePlaceholder"></p>
            <h1 id="datePlaceholder"></h1>
          </div>
          
          <div class="box flex flex-col bg-custom-100">
            <p class="font-bold text-black">{{ $patients->where('admission_type', 'Inpatient')->count() }}</p>
            <h1>Inpatient</h1>
          </div>
          
          <div class="box flex flex-col bg-custom-100">
            <p class="font-bold text-black">{{ $patients->where('admission_type', 'Outpatient')->count() }}</p>
            <h1>Outpatient</h1>
          </div>
          <!-- Remove one box -->
        </div>
      </div>
      
      <div class="right">
        <div class="personnel">
          <h1 class="font-bold">Available Doctors</h1>
        <div class="flex gap-4">
            <p>Internist</p>
            <p>Gastroenterologist</p>
            <p>Neurologist</p>
            <p>Cardiologist</p>
            <p>Pulmonologist</p>
            <p>Pediatricians</p>
        </div>
        <hr class="h-px my-1 bg-gray-200 border-0 dark:bg-gray-700">

        <div class="scroller-container">
          <div class="scroller">
        <table id="example" class="table-auto w-full">
          <thead>
            <tr>
              <th class="px-4 py-2">ID</th>
              <th class="px-4 py-2">Name</th>
              <th class="px-4 py-2">No. Patients</th>
              <th class="px-4 py-2">Room Number</th>
              <th class="px-4 py-2">Clinic Hours</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($patients as $patient)

            <tr>
              <td class="border px-4 py-2">xxx</td>
              <td class="border px-4 py-2">xx</td>
              <td class="border px-4 py-2">xxxxxxxxx</td>
              <td class="border px-4 py-2">xxxxxxxxx</td>
              <td class="border px-4 py-2">xx</td>
            </tr>

            <!-- Add more rows as needed -->
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