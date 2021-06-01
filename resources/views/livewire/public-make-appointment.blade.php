<div>
    
    <style>
        input { 
            text-transform: uppercase;
        }
        ::-webkit-input-placeholder { /* WebKit browsers */
            text-transform: none;
        }
    </style>
    
    <form class="intro_form" id="intro_form" wire:submit.prevent="submitAppointment" autocomplete="off">
        @csrf
        
        <div>
            @error('name') <span class="error">{{ $message }}</span> @enderror
            @error('email') <span class="error">{{ $message }}</span> @enderror
            @error('mobileNo') <span class="error">{{ $message }}</span> @enderror
        </div>
        
        <div class="d-flex flex-row align-items-start justify-content-between flex-wrap">
            <input type="text" class="intro_input" placeholder="Your Name" required="required" wire:model="name">            
            <input type="email" class="intro_input" placeholder="Your E-mail" required="required" wire:model="email">
            <input type="number" class="intro_input" placeholder="Your Mobile No" required="required" wire:model="mobileNo">
            <select class="intro_select intro_input" required wire:model="selectedBranch">
                <option disabled="" selected="" value="">Branch</option>
                @if( count($branchList) > 0 )
                @foreach($branchList as $branch_list)
                <option value="{{ Str::upper($branch_list->branch_name) }}">{{ Str::upper($branch_list->branch_name) }}</option>
                @endforeach
                @endif
            </select>
            <select class="intro_select intro_input" required="required" wire:model="selectedService">
                <option disabled="" selected="" value="">Service</option>
                @if( count($servicesList) > 0 )
                @foreach($servicesList as $service_list)
                <option value="{{ Str::upper($service_list->service_name) }}">{{ Str::upper($service_list->service_name) }}</option>
                @endforeach
                @endif
            </select>
            <input type="date" class="intro_input" placeholder="Date" required="required" wire:model="appointmentDate">
        </div>
        
        <div wire:loading.remove wire:target="submitAppointment">    
            <button type="submit" class="button button_1 intro_button trans_200">make an appointment</button>
        </div>
        
        <div wire:loading wire:target="submitAppointment">
            <h4 style="text-align: center;">Saving...</h4>
        </div>
    </form>
    
    {{-- data-toggle="modal" data-target="#confirmAppointmentModal" --}}
    <div class="modal fade" id="confirmAppointmentModal" tabindex="-1" role="dialog" aria-labelledby="confirmAppointmentModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Website Message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                    <h5 style="text-align: center;">Appointment Saved Successfully</h6>
                        <h6 style="text-align: center;">Please wait for the Confirmation of your Appointment in your Mobile Number and Email. Thank you.</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    
                </div>
            </div>
        </div>
        
    </div>