<div>
    <div class="col-md-12">
        @if(session('success'))
        <div class="alert alert-success" role="alert">
            {!! Str::upper(session('success')) !!} 
        </div>
        @endif   
    </div>
    
    <style>
        input { 
            text-transform: uppercase;
        }
        textarea { 
            text-transform: uppercase;
        }
        ::-webkit-input-placeholder { /* WebKit browsers */
            text-transform: none;
        }
    </style>
    
    <div class="col-md-12">
        
        <div>
            <div class="input-group">
                <input type="text" placeholder="Search" class="form-control input-lg" id="search" wire:model="search" wire:keydown.escape="$set('search', '')" autofocus> 
                <span class="input-group-btn">
                    <button type="reset" class="btn btn-warning btn-flat btn-lg" wire:click="$set('search', '')">
                        Clear
                    </button>
                </span>
            </div>
            Total of <b class="text-success" style="font-size: 120%;"> {{ $appointmentListCount }} </b> Result/s Found
        </div>
        
        <br>
        
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Appointment Table</h3>
                <div class="box-tools"></div>
            </div>
            
            <div class="box-body table-responsive no-padding">
                @if ( $appointmentListCount > 0)
                
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Client</th>
                            <th>Email</th>
                            <th>Mobile No.</th>
                            <th>Branch</th>
                            <th>Service</th>
                            <th>Status</th>
                            <th>Appointment Date</th>
                            <th>Requested at</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($appointmentList as $appointment_list)
                        <tr>
                            <td>{{ $appointment_list->id }}</td>
                            <td>{{ $appointment_list->name }}</td>
                            <td>{{ $appointment_list->email }}</td>
                            <td>{{ $appointment_list->mobile_no }}</td>
                            <td>{{ $appointment_list->branch }}</td>
                            <td>{{ $appointment_list->service }}</td>
                            <td>
                                @if( $appointment_list->is_done == false )
                                
                                @if( $appointment_list->is_confirmed == true )
                                <span class="label label-success">Confirmed</span>
                                @else
                                <span class="label label-danger">Pending</span>
                                @endif
                                
                                @else
                                <span class="label label-success">Done</span>
                                @endif
                            </td>
                            <td> <b> {{ \Carbon\Carbon::parse($appointment_list->date)->toDayDateTimeString() }} </b> </td>
                            <td> <b> {{ \Carbon\Carbon::parse($appointment_list->created_at)->toDayDateTimeString() }} </b> </td>
                            <td>
                                @if( $appointment_list->is_done == false)
                                
                                @if( $appointment_list->is_confirmed == false)
                                <button class="btn btn-secondary btn-flat btn-sm" wire:click="confirmAppointment({{ $appointment_list->id }})">
                                    <i class="fa fa-check"></i>
                                    Confirm
                                </button>
                                @else
                                <button class="btn btn-success btn-flat btn-sm"  data-toggle="modal" data-target="#appointmentDoneModal" wire:click="$set('doneId', {{ $appointment_list->id }})">
                                    <i class="fa fa-check"></i>
                                    Done
                                </button>
                                <button class="btn btn-warning btn-flat btn-sm" wire:click="cancelAppointment({{ $appointment_list->id }})">
                                    <i class="fa fa-times"></i>
                                    Cancel
                                </button>
                                @endif
                                
                                @endif
                            </td>
                            <td>
                                <button class="btn btn-primary btn-flat btn-sm" wire:click="viewAppointment({{ $appointment_list->id }})" title="View Appointment" data-toggle="modal" data-target="#appointmentDetailsModal"><i class="fa fa-search"></i></button>
                            </td>
                            <td>
                                <button class="btn btn-danger btn-flat btn-sm" wire:click="deleteAppointment({{ $appointment_list->id }})" title="Delete"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <h4 style="text-align: center;">No Testimonials Found.</h4>
                @endif         
            </div>
            
        </div>
        
        <div style="text-align: center;">
            {{ $appointmentList->links() }}
        </div>
        
    </div>
    
    <div class="modal fade" id="appointmentDetailsModal" tabindex="-1" role="dialog" aria-labelledby="appointmentDetailsModal" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">
                        Appointment Details
                    </h4>
                </div>
                
                <div class="modal-body">
                    
                    @foreach($viewAppointmentDetails as $appointment_details)
                    
                    <h3 style="text-align: right; margin-bottom: 0px;"> <small>APPOINTMENT DATE</small> {{ \Carbon\Carbon::parse($appointment_details->date)->toDayDateTimeString() }} </h3>
                    <p style="text-align: right;"><i> Requested at {{ \Carbon\Carbon::parse($appointment_details->created_at)->toDayDateTimeString() }} </i></p>
                    
                    <div class="form-group">
                        <label for="">Client Name</label>
                        <input class="form-control" type="text" value="{{ $appointment_details->name }}" />
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input class="form-control" type="text" value="{{ $appointment_details->email }}" />
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Mobile No</label>
                                <input class="form-control" type="text" value="{{ $appointment_details->mobile_no }}" />
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Branch</label>
                                <input class="form-control" type="text" value="{{ $appointment_details->branch }}" />
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Service</label>
                                <input class="form-control" type="text" value="{{ $appointment_details->service }}" />
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="">Remarks</label>
                        {{-- <input class="form-control" type="text" value="{{ $appointment_details->remarks }}" /> --}}
                        <textarea class="form-control" id="remarks" name="remarks" rows="5" maxlength="200">{{ $appointment_details->remarks }}</textarea>

                    </div>
                    
                    @if( $appointment_details->is_confirmed == true )
                    <h5>Confirmed at <b> {{ \Carbon\Carbon::parse($appointment_details->is_confirmed_at)->toDayDateTimeString() }} </b> by <b> {{ $appointment_details->is_confirmed_by }} </b></h5>
                    @endif
                    
                    @if( $appointment_details->is_done == true )
                    <h5>Appointment Done at <b> {{ \Carbon\Carbon::parse($appointment_details->is_done_at)->toDayDateTimeString() }} </b> by <b> {{ $appointment_details->is_done_by }} </b></h5>
                    @endif
                    
                    @endforeach
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="appointmentDoneModal" tabindex="-1" role="dialog" aria-labelledby="appointmentDoneModal" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">
                        Appointment Done
                    </h4>
                </div>
                
                <div class="modal-body">
                    
                    @if(session('success_done'))
                    <div class="alert alert-success" role="alert">
                        {!! Str::upper(session('success_done')) !!} 
                    </div>
                    @endif   
                    
                    <div class="form-group">
                        <label for="">Remarks {{ $remarksCount }}/200 </label>
                        <textarea class="form-control" id="remarks" name="remarks" wire:model="remarks" rows="5" maxlength="200"></textarea>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn-flat pull-right" wire:click="doneAppointment({{ $doneId }})">Submit</button>
                </div>
            </div>
        </div>
    </div>
    
</div>