@include('partials.header', ['bgColor' => 'bg-custom-51'])
<style>

    * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
.image-container {
    max-width: 100%;
    overflow-x: auto;
    display: flex; /* Center the content horizontally */
    justify-content: center; /* Center the content horizontally */
    align-items: center; /* Center the content vertically */
}



.image-wrapper img {
    max-width: 100%;
    height: auto;
}

html {
  background-color: #eee;
}
/* .collapse:not(.show) {
    display: block;
    visibility: visible;
    height: auto;
} */
.custom-collapse {
    display: none;
    overflow: hidden;
}
.custom-collapse.show {
    display: block;
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
.card-header {
    transition: 0.3s;

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
.flex-row-none {
    display: flex;
    flex-direction: row;
}
.filename {
    text-align: center; color: #333; font-weight: bold; font-size: 14px;
}
</style>
<?php $array = array('title' => 'HIMS');?>
<x-nav :data="$array"/>

<style>
    
    </style>

<section id="admission">
    <div class="admission-content">
      <div class="left">
        <div class="card pe-0 mb-4 shadow-md" style="border: none;">
            <div class="boxes">
                <div class="box box1 flex-col bg-custom-101">
                    <div class="left-top-1">
                        <h4 class="font-bold">{{  $patient->first_name }} {{  $patient->last_name }}</h4>
                        <p class="font-bold">ID{{  $patient->patient_id }}</p>
                    </div>
                    <div class="left-top-2 flex-row-none gap-16">
                        <p class="font-bold">{{ Carbon\Carbon::parse($patient->date_of_birth)->age }} y/o</p>
                        <p class="font-bold">{{ optional($patient)->gender }}</p>
                    </div>
                </div>
                {{-- <div class="box box1 flex-col bg-white" style="font-size: 0.9em;"> --}}
                    <div class="box box1 flex-col bg-white">

                    <p class="font-bold">Request Information (ID: {{ $request->request_id }})</p>
                    <div class="left-top-1 flex-row">
                        <p class="">Date:</p>
                        <p class="">{{ \Carbon\Carbon::parse($request->date_needed)->format('n/j/Y') }}</p>               
                    </div>
                    <div class="left-top-1 flex-row">
                        <p class="">Time:</p>
                        <p class="">                            
                            @if($request->stat)
                            <span class="badge bg-danger">STAT</span>
                            @else
                                {{ \Carbon\Carbon::parse($request->time_needed)->format('h:i A') }}
                            @endif
                        </p>                      
                    </div>
                    <div class="left-top-1 flex-row">
                        <p class="">Type of Service:</p>
                        <p class="">{{ $request->procedure_type }}</p>
                    </div>
                    <div class="left-top-1 {{ strpos($request->sender_message, ',') === false ? 'flex-row' : '' }}">
                        <p class="">Type of Test:</p>
                        @if (strpos($request->sender_message, ',') === false)
                            <p class="">{{ $request->sender_message }}</p>
                        @else
                            @foreach (explode(',', $request->sender_message) as $item)
                                <p class="">{{ $item }}</p>
                            @endforeach
                        @endif
                    </div>
                    {{-- <div class="left-top-1 row">
                        <div class="col-md-4">
                            <p class="" style="min-width: 100px;">Type of Test:</p>
                        </div>
                        <div class="col-md-8 overflow-wrap d-flex flex-column">
                            @php
                                $senderMessageArray = explode(',', $request->sender_message);
                            @endphp
                            @foreach($senderMessageArray as $message)
                                <p class="text-md-end">{{ trim($message) }}</p>
                            @endforeach
                        </div>
                    </div> --}}
                </div>            
                <div class="card-footer flex-col">
                    <div class="flex-row">
                        <small class="text-muted">Requested by:</small>
                        @if ($request->sender_id)
                            @if ($request->sender)
                                <small class="text-muted">{{ $request->sender->first_name }} {{ $request->sender->last_name }}</small>
                            @else
                                <small class="text-muted">Unknown Sender</small>
                            @endif
                        @else
                            <small class="text-muted">Unknown Sender</small>
                        @endif
                    </div>
                    <div class="flex-row">
                        <small class="text-muted">Date & Time:</small>
                        <small class="text-muted">{{ optional($request)->created_at ? \Carbon\Carbon::parse($request->created_at)->format('g:i A n/j/Y') : 'N/A' }}</small>
                    </div>
                </div>
                
            </div>
        </div>
      </div>
      
      <div class="right">
        
        <div class="card pe-0">
            <div class="card-body m-1">
                <div class="d-flex justify-content-between mb-4">
                    <h4 class="font-bold">{{ $isImagingService ? 'Imaging' : 'Laboratory' }} Result</h4>
                
                </div>
                <hr>
                <p><strong>File Name(s):</strong></p>
                <ul>
                    @php
                        $images = json_decode($request->image);
                    @endphp
                    @foreach ($images as $image)
                        <li>{{ basename($image) }}</li>
                    @endforeach
                </ul>
                
                <p><strong>Message:</strong> {{ $request->message }}</p>
                <div class="image-container bg-[#DCEDDD] px-24 py-12 rounded d-flex flex-wrap">
                    @foreach ($images as $image)
                        <div class="image-wrapper mb-16">
                            <img src="{{ asset('storage/' . $image) }}" alt="Image" style="max-width: 100%; height: auto;">
                            <p class="filename">{{ basename($image) }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
      
    </div>
    
    </div>
</section>


  <script>


</script>
@include('partials.footer')




