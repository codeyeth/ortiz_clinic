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
            Total of <b class="text-success" style="font-size: 120%;"> {{ $testimonialListCount }} </b> Result/s Found
        </div>
        
        <br>
        
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Client Testimonial Table</h3>
                <div class="box-tools">
                    <button class="btn btn-primary btn-flat btn-sm" type="button" name="submit_blog" id="submit_blog" title="Add Testimonial" data-toggle="modal" data-target="#createTestimonialModal" wire:click="resetContent">
                        <i class="fa fa-plus"></i> Add Testimonial
                    </button>
                </div>
            </div>
            
            <div class="box-body table-responsive no-padding">
                @if ( $testimonialListCount > 0)
                
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Client</th>
                            <th>Testimonial</th>
                            <th>Service Purchased</th>
                            <th>Status</th>
                            <th>Created at</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($testimonialList as $testimonial_list)
                        <tr>
                            <td>{{ $testimonial_list->id }}</td>
                            <td>{{ $testimonial_list->client_name }}</td>
                            <td>{{ $testimonial_list->testimonial }}</td>
                            <td>{{ $testimonial_list->service_purchased }}</td>
                            <td>
                                @if( $testimonial_list->is_published == true )
                                <span class="label label-success">Published</span>
                                @else
                                <span class="label label-danger">Hidden</span>
                                @endif
                            </td>
                            <td> <i> {{ $testimonial_list->created_by }} </i> <br> <b> {{ \Carbon\Carbon::parse($testimonial_list->created_at)->toDayDateTimeString() }} </b> </td>
                            <td>
                                <button class="btn btn-secondary btn-flat btn-sm" wire:click="editTestimonial({{ $testimonial_list->id }})" data-toggle="modal" data-target="#createTestimonialModal" title="Edit">
                                    <i class="fa fa-pencil"></i>
                                </button> 
                            </td>
                            <td>
                                @if ( $deleteMode == false )
                                <button class="btn btn-danger btn-flat btn-sm" wire:click="setDeleteMode(true, {{ $testimonial_list->id }})" title="Delete"><i class="fa fa-trash"></i></button>
                                @endif
                                @if ( $deleteMode == true && $deleteModeFocusID == $testimonial_list->id)
                                <button class="btn btn-danger btn-flat btn-sm" wire:click="deleteTestimonial({{ $testimonial_list->id }})" title="Delete"><i class="fa fa-trash"></i> Confirm Delete</button>
                                <button class="btn btn-warning btn-flat btn-sm" wire:click="$set('deleteMode', false)" title="Cancel"><i class="fa fa-close"></i></button>
                                @endif
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
        
        {{-- {{ $testimonialList->links() }} --}}
        
        <div style="text-align: center;">
            {{ $testimonialList->links() }}
        </div>
        
    </div>
    
    <div class="modal fade" id="createTestimonialModal" tabindex="-1" role="dialog" aria-labelledby="createTestimonialModal" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">
                        @if($updateMode == true)
                        Update Testimonial
                        @else
                        Add Testimonial
                        @endif
                    </h4>
                </div>
                
                @if( $updateMode == true )
                <form class="intro_form" id="intro_form" wire:submit.prevent="updateTestimonial({{ $updateModeId }})" autocomplete="off">
                    @else
                    <form class="intro_form" id="intro_form" wire:submit.prevent="submitTestimonial" autocomplete="off">
                        @endif
                        @csrf
                        
                        <div class="modal-body">
                            
                            @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                {!! Str::upper(session('success')) !!} 
                            </div>
                            @endif     
                            
                            <div class="form-group">
                                <label for="">Client</label>
                                <input class="form-control" type="text" placeholder="Juan Dela Cruz" name="client" id="client" required wire:model="clientName" />
                            </div>
                            
                            <div class="form-group">
                                <label for="">Testimonial {{ $testimonialScriptCount }}/200 </label>
                                <textarea class="form-control" id="description" name="description" wire:model="testimonialScript" rows="5" maxlength="200"></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label for="">Service Purchased</label>
                                <select class="form-control" wire:model="servicePurchased">
                                    <option disabled selected value="">Service</option>
                                    @if( count ($servicesList) > 0)
                                    @foreach( $servicesList as $services_list)
                                    <option value="{{ Str::upper($services_list->service_name) }}">{{ Str::upper($services_list->service_name) }}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" class="minimal" wire:model="isPublished">
                                    Publish to Website
                                </label>
                            </div>
                            
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal">Close</button>
                            
                            <button class="btn btn-primary btn-flat" type="submit" name="submit" id="submit">
                                @if($updateMode == true)
                                Update Testimonial
                                @else
                                Save Testimonial
                                @endif
                            </button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
        
    </div>