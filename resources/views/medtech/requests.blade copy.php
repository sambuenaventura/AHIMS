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
.personnel {
}
</style>
<?php $array = array('title' => 'HIMS');?>
<x-nav :data="$array"/>

<section id="medtech">
    <div class="medtech-content">
        <div class="card pe-0">
            <div class="card-body m-1">
                <div class="d-flex justify-content-between mb-4">
                    <h4>Requests</h4>
                </div>
                <ul class="nav nav-underline overflow-x-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request('requestType') == 'sent' ? 'active text-success' : 'text-secondary' }}" href="{{ route('medtech.requests', ['requestType' => 'sent']) }}">Sent Requests</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request('requestType') == 'results' ? 'active text-success' : 'text-secondary' }}" href="{{ route('medtech.results') }}">Lab Results</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request('requestType') == 'declined' ? 'active text-success' : 'text-secondary' }}" href="{{ route('medtech.requests', ['requestType' => 'declined']) }}">Declined Requests</a>
                    </li>
                </ul>
                <table class="table table-striped mt-3">
                    <thead>
                        <tr>
                            <th scope="col">Patient ID</th>
                            <th scope="col">Patient Name</th>
                            <th scope="col">Type of Service</th>
                            <th scope="col">Date Requested</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($requests as $request)
                        <tr>
                            <td>{{ $request->patient_id }}</td>
                            <td>{{ optional($request->patient)->first_name }} {{ optional($request->patient)->last_name }}</td>
                            <td>{{ $request->procedure_type }}</td>
                            <td>{{ $request->created_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $requests->appends(['requestType' => request('requestType')])->links() }}
                </div>
            </div>
        </div>
    </div>
</section>



<script>
    function validatePassword(patientId) {
        var password = document.getElementById('password' + patientId).value;
        if (password === '') {
            document.getElementById('passwordError' + patientId).style.display = 'block';
            return false; // Prevent form submission
        } else {
            document.getElementById('passwordError' + patientId).style.display = 'none';
            return true; // Allow form submission
        }
    }
    function submitForm(patientId) {
        var password = document.getElementById('password' + patientId).value;
        if (password === '') {
            document.getElementById('passwordError' + patientId).style.display = 'block';
        } else {
            document.getElementById('passwordError' + patientId).style.display = 'none';
            document.getElementById('archivePatientForm_' + patientId).submit();
        }
    }
</script>
@include('partials.footer')
