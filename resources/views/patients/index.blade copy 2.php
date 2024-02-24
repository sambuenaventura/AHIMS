@include('partials.header', ['bgColor' => 'bg-custom-51'])
<style>
    /* Adjust the styles based on your requirements */
    .scroller-container {
        width: 100%;
        overflow: auto;
        max-height: 300px; /* Set a fixed height for the scroller container */
    }

    .scroller {
        display: flex;
        flex-wrap: nowrap;
        padding: 10px; /* Adjust as needed */
    }

    /* Optional: Style for the pagination */
    .pagination {
        margin-top: 10px;
    }
</style>
<?php $array = array('title' => 'HIMS');?>
<x-nav :data="$array"/>

<header class="max-w-lg mx-auto">
    <a href="">
        <h1 class="text-4xl font-bold text-black text-center">Patient List</h1>
    </a>
</header>
<section class="my-5">
    <div class="rounded-lg border dark:border-neutral-600">
        <div class="p-4">
            <div class="relative overflow-auto rounded-xl p-8">
                <div class="bg-stripes-fuchsia grid grid-flow-col grid-rows-3 gap-4 rounded-lg text-center font-mono text-sm font-bold leading-6 text-white">

                    <div class="col-span-2 grid place-content-center rounded-lg bg-custom-500 p-4 w-lg">
                        <div class="col-span-2 row-span-2 grid grid-cols-2 grid-rows-2 place-content-center rounded-lg bg-blue-400 p-4 shadow-lg w-lg">
                            <div class="col-span-1 row-span-1 bg-green-500">
                                <div class="w-72 bg-white max-w-xs mx-auto rounded-sm overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-100 cursor-pointer">
                                <!-- Content for the top-left part -->
                                    <div class="h-20 bg-custom-50 flex items-center justify-between">
                                      <p class="mr-0 text-white text-lg pl-5">Patients</p>
                                    </div>
                                    <div class="flex justify-between px-5 pt-6 mb-2 text-sm text-gray-600">
                                      <p>TOTAL</p>
                                    </div>
                                    <p class="py-4 text-black text-3xl ml-5">100</p>
                                    <!-- <hr > -->
                                  </div>
                            </div>
                            <div class="col-span-1 row-span-1 bg-yellow-500">
                                <!-- Content for the top-right part -->
                                <div class="w-72 bg-white max-w-xs mx-auto rounded-sm overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-100 cursor-pointer">
                                    <!-- Content for the top-left part -->
                                        <div class="h-20 bg-custom-50 flex items-center justify-between">
                                          <p class="mr-0 text-white text-lg pl-5">Newly Admitted</p>
                                        </div>
                                        <div class="flex justify-between px-5 pt-6 mb-2 text-sm text-gray-600">
                                          <p>TOTAL</p>
                                        </div>
                                        <p class="py-4 text-black text-3xl ml-5">10</p>
                                        <!-- <hr > -->
                                      </div>                            </div>
                            <div class="col-span-1 row-span-1 bg-pink-500">
                                <!-- Content for the bottom-left part -->
                                <div class="w-72 bg-white max-w-xs mx-auto rounded-sm overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-100 cursor-pointer">
                                    <!-- Content for the top-left part -->
                                        <div class="h-20 bg-custom-50 flex items-center justify-between">
                                          <p class="mr-0 text-white text-lg pl-5">Incoming</p>
                                        </div>
                                        <div class="flex justify-between px-5 pt-6 mb-2 text-sm text-gray-600">
                                          <p>TOTAL</p>
                                        </div>
                                        <p class="py-4 text-black text-3xl ml-5">20</p>
                                        <!-- <hr > -->
                                      </div>                            </div>
                            <div class="col-span-1 row-span-1 bg-purple-500">
                                <!-- Content for the bottom-right part -->
                                <div class="w-72 bg-white max-w-xs mx-auto rounded-sm overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-100 cursor-pointer">
                                    <!-- Content for the top-left part -->
                                        <div class="h-20 bg-custom-50 flex items-center justify-between">
                                          <p class="mr-0 text-white text-lg pl-5">Discharged</p>
                                        </div>
                                        <div class="flex justify-between px-5 pt-6 mb-2 text-sm text-gray-600">
                                          <p>TOTAL</p>
                                        </div>
                                        <p class="py-4 text-black text-3xl ml-5">35</p>
                                        <!-- <hr > -->
                                      </div>                            </div>
                        </div>
                        
                    </div>
                    <div class="col-span-2 row-span-2 grid place-content-center rounded-lg bg-blue-400 p-4 shadow-lg w-lg">
                        03
                    </div>
                    <div class="row-span-3 grid place-content-top rounded-lg bg-blue-400 p-4 shadow-lg w-lg">
                        <div class="scroller-container">
                            <div class="scroller">
                        <table id="example" class="table-auto w-full">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">Patient ID</th>
                                    <th class="px-4 py-2">Patient Name</th>
                                    {{-- <th class="px-4 py-2">Gender</th>
                                    <th class="px-4 py-2">Age</th>
                                    <th class="px-4 py-2">Height</th>
                                    <th class="px-4 py-2">Weight</th>
                                    <th class="px-4 py-2">Blood</th>
                                    <th class="px-4 py-2">Phone Number</th>
                                    <th class="px-4 py-2">Address</th> --}}
                                    <th class="px-4 py-2">Specialist</th>
                                    <th class="px-4 py-2">Room Number</th>
                                    <th class="px-4 py-2">Admission Date</th>
                                    <th class="px-4 py-2">Discharge Date</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($patients as $patient)
                    
                                <tr>
                                    <td class="border px-4 py-2">{{  $patient->id }}</td>
                                    <td class="border px-4 py-2">{{  $patient->first_name }} {{  $patient->last_name }}</td>
                                    {{-- <td class="border px-4 py-2">xxxxxxxxx</td>
                                    <td class="border px-4 py-2">{{  $patient->age }}</td>
                                    <td class="border px-4 py-2">xxxxxxxxx</td>
                                    <td class="border px-4 py-2">xxxxxxxxx</td>
                                    <td class="border px-4 py-2">xxxxxxxxx</td>
                                    <td class="border px-4 py-2">xxxxxxxxx</td>
                                    <td class="border px-4 py-2">xxxxxxxxx</td> --}}
                                    <td class="border px-4 py-2">xxxxxxxxx</td>
                                    <td class="border px-4 py-2">xxxxxxxxx</td>
                                    <td class="border px-4 py-2">{{  $patient->created_at }}</td>
                                    <td class="border px-4 py-2">xxxxxxxxx</td>
                                </tr>
                                @endforeach
                                <!-- Add more rows as needed -->
                            </tbody>
                    
                        </table>
                            </div>
                        </div>
                            {{-- <div class="pagination">
                            {{ $patients->links() }}
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</section>



@include('partials.footer')