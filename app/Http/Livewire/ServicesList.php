<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Services;
use App\Models\BranchContacts;

use Carbon\Carbon;
use DB;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class ServicesList extends Component
{
    
    use WithPagination;
    // protected $paginationTheme = 'bootstrap';
    
    public $search = '';
    public $updateMode = false;
    public $deleteMode = false;
    public $deleteModeFocusID = null;
    public $updateModeId = null;
    public $mostAvailedCount = 0; //MUST NOT BE ABLE TO EXCEED AT 6
    
    public $serviceName = null;
    public $priceRange = null;
    public $serviceDescription = null;
    public $serviceDescriptionCount = 0;
    public $isMostAvailed = false;
    
    public function resetContent(){
        $this->updateMode = false;
        $this->deleteMode = false;
        $this->deleteModeFocusID = null;
        $this->updateModeId = null;
        $this->serviceName = null;
        $this->priceRange = null;
        $this->serviceDescription = null;
        $this->isMostAvailed = false;
        $this->mostAvailedCount = Services::where('is_most_availed', true)->count();
    }
    
    public function updatingSearch()
    {
        $this->resetPage();
    }
    
    public function UpdatedServiceDescription(){
        $this->serviceDescriptionCount = strlen($this->serviceDescription);
    }
    
    public function UpdatedIsMostAvailed(){
        $this->mostAvailedCount = Services::where('is_most_availed', true)->count() - 1;
    }
    
    public function addService(){
        $addService = Services::create([
            'service_name' => Str::upper($this->serviceName),
            'price_range' => Str::upper($this->priceRange),
            'description' => Str::upper($this->serviceDescription),
            'is_most_availed' => $this->isMostAvailed,
            'created_by_id' => Auth::user()->id,
            'created_by' => Auth::user()->name,
            ]
        );
        
        $this->emit('serviceSuccess');
        $this->resetContent();
        session()->flash('success', 'Service Added.');
    }
    
    public function editService($id){
        $this->resetContent();
        $this->updateMode = true;
        $this->updateModeId = $id;
        $serviceDetails = Services::find($id);
        $this->serviceName = $serviceDetails->service_name;
        $this->priceRange = $serviceDetails->price_range;
        $this->serviceDescription = $serviceDetails->description;
        $this->isMostAvailed = $serviceDetails->is_most_availed;
        $this->serviceDescriptionCount = strlen($this->serviceDescription);
    }
    
    public function updateService($id){
        $updateService = Services::find($id);
        $updateService->update([
            'service_name' => Str::upper($this->serviceName),
            'price_range' => Str::upper($this->priceRange),
            'description' => Str::upper($this->serviceDescription),
            'is_most_availed' => $this->isMostAvailed,
            ]
        );
        
        $this->emit('serviceSuccess');
        $this->editService($this->updateModeId);
        session()->flash('success', 'Service Updated.');
    }
    
    public function setDeleteMode($booleanValue, $focusId){
        $this->deleteMode = $booleanValue;
        $this->deleteModeFocusID = $focusId;
    }
    
    public function deleteService($id){
        $deleteService = Services::find($id);
        $deleteService->delete();
        
        $this->emit('serviceSuccess');
        $this->resetContent();
        session()->flash('success_delete', 'Service Deleted.');
    }
    
    public function mount(){
        $this->mostAvailedCount = Services::where('is_most_availed', true)->count();
    }
    
    public function render()
    {
        // return view('livewire.services-list');
        
        return view('livewire.services-list', [
            'serviceList' => Services::where('service_name', 'like', '%'.$this->search.'%')
            ->orWhere('price_range', 'like', '%'.$this->search.'%')
            ->orWhere('created_by', 'like', '%'.$this->search.'%')
            ->orderBy('id', 'DESC')->paginate(20),
            'serviceListCount' =>  Services::where('service_name', 'like', '%'.$this->search.'%')
            ->orWhere('price_range', 'like', '%'.$this->search.'%')
            ->orWhere('created_by', 'like', '%'.$this->search.'%')
            ->orderBy('id', 'DESC')->count(),
            ]
        );
        
    }
}
