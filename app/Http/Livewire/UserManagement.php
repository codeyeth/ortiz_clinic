<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\User;
use App\Models\Branches;

use Carbon\Carbon;
use DB;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;

class UserManagement extends Component
{
    use WithPagination;
    
    public $search = '';
    public $updateMode = false;
    public $deleteMode = false;
    public $deleteModeFocusID = null;
    public $updateModeId = null;
    public $branchList = [];
    
    //User Details
    public $userName = '';
    public $userEmail = '';
    public $userBranch = '';
    public $isAdmin = false;
    
    public function resetContent(){
        $this->updateMode = false;
        $this->deleteMode = false;
        $this->deleteModeFocusID = null;
        $this->updateModeId = null;
        
        $this->userName = '';
        $this->userEmail = '';
        $this->userBranch = '';
        $this->isAdmin = false;
    }
    
    public function updatingSearch()
    {
        $this->resetPage();
    }
    
    public function addUser(){
        $addUser = User::create([
            'name' => Str::upper($this->userName),
            'email' => Str::upper($this->userEmail),
            'branch' => Str::upper($this->userBranch),
            'password' => Hash::make('12345678'),
            'password_string' => '12345678',
            'is_admin' => $this->isAdmin,
            'created_by_id' => Str::upper(Auth::user()->id),
            'created_by' => Auth::user()->name,
            ]
        );
        
        $this->emit('userSuccess');
        $this->resetContent();
        session()->flash('success', 'User Added.');
    }
    
    public function editUser($id){
        $this->resetContent();
        $this->updateMode = true;
        $this->updateModeId = $id;
        $userDetails = User::find($id);
        $this->userName = $userDetails->name;
        $this->userEmail = $userDetails->email;
        $this->userBranch = $userDetails->branch;
        $this->isAdmin = $userDetails->is_admin;
    }
    
    public function updateUser($id){
        $updateUser = User::find($id);
        $updateUser->update([
            'name' => Str::upper($this->userName),
            'email' => Str::upper($this->userEmail),
            'branch' => Str::upper($this->userBranch),
            'is_admin' => $this->isAdmin,
            ]
        );
        
        $this->emit('userSuccess');
        $this->editUser($this->updateModeId);
        session()->flash('success', 'User Updated.');
    }
    
    public function setDeleteMode($booleanValue, $focusId){
        $this->deleteMode = $booleanValue;
        $this->deleteModeFocusID = $focusId;
    }
    
    public function deleteUser($id){
        $deleteUser = User::find($id);
        $deleteUser->delete();
        
        $this->emit('userSuccess');
        $this->resetContent();
        session()->flash('success_delete', 'User Deleted.');
    }
    
    public function mount(){
        $this->branchList = Branches::all();
    }
    
    public function render()
    {
        // return view('livewire.user-management');
        
        return view('livewire.user-management', [
            'userList' => User::where('name', 'like', '%'.$this->search.'%')
            ->orWhere('email', 'like', '%'.$this->search.'%')
            ->orWhere('created_by', 'like', '%'.$this->search.'%')
            ->orderBy('id', 'DESC')->paginate(30),
            'userListCount' =>  User::where('name', 'like', '%'.$this->search.'%')
            ->orWhere('email', 'like', '%'.$this->search.'%')
            ->orWhere('created_by', 'like', '%'.$this->search.'%')
            ->orderBy('id', 'DESC')->count(),
            ]
        );
        
    }
}
