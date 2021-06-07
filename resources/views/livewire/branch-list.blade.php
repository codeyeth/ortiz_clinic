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
            Total of <b class="text-success" style="font-size: 120%;"> {{ $branchListCount }} </b> Result/s Found
        </div>
        
        <br>
        
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Branches Table</h3>
                <div class="box-tools">
                    <button class="btn btn-primary btn-flat btn-sm" type="button" title="Add Branch" data-toggle="modal" data-target="#addBranchModal" wire:click="resetContent">
                        <i class="fa fa-institution"></i> Add Branch
                    </button>
                </div>
            </div>
            
            <div class="box-body table-responsive no-padding">
                @if ( $branchListCount > 0)
                
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Branch Name</th>
                            <th>Branch Address</th>
                            <th>Branch Contact</th>
                            <th>Created by</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($branchList as $branch_list)
                        <tr>
                            <td>{{ $branch_list->id }}</td>
                            <td>{{ Str::upper($branch_list->branch_name) }} 
                                @if( $branch_list->is_main_office == true )
                                <span class="label label-success">Main Office</span>
                                @endif
                            </td>
                            <td>{{ Str::upper($branch_list->branch_address) }}</td>
                            <td>
                                @foreach( $branchContactsList as $contact_list)
                                @if( $contact_list->branch_id ==  $branch_list->branch_contact )
                                <li>{{ $contact_list->contact_number }}</li>
                                @endif
                                @endforeach
                            </td>
                            <td> <i> {{ $branch_list->created_by }} </i> <br> <b> {{ \Carbon\Carbon::parse($branch_list->created_at)->toDayDateTimeString() }} </b> </td>
                            <td>
                                <button class="btn btn-secondary btn-flat btn-sm" wire:click="editBranch({{ $branch_list->id }})" data-toggle="modal" data-target="#addBranchModal" title="Edit">
                                    <i class="fa fa-pencil"></i>
                                </button> 
                            </td>
                            <td>
                                @if ( $deleteMode == false )
                                <button class="btn btn-danger btn-flat btn-sm" wire:click="setDeleteMode(true, {{ $branch_list->id }})" title="Delete"><i class="fa fa-trash"></i></button>
                                @endif
                                
                                @if ( $deleteMode == true && $deleteModeFocusID == $branch_list->id )
                                <button class="btn btn-danger btn-flat btn-sm" wire:click="deleteBranch({{ $branch_list->id }})" title="Delete"><i class="fa fa-check"></i> Confirm Delete</button>
                                <button class="btn btn-warning btn-flat btn-sm" wire:click="$set('deleteMode', false)" title="Cancel"><i class="fa fa-close"></i></button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <h4 style="text-align: center;">No Branch Found.</h4>
                @endif         
            </div>
            
            
        </div>
        
        <div style="text-align: center;">
            {{ $branchList->links() }}
        </div>
        
    </div>
    
    <div class="modal fade" id="addBranchModal" tabindex="-1" role="dialog" aria-labelledby="addBranchModal" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">
                        @if($updateMode == true)
                        Update Branch
                        @else
                        Add Branch
                        @endif
                    </h4>
                </div>
                
                @if( $updateMode == true )
                <form class="intro_form" id="intro_form" wire:submit.prevent="updateBranch({{ $updateModeId }})" autocomplete="off">
                    @else
                    <form class="intro_form" id="intro_form" wire:submit.prevent="addBranch" autocomplete="off">
                        @endif
                        @csrf
                        
                        <div class="modal-body">
                            
                            @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                {!! Str::upper(session('success')) !!} 
                            </div>
                            @endif     
                            
                            <div class="form-group">
                                <label for="">Branch Name</label>
                                <input class="form-control" type="text" placeholder="Mall of Asia" name="branchName" id="branchName" required wire:model="branchName" />
                            </div>
                            
                            <div class="form-group">
                                <label for="">Branch Address {{ $branchAddressCount }}/200 </label>
                                <textarea class="form-control" id="branchAddress" name="branchAddress" wire:model="branchAddress" rows="5" maxlength="200"></textarea>
                            </div>
                            
                            @if( $hasMainOffice == false || $isMainOffice == true )
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" class="minimal" wire:model="isMainOffice">
                                    Main Office
                                </label>
                            </div>
                            @endif
                            
                            <div class="form-group">
                                <label for="">Contacts</label>
                                
                                @if($updateMode == true)
                                <button type="button" class="btn btn-primary btn-flat btn-block" wire:click="addUpdateContactNumber"><i class="fa fa-plus"></i></button>
                                @else
                                <button type="button" class="btn btn-primary btn-flat btn-block" wire:click="addContactNumber"><i class="fa fa-plus"></i></button>
                                @endif
                                
                                <table class="table table-striped table-bordered">
                                    @foreach($branchContactArray as $index => $branch_array)
                                    <tr>
                                        <td>
                                            <input class="form-control" type="text" placeholder="09XXXXXXXXX" name="contactNo_{{ $index }}" id="contactNo_{{ $index }}" required wire:model="branchContactArray.{{ $index }}.contactNumber" />
                                        </td>
                                        <td>
                                            @if( $branch_array['id'] == '0000' )
                                            <button type="button" class="btn btn-danger btn-flat btn-block" wire:click="removeContactNumber({{ $index }})"><i class="fa fa-minus"></i></button>
                                            @else
                                            <button type="button" class="btn btn-danger btn-flat btn-block" wire:click="deleteContactNumber({{ $branch_array['id'] }})"><i class="fa fa-trash"></i> Delete</button>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                                
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal">Close</button>
                            
                            <button class="btn btn-primary btn-flat" type="submit" name="submit" id="submit">
                                @if($updateMode == true)
                                Update Branch
                                @else
                                Save Branch
                                @endif
                            </button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>