<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\AppointmentList;
use Carbon\Carbon;
use DB;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class AppointmentListAdmin extends Component
{
    use WithPagination;
    // protected $paginationTheme = 'bootstrap';
    
    public $search = '';
    public $viewAppointmentDetails = [];
    public $remarks = null;
    public $remarksCount = 0;
    public $doneId = null;
    public $deleteMode = false;
    public $deleteModeFocusID = null;
    
    public function updatingSearch()
    {
        $this->resetPage();
    }
    
    public function UpdatedRemarks(){
        $this->remarksCount = strlen($this->remarks);
    }

    public function confirmAppointment($id){
        $now = Carbon::now();
        $confirmAppointment = AppointmentList::find($id);
        $confirmAppointment->update([
            'is_confirmed' => true,
            'is_confirmed_by_id' => Auth::user()->id,
            'is_confirmed_by' => Auth::user()->name,
            'is_confirmed_at' => $now,
            ]
        );
        
        $this->emit('appointmentSuccess');
        session()->flash('success', 'Appointment Confirmed!');
    }
    
    public function cancelAppointment($id){
        $now = Carbon::now();
        $cancelAppointment = AppointmentList::find($id);
        $cancelAppointment->update([
            'is_confirmed' => false,
            'is_confirmed_by_id' => Auth::user()->id,
            'is_confirmed_by' => Auth::user()->name,
            'is_confirmed_at' => $now,
            ]
        );
        
        $this->emit('appointmentSuccess');
        session()->flash('success', 'Appointment Cancelled!');
    }
    
    public function doneAppointment($id){
        $now = Carbon::now();
        $cancelAppointment = AppointmentList::find($id);
        $cancelAppointment->update([
            'is_done' => true,
            'is_done_by_id' => Auth::user()->id,
            'is_done_by' => Auth::user()->name,
            'is_done_at' => $now,
            'remarks' => $this->remarks,
            ]
        );
        $this->remarks = null;
        $this->emit('appointmentSuccess');
        session()->flash('success_done', 'Appointment Done!');
    }
    
    public function setDeleteMode($booleanValue, $focusId){
        $this->deleteMode = $booleanValue;
        $this->deleteModeFocusID = $focusId;
    }
    
    public function deleteAppointment($id){
        $appointmentDelete = AppointmentList::find($id);
        $appointmentDelete->delete();
        
        $this->emit('appointmentSuccess');
        session()->flash('success', 'Appointment Deleted!');
        $this->deleteMode = false;
        $this->deleteModeFocusID = null;
    }

    public function viewAppointment($id){
        $this->viewAppointmentDetails = AppointmentList::where('id', $id)->get();
    }
    
    public function render()
    {
        return view('livewire.appointment-list-admin', [
            'appointmentList' => AppointmentList::where('name', 'like', '%'.$this->search.'%')
            ->orWhere('email', 'like', '%'.$this->search.'%')
            ->orWhere('mobile_no', 'like', '%'.$this->search.'%')
            ->orWhere('branch', 'like', '%'.$this->search.'%')
            ->orWhere('service', 'like', '%'.$this->search.'%')
            ->orWhere('date', 'like', '%'.$this->search.'%')
            ->orWhere('created_at', 'like', '%'.$this->search.'%')
            ->orderBy('id', 'DESC')->paginate(20),
            'appointmentListCount' => AppointmentList::where('name', 'like', '%'.$this->search.'%')
            ->orWhere('email', 'like', '%'.$this->search.'%')
            ->orWhere('mobile_no', 'like', '%'.$this->search.'%')
            ->orWhere('branch', 'like', '%'.$this->search.'%')
            ->orWhere('service', 'like', '%'.$this->search.'%')
            ->orWhere('date', 'like', '%'.$this->search.'%')
            ->orWhere('created_at', 'like', '%'.$this->search.'%')->count(),
            ]
        );
    }
}