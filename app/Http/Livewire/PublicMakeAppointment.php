<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Branches;
use App\Models\Services;
use App\Models\AppointmentList;

use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PublicMakeAppointment extends Component
{
    public $branchList = [];
    public $servicesList = [];
    
    public $name = null;
    public $email = null;
    public $mobileNo = null;
    public $selectedBranch = '';
    public $selectedService = '';
    public $appointmentDate = null;
    
    protected $rules = [
        'name' => 'required|min:5',
        'mobileNo' => 'required|min:10|max:11',
        'email' => 'required|email|min:12',
    ];
    
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    
    public function resetContent(){
        $this->name = null;
        $this->email = null;
        $this->mobileNo = null;
        $this->selectedBranch = '';
        $this->selectedService = '';
        $this->appointmentDate = null;
    }
    
    public function submitAppointment(){
        $this->validate();

        $addAppointment = AppointmentList::create([
            'name' => Str::upper($this->name),
            'email' => Str::upper($this->email),
            'mobile_no' => $this->mobileNo,
            'branch' => Str::upper($this->selectedBranch),
            'service' => Str::upper($this->selectedService),
            'date' => $this->appointmentDate,
            ]
        );
        
        $this->emit('appointmentSuccess');
        $this->resetContent();
        session()->flash('success', 'Appointment Successfully Added!');
    }
    
    public function mount(){
        $this->branchList = Branches::all()->sortBy('branch_name');
        $this->servicesList = Services::all()->sortBy('service_name');
    }
    
    public function render()
    {
        return view('livewire.public-make-appointment');
    }
}