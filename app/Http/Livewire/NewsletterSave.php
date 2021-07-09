<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use DB;
use Auth;
use Request;
use Illuminate\Support\Str;
use App\Models\NewsletterEmails;
use Jenssegers\Agent\Agent;

use Illuminate\Support\Facades\Validator;

class NewsletterSave extends Component
{
    public $email = null;
    
    protected $rules = [
        'email' => 'required|email|min:5|unique:newsletter_emails',
    ];

    protected $messages = [
        'email.unique' => 'The Email Address is already in the Database.',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    
    public function submitEmail(){
        $this->validate();

        $agent = new Agent();
        
        $addedThru = $agent->browser();
        if( $agent->isRobot() ){
            $addedThru = $agent->browser() . ' ' . $agent->robot();
        }
        
        $addEmail = NewsletterEmails::create([
            'email_id' => Str::uuid(),
            'email' => Str::upper($this->email),
            'ip_address' => Request::ip(),
            'added_thru' => $addedThru,
            ]
        );
        
        $this->emit('newsletterSuccess');
        $this->email = null;
        session()->flash('success', 'Email Saved Successfully!');
    }
    
    public function render()
    {
        return view('livewire.newsletter-save');
    }
}
