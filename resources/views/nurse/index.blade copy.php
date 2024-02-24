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
  max-width: 100rem;
  padding: 1.8rem 1.2rem;
  gap: 2.5rem;
  margin-left: 5rem;
}
.boxes {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        grid-template-rows: repeat(2, 1fr); /* Adjust the row sizes as needed */
        grid-gap: 20px;
        justify-content: space-evenly;
    }

    .right {
        /* Add any additional styling for the container */
    }

    .boxes {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        grid-template-rows: repeat(2, auto);
        grid-gap: 20px;
        justify-content: space-evenly;
    }

    .box {
        /* Adjust the width and height as needed */
        width: 300px; /* Change this value based on your preference */
        height: 100px; /* Change this value based on your preference */
        /*   padding: 3rem; */
        box-sizing: border-box; /* Include padding in the total width/height */
    }

    .box.flex {
        grid-row: span 2; /* Make the first box span two rows */
    }


    .box.flex + .box,
    .box.flex + .box + .box {
        height: 200px; /* Adjust the height for the second and third boxes */
    }

    /* Additional styling for your content */
    .box p,
    .box h1 {
        margin: 0; /* Remove default margin for consistency */
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
  width: 150rem;
  height: 45rem;
  overflow: hidden; /* This prevents the child from overflowing */
}
.right {
  width: 50rem;
  height: 45rem;
  overflow: hidden; /* This prevents the child from overflowing */
}
.personnel {
}
</style>
<?php $array = array('title' => 'HIMS');?>
<x-nav :data="$array"/>

<header class="max-w-lg mx-auto">
    <a href="">
        <h1 class="text-4xl font-bold text-black text-center">Patient List</h1>
    </a>
</header>
<section id="admission">
    <div class="admission-content">
      <div class="left">
        <div class="personnel">
          <h1 class="font-bold">Today's Patients</h1>

        <hr class="h-px my-1 bg-gray-200 border-0 dark:bg-gray-700">

        <div class="scroller-container">
          <div class="scroller">
        <table id="example" class="table-auto w-full text-left">
          <thead>
            <tr>
              <th class="px-4 py-2"></th>
              <th class="px-4 py-2">ID</th>
              <th class="px-4 py-2">Name</th>
              <th class="px-4 py-2">Gender</th>
              <th class="px-4 py-2">Age</th>
              <th class="px-4 py-2">Case</th>
              <th class="px-4 py-2">Room Number</th>
              <th class="px-4 py-2">Attending Physician</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($patients as $patient)

            <tr>
              <td class="border px-4 py-2">{{  $patient->updated_at }}</td>
              <td class="border px-4 py-2">{{  $patient->patient_id }}</td>
              <td class="border px-4 py-2">{{  $patient->first_name }} {{  $patient->last_name }}</td>
              <td class="border px-4 py-2">{{  $patient->gender }}</td>
              <td class="border px-4 py-2">{{ Carbon\Carbon::parse($patient->date_of_birth)->age }}</td>
              {{-- <td class="border px-4 py-2">{{ $patient->age }}</td> --}}
              <td class="border px-4 py-2">xxxxxxxxx</td>
              <td class="border px-4 py-2">{{  $patient->room_number }}</td>
              <td class="border px-4 py-2">{{  $patient->specialist }}</td>
            </tr>

            <!-- Add more rows as needed -->
            @endforeach
          </tbody>
        </table>
          </div>
        </div>
      </div>
      </div>
      <div class="right">
        <div class="boxes">
            <div class="box flex bg-custom-100" id="timeBox" style="grid-row: span 2;">
                <p class="font-bold text-blac" id="timePlaceholder"></p>
                <h1 id="datePlaceholder"></h1>
            </div>
    
            <div class="box flex flex-col bg-custom-100" style="grid-row: span 1;">
                <h1>Laboratory Services</h1>
                <a href="" class="block py-2 pr-4 pl-3 bg-custom-50 rounded-lg text-white text-xs">Request</a>
              </div>
    
            <div class="box flex flex-col bg-custom-100" style="grid-row: span 1;">
              <h1>Imaging Services</h1>
              <a href="" class="block py-2 pr-4 pl-3 bg-custom-50 rounded-lg text-white text-xs">Request</a>
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