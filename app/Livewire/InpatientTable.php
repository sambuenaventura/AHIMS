<?php

// app/Http/Livewire/InpatientTable.php

use Livewire\Component;
use App\Models\Patients;

class InpatientTable extends Component
{
    public $patients;

    public function render()
    {
        $this->patients = Patients::where('admission_type', 'Inpatient')->get();

        return view('livewire.inpatient-table');
    }
}

