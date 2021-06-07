<div>
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
        @if(session('success_delete'))
        <div class="alert alert-success" role="alert">
            {!! Str::upper(session('success_delete')) !!} 
        </div>
        @endif   
    </div>
    
    
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
            Total of <b class="text-success" style="font-size: 120%;"> {{ $serviceListCount }} </b> Result/s Found
        </div>
        
        <br>
        
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Services Table</h3>
                <div class="box-tools">
                    <button class="btn btn-primary btn-flat btn-sm" type="button" title="Add Service" data-toggle="modal" data-target="#addServiceModal" wire:click="resetContent">
                        <i class="fa fa-cart-plus"></i> Add Service
                    </button>
                </div>
            </div>
            
            <div class="box-body table-responsive no-padding">
                @if ( $serviceListCount > 0)
                
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Service Name</th>
                            <th>Price Range</th>
                            <th width="50%">Description</th>
                            <th></th>
                            <th>Created by</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($serviceList as $service_list)
                        <tr>
                            <td>{{ $service_list->id }}</td>
                            <td>{{ Str::upper($service_list->service_name) }}</td>
                            <td>{{ Str::upper($service_list->price_range) }}</td>
                            <td>{{ Str::upper($service_list->description) }}</td>
                            <td>
                                @if( $service_list->is_most_availed == true )
                                <span class="label label-success">Most Availed</span>
                                @endif
                            </td>
                            <td> <i> {{ $service_list->created_by }} </i> <br> <b> {{ \Carbon\Carbon::parse($service_list->created_at)->toDayDateTimeString() }} </b> </td>
                            <td>
                                <button class="btn btn-secondary btn-flat btn-sm" wire:click="editService({{ $service_list->id }})" data-toggle="modal" data-target="#addServiceModal" title="Edit">
                                    <i class="fa fa-pencil"></i>
                                </button> 
                            </td>
                            <td>
                                @if ( $deleteMode == false )
                                <button class="btn btn-danger btn-flat btn-sm" wire:click="setDeleteMode(true, {{ $service_list->id }})" title="Delete"><i class="fa fa-trash"></i></button>
                                @endif
                                
                                @if ( $deleteMode == true && $deleteModeFocusID == $service_list->id )
                                <button class="btn btn-danger btn-flat" wire:click="deleteService({{ $service_list->id }})" title="Delete"><i class="fa fa-trash"></i> Confirm Delete</button>
                                <button class="btn btn-warning btn-flat btn-sm" wire:click="$set('deleteMode', false)" title="Cancel"><i class="fa fa-close"></i></button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <h4 style="text-align: center;">No Service Found.</h4>
                @endif         
            </div>
            
            
        </div>
        
        <div style="text-align: center;">
            {{ $serviceList->links() }}
        </div>
        
    </div>
    
    <div class="modal fade" id="addServiceModal" tabindex="-1" role="dialog" aria-labelledby="addServiceModal" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">
                        @if($updateMode == true)
                        Update Service
                        @else
                        Add Service
                        @endif
                    </h4>
                </div>
                
                @if( $updateMode == true )
                <form class="intro_form" id="intro_form" wire:submit.prevent="updateService({{ $updateModeId }})" autocomplete="off">
                    @else
                    <form class="intro_form" id="intro_form" wire:submit.prevent="addService" autocomplete="off">
                        @endif
                        @csrf
                        
                        <div class="modal-body">
                            
                            @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                {!! Str::upper(session('success')) !!} 
                            </div>
                            @endif     
                            
                            <div class="form-group">
                                <label for="">Service Name</label>
                                <input class="form-control" type="text" placeholder="Acne Care Facial" name="serviceName" id="serviceName" required wire:model="serviceName" />
                            </div>
                            
                            <div class="form-group">
                                <label for="">Price Range</label>
                                <input class="form-control" type="text" placeholder="From PHP2000" name="priceRange" id="priceRange" required wire:model="priceRange" />
                            </div>
                            
                            <div class="form-group">
                                <label for="">Description {{ $serviceDescriptionCount }}/500 </label>
                                <textarea class="form-control" id="serviceDescription" name="serviceDescription" wire:model="serviceDescription" rows="5" maxlength="500"></textarea>
                            </div>
                            
                            @if( $mostAvailedCount < 6 || $isMostAvailed == true)
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" class="minimal" wire:model="isMostAvailed">
                                    Most Availed
                                </label>
                            </div>
                            @endif
                            
                            @if( $mostAvailedCount >= 6 && $isMostAvailed == false)
                            <p><i>Marked Services as Most Availed. Limit Reached</i></p>
                            @endif
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal">Close</button>
                            
                            <button class="btn btn-primary btn-flat" type="submit" name="submit" id="submit">
                                @if($updateMode == true)
                                Update Service
                                @else
                                Save Service
                                @endif
                            </button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
        
    </div>