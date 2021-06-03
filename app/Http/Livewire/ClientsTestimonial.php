<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ClientTestimonial;
use App\Models\Services;
use App\Models\AppointmentList;

use Carbon\Carbon;
use DB;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ClientsTestimonial extends Component
{
    
    public $clientName = null;
    public $testimonialScript = null;
    public $testimonialScriptCount = 0;
    public $servicePurchased = '';
    public $isPublished = false;
    public $servicesList = [];
    
    public function resetContent(){
        $this->clientName = null;
        $this->testimonialScript = null;
        $this->servicePurchased = '';
        $this->isPublished = false;
    }

    public function UpdatedTestimonialScript(){
        $this->testimonialScriptCount = strlen($this->testimonialScript);
    }
    
    public function submitTestimonial(){
        // $this->validate();
        
        $addTestimonial = ClientTestimonial::create([
            'client_name' => Str::upper($this->clientName),
            'testimonial' => Str::upper($this->testimonialScript),
            'service_purchased' => Str::upper($this->servicePurchased),
            'is_published' => $this->isPublished,
            'created_by_id' => Auth::user()->id,
            'created_by' => Auth::user()->name,
            ]
        );
        
        $this->emit('testimonialSuccess');
        $this->resetContent();
        session()->flash('success', 'Testimonial Saved Successfully!');
    }


    
    public function mount (){
        $this->servicesList = Services::all()->sortBy('service_name');
    }
    
    public function render()
    {
        return view('livewire.clients-testimonial');
    }
}