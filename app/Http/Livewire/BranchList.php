<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Branches;
use App\Models\BranchContacts;

use Carbon\Carbon;
use DB;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class BranchList extends Component
{
    use WithPagination;
    // protected $paginationTheme = 'bootstrap';
    
    public $search = '';
    public $updateMode = false;
    public $updateModeId = null;
    public $deleteMode = false;
    public $deleteModeFocusID = null;
    
    public $branchName = null;
    public $branchAddress = null;
    public $branchAddressCount = 0;
    public $branchContact = null;
    public $isMainOffice = false;
    public $hasMainOffice = false;
    public $branchContactArray = [];
    
    public $branchContactsList = [];
    
    public function resetContent(){
        $this->updateMode = false;
        $this->updateModeId = null;
        $this->branchName = null;
        $this->branchAddress = null;
        $this->branchContact = null;
        $this->isMainOffice = false;
        $this->hasMainOffice = false;
        $this->branchContactArray = [];
        $this->branchContactsList = BranchContacts::all();
        $this->deleteMode = false;
        $this->deleteModeFocusID = null;
        
        $hasMainOffice = Branches::where('is_main_office', true)->count();
        if( $hasMainOffice == 1 ){
            $this->hasMainOffice = true;
        }
    }
    
    public function updatingSearch()
    {
        $this->resetPage();
    }
    
    public function UpdatedIsMainOffice(){
        $hasMainOffice = Branches::where('is_main_office', true)->count() - 1;
        if( $hasMainOffice == 1 ){
            $this->hasMainOffice = true;
        }else{
            $this->hasMainOffice = false;
        }
    }
    
    public function UpdatedbranchAddress(){
        $this->branchAddressCount = strlen($this->branchAddress);
    }
    
    public function addContactNumber(){
        $this->branchContactArray[] = ['id' => '0000', 'contactNumber' => ''];
    }
    
    public function addUpdateContactNumber(){
        $this->branchContactArray[] = ['id' => '0000' , 'contactNumber' => ''];
    }
    
    public function removeContactNumber($index)
    {
        unset($this->branchContactArray[$index]);
        $this->branchContactArray = array_values($this->branchContactArray);
    }
    
    public function addBranch(){
        $branchContact = '';
        if( count($this->branchContactArray) > 0 ){
            $branchContact = Str::uuid();
        }
        
        $addBranch = Branches::create([
            'branch_name' => Str::upper($this->branchName),
            'branch_address' => Str::upper($this->branchAddress),
            'branch_contact' => $branchContact,
            'is_main_office' => $this->isMainOffice,
            'created_by_id' => Auth::user()->id,
            'created_by' => Auth::user()->name,
            ]
        );
        
        foreach( $this->branchContactArray as $branch_array){
            $addBranchContacts = BranchContacts::create([
                'branch_id' => $addBranch->branch_contact,
                'contact_number' => $branch_array['contactNumber'],
                'created_by_id' => Auth::user()->id,
                'created_by' => Auth::user()->name,
                ]
            );
        }
        
        $this->emit('branchSuccess');
        $this->resetContent();
        session()->flash('success', 'Branch Added.');
    }
    
    public function editBranch($id){
        $this->resetContent();
        $this->updateMode = true;
        $this->updateModeId = $id;
        $branchDetails = Branches::find($id);
        $this->branchName = $branchDetails->branch_name;
        $this->branchAddress = $branchDetails->branch_address;
        $this->branchAddressCount = strlen($this->branchAddress);
        $this->branchContact = $branchDetails->branch_contact;
        $this->isMainOffice = $branchDetails->is_main_office;
        
        $branchContacts = BranchContacts::where('branch_id', $branchDetails->branch_contact)->get();
        $indexKey = null;
        foreach($branchContacts as $branch_contacts){
            $indexKey++;
            // $this->arrayCountUpdate = $indexKey + 1;
            $this->branchContactArray[$indexKey]['id'] = $branch_contacts->id;
            $this->branchContactArray[$indexKey]['contactNumber'] = $branch_contacts->contact_number;
        }
        $this->branchContactsList = BranchContacts::all();
    }
    
    public function updateBranch($id){
        $updateBranch = Branches::find($id);
        
        $branchContact = $updateBranch->branch_contact;
        if($updateBranch->branch_contact == ''){
            $branchContact = Str::uuid();
        }
        
        $updateBranch->update([
            'branch_name' => Str::upper($this->branchName),
            'branch_address' => Str::upper($this->branchAddress),
            'branch_contact' => $branchContact,
            'is_main_office' => $this->isMainOffice,
            ]
        );
        
        foreach( $this->branchContactArray as $branch_array){
            
            if( $branch_array['id'] != "0000" ){
                
                $updBranchContacts = BranchContacts::find($branch_array['id']);
                $updBranchContacts->update(
                    ['contact_number' => $branch_array['contactNumber']]
                );
                
            }else{
                $addBranchContacts = BranchContacts::create([
                    'branch_id' => $updateBranch->branch_contact,
                    'contact_number' => $branch_array['contactNumber'],
                    'created_by_id' => Auth::user()->id,
                    'created_by' => Auth::user()->name,
                    ]
                );
            }
        }
        
        $this->emit('branchSuccess');
        $this->editBranch($this->updateModeId);
        session()->flash('success', 'Branch Updated.');
    }
    
    public function setDeleteMode($booleanValue, $focusId){
        $this->deleteMode = $booleanValue;
        $this->deleteModeFocusID = $focusId;
    }
    
    public function deleteBranch($id){
        $branchDelete = Branches::find($id);
        $branchDelete->delete();
        
        $this->emit('branchSuccess');
        $this->resetContent();
        session()->flash('success_delete', 'Branch Deleted.');
    }
    
    public function deleteContactNumber($id){
        $deleteContactNumber = BranchContacts::find($id);
        $deleteContactNumber->delete();
        
        $this->emit('branchSuccess');
        $this->editBranch($this->updateModeId);
        $this->branchContactsList = BranchContacts::all();
        session()->flash('success', 'Branch Contact Deleted.');
    }
    
    public function mount(){
        $this->branchContactsList = BranchContacts::all();
        $hasMainOffice = Branches::where('is_main_office', true)->count();
        if( $hasMainOffice == 1){
            $this->hasMainOffice = true;
        }
    }
    
    public function render()
    {
        // return view('livewire.branch-list');
        
        return view('livewire.branch-list', [
            'branchList' => Branches::where('branch_name', 'like', '%'.$this->search.'%')
            ->orWhere('branch_address', 'like', '%'.$this->search.'%')
            ->orWhere('created_by', 'like', '%'.$this->search.'%')
            ->orderBy('id', 'DESC')->paginate(50),
            'branchListCount' =>  Branches::where('branch_name', 'like', '%'.$this->search.'%')
            ->orWhere('branch_address', 'like', '%'.$this->search.'%')
            ->orWhere('created_by', 'like', '%'.$this->search.'%')
            ->orderBy('id', 'DESC')->count(),
            ]
        );
        
    }
}