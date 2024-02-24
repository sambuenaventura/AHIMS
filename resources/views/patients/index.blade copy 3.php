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
  position: relative;
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
  gap: 0.5rem;
}
.boxes {
  padding-bottom: 2rem;
  background-color: #fff;
  display: grid;
  grid-template-columns: 200px 200px;
  grid-template-rows: 200px 200px;
  grid-column-gap: 20px;
  grid-row-gap: 20px;
  /* border: 1px dotted red; */
  justify-content: space-evenly;
}

.boxes .box {
  border-radius: 10px;
  color: black;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.4rem;
  font-family: sans-serif;
}

.left {
  width: 110rem;
  height: 40rem;
  overflow: hidden; /* This prevents the child from overflowing */
}
.right {
  width: 170rem;
  height: 45rem;
  overflow: hidden; /* This prevents the child from overflowing */
}
/* .personnel {
} */
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
        <div class="boxes">
            <div class="box flex flex-col bg-custom-100">
                <p class="font-bold  text-black">{{ count($patients) }}</p>
                <h1>Patients</h1>
            </div>
            <div class="box flex flex-col bg-custom-100">
                <p class="font-bold  text-black">xxx</p>
                <h1>Newly Admitted</h1>
            </div>          
            <div class="box flex flex-col bg-custom-100">
                <p class="font-bold  text-black">xxx</p>
                <h1>Incoming</h1>
            </div>
            <div class="box flex flex-col bg-custom-100">
                <p class="font-bold">xxx</p>
                <h1>Discharged</h1>
            </div>        
        </div>
        <div class="personnel">
            <h1 class="font-bold">Hospital Personnel</h1>
          <div class="flex gap-4">
              <p>Doctor</p>
              <p>Nurse</p>
              <p>MedTech</p>
              <p>RadTech</p>
          </div>
          <div class="scroller-container">
            <div class="scroller">
          <table id="example" class="table-auto w-full">
            <thead>
              <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Specialization</th>
                <th class="px-4 py-2">No. Patients</th>
                <th class="px-4 py-2">Availability</th>
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
      <div class="right">
        <h1 class="font-bold">Incoming Patient</h1>
        <div
          class="row-span-3 grid place-content-top rounded-lg p-4"
        >
        <div class="scroller-container">
            <div class="scroller">
          <table id="example" class="table-auto w-full">
            <thead>
              <tr>
                <th class="px-4 py-2"></th>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Gender</th>
                <th class="px-4 py-2">Age</th>
                <th class="px-4 py-2">Case</th>
                <th class="px-4 py-2">Type</th>
                <th class="px-4 py-2"></th>
              </tr>
            </thead>
            <tbody>
                @foreach ($patients as $patient)

              <tr>
                <td class="border px-4 py-2">xxxxxxxxx</td>
                <td class="border px-4 py-2">xxxxxxxxx</td>
                <td class="border px-4 py-2">xxxxxxxxx</td>
                <td class="border px-4 py-2">xxxxxxxxx</td>
                <td class="border px-4 py-2">xxxxxxxxx</td>
                <td class="border px-4 py-2">xxxxxxxxx</td>
                <td class="border px-4 py-2">xxxxxxxxx</td>
                <td class="border px-4 py-2"><a href="">☑</a></td>
              </tr>

              @endforeach
            </tbody>
          </table>
            </div>
        </div>
        </div>
      </div>
    </div>
  </section>



@include('partials.footer')