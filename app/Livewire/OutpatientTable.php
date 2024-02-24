<?php

// app/Http/Livewire/OutpatientTable.php

use Livewire\Component;
use App\Models\Patients;

class OutpatientTable extends Component
{
    public $patients;

    public function render()
    {
        $this->patients = Patients::where('admission_type', 'Outpatient')->get();

        return view('livewire.outpatient-table');
    }
}
