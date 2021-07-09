<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\AppointmentList;
use App\Models\Branches;
use App\Models\BranchContacts;
use App\Models\Services;
use App\Models\ClientTestimonial;

class AdminHome extends Component
{
    //APPOINTMENTS
    public $appointmentCount = null;
    public $appointmentConfirmed = null;
    public $appointmentPending = null;
    public $appointmentDone = null;
    
    //BRANCHES
    public $branchCount = null;
    public $branchComplete = null;
    public $branchIncomplete = null;
    
    //SERVICES
    public $servicesCount = null;
    public $servicesComplete = null;
    public $servicesIncomplete = null;
    
    //TESTIMONIAL
    public $testimonialCount = null;
    public $testimonialPosted = null;
    public $testimonialHidden = null;
    
    public function mount(){
        //APPOINTMENTS
        $this->appointmentCount = AppointmentList::all()->count();
        $this->appointmentConfirmed = AppointmentList::where('is_confirmed', true)->where('is_done', false)->count();
        $this->appointmentPending = AppointmentList::where('is_confirmed', false)->where('is_done', false)->count();
        $this->appointmentDone = AppointmentList::where('is_confirmed', true)->where('is_done', true)->count();
        
        //BRANCHES
        $this->branchCount = Branches::all()->count();
        $branchIntegrity = Branches::where('branch_address', '')->orWhere('branch_contact', '')->count();
        if( $branchIntegrity > 0 ){
            $this->branchIncomplete = $branchIntegrity;
        }else{
            $this->branchIncomplete = 0;
        }
        $this->branchComplete = $this->branchCount - $branchIntegrity;
        
        //SERVICES
        $this->servicesCount = Services::all()->count();
        $servicesIntegrity = Services::where('service_name', '')->orWhere('price_range', '')->orWhere('description', '')->count();
        if( $servicesIntegrity > 0 ){
            $this->servicesIncomplete = $servicesIntegrity;
        }else{
            $this->servicesIncomplete = 0;
        }
        $this->servicesComplete = $this->servicesCount - $servicesIntegrity;
        
        //TESTIMONIAL
        $this->testimonialCount = ClientTestimonial::all()->count();
        $this->testimonialPosted = ClientTestimonial::where('is_published', true)->count();
        $this->testimonialHidden = ClientTestimonial::where('is_published', false)->count();
    }
    
    public function render()
    {
        return view('livewire.admin-home');
    }
}