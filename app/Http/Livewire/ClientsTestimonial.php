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
use Livewire\WithPagination;

class ClientsTestimonial extends Component
{   
    use WithPagination;
    // protected $paginationTheme = 'bootstrap';
    
    public $search = '';
    
    public $updateMode = false;
    public $updateModeId = null;
    public $clientName = null;
    public $testimonialScript = null;
    public $testimonialScriptCount = 0;
    public $servicePurchased = '';
    public $isPublished = false;
    public $servicesList = [];
    
    public function resetContent(){
        $this->updateMode = false;
        $this->updateModeId = null;
        $this->clientName = null;
        $this->testimonialScript = null;
        $this->servicePurchased = '';
        $this->isPublished = false;
    }
    
    public function updatingSearch()
    {
        $this->resetPage();
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
    
    public function editTestimonial($id){
        $this->updateMode = true;
        $this->updateModeId = $id;
        $testimonialDetails = ClientTestimonial::find($id);
        $this->clientName = $testimonialDetails->client_name;
        $this->testimonialScript = $testimonialDetails->testimonial;
        $this->testimonialScriptCount = strlen($this->testimonialScript);
        $this->servicePurchased = $testimonialDetails->service_purchased;
        $this->isPublished = $testimonialDetails->is_published;
    }
    
    public function updateTestimonial($id){
        $testimonialUpdate = ClientTestimonial::find($id);
        $testimonialUpdate->update([
            'client_name' => Str::upper($this->clientName),
            'testimonial' => Str::upper($this->testimonialScript),
            'service_purchased' => Str::upper($this->servicePurchased),
            'is_published' => $this->isPublished,
            'created_by_id' => Auth::user()->id,
            'created_by' => Auth::user()->name, 
            ]
        );
        
        $this->emit('testimonialSuccess');
        // $this->resetContent();
        session()->flash('success', 'Testimonial Updated Successfully!');
    }
    
    public function deleteTestimonial($id){
        $testimonialDelete = ClientTestimonial::find($id);
        $testimonialDelete->delete();
        
        $this->emit('testimonialSuccess');
        $this->resetContent();
        session()->flash('success_delete', 'Testimonial Deleted Successfully!');
    }
    
    public function mount (){
        $this->servicesList = Services::all()->sortBy('service_name');
    }
    
    public function render()
    {
        // return view('livewire.clients-testimonial');
        
        return view('livewire.clients-testimonial', [
            'testimonialList' => ClientTestimonial::where('client_name', 'like', '%'.$this->search.'%')
            ->orWhere('testimonial', 'like', '%'.$this->search.'%')
            ->orWhere('service_purchased', 'like', '%'.$this->search.'%')
            ->orderBy('id', 'DESC')->paginate(20),
            'testimonialListCount' => ClientTestimonial::where('client_name', 'like', '%'.$this->search.'%')
            ->orWhere('testimonial', 'like', '%'.$this->search.'%')
            ->orWhere('service_purchased', 'like', '%'.$this->search.'%')->count(),
            ]
        );
    }
}