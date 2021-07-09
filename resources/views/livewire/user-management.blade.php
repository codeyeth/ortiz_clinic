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
                <input type="text" placeholder="Search" class="form-control input-lg" id="search" wire:model.defer="search" wire:keydown.escape="$set('search', '')" autofocus> 
                <span class="input-group-btn">
                    <button type="reset" class="btn btn-warning btn-flat btn-lg" wire:click="$set('search', '')">
                        Clear
                    </button>
                </span>
            </div>
            Total of <b class="text-success" style="font-size: 120%;"> {{ $userListCount }} </b> Result/s Found
        </div>
        
        <br>
        
        <div class="box">
            
            <div class="box-header">
                <h3 class="box-title">Users</h3>
                <div class="box-tools">
                    <button class="btn btn-primary btn-flat btn-sm" type="button" title="Add User" data-toggle="modal" data-target="#addUserModal" wire:click="resetContent">
                        <i class="fa fa-user"></i> Add User
                    </button>
                </div>
            </div>
            
            <div class="box-body table-responsive no-padding">
                @if ( $userListCount > 0)
                
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Branch</th>
                            <th>Created by</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($userList as $user_list)
                        <tr>
                            <td>{{ $user_list->id }}</td>
                            <td>
                                {{ Str::upper($user_list->name) }}
                                @if( $user_list->is_admin == true )
                                <span class="label label-primary">Administrator</span>
                                @endif
                            </td>
                            <td>{{ Str::upper($user_list->email) }}</td>
                            <td>{{ Str::upper($user_list->branch) }}</td>
                            {{-- <td>{{ Str::upper($user_list->created_by) }} at {{ \Carbon\Carbon::parse($user_list->created_at)->toDayDateTimeString() }} </td> --}}
                            
                            <td> <i> {{ $user_list->created_by }} </i> at <b> {{ \Carbon\Carbon::parse($user_list->created_at)->toDayDateTimeString() }} </b> </td>
                            <td>
                                <button class="btn btn-secondary btn-flat btn-sm" wire:click="editUser({{ $user_list->id }})" data-toggle="modal" data-target="#addUserModal" title="Edit">
                                    <i class="fa fa-pencil"></i>
                                </button> 
                            </td>
                            <td>
                                @if ( $deleteMode == false )
                                <button class="btn btn-danger btn-flat btn-sm" wire:click="setDeleteMode(true, {{ $user_list->id }})" title="Delete"><i class="fa fa-trash"></i></button>
                                @endif
                                
                                @if ( $deleteMode == true && $deleteModeFocusID == $user_list->id )
                                <button class="btn btn-danger btn-flat" wire:click="deleteUser({{ $user_list->id }})" title="Delete"><i class="fa fa-trash"></i> Confirm Delete</button>
                                <button class="btn btn-warning btn-flat btn-sm" wire:click="$set('deleteMode', false)" title="Cancel"><i class="fa fa-close"></i></button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <h4 style="text-align: center;">No User/s Found.</h4>
                @endif         
            </div>
            
        </div>
        
        <div style="text-align: center;">
            {{ $userList->links() }}
        </div>
        
        
        <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModal" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">
                            @if($updateMode == true)
                            Update User
                            @else
                            Add User
                            @endif
                        </h4>
                    </div>
                    
                    @if( $updateMode == true )
                    <form class="intro_form" id="intro_form" wire:submit.prevent="updateUser({{ $updateModeId }})" autocomplete="off">
                        @else
                        <form class="intro_form" id="intro_form" wire:submit.prevent="addUser" autocomplete="off">
                            @endif
                            @csrf
                            
                            <div class="modal-body">
                                
                                @if(session('success'))
                                <div class="alert alert-success" role="alert">
                                    {!! Str::upper(session('success')) !!} 
                                </div>
                                @endif     
                                
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input class="form-control" type="text" placeholder="Juan Dela Cruz" name="userName" id="userName" required wire:model.defer="userName" />
                                </div>
                                
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input class="form-control" type="text" placeholder="juan@gmail.com" name="userEmail" id="userEmail" required wire:model.defer="userEmail" />
                                </div>
                                
                                <div class="form-group">
                                    <label for="">Branch</label>
                                    <select class="form-control" wire:model="userBranch">
                                        <option disabled selected value="">Select Branch</option>
                                        @if( count ($branchList) > 0)
                                        @foreach( $branchList as $branch_list)
                                        <option value="{{ Str::upper($branch_list->branch_name) }}">{{ Str::upper($branch_list->branch_name) }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                                
                                @if( Auth::user()->is_admin == true )
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" class="minimal" wire:model.defer="isAdmin">
                                        Administrator
                                    </label>
                                </div>
                                @endif
                                
                            </div>
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal">Close</button>
                                
                                <button class="btn btn-primary btn-flat" type="submit" name="submit" id="submit">
                                    @if($updateMode == true)
                                    Update User
                                    @else
                                    Save User
                                    @endif
                                </button>
                                
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
            
            
            
        </div>
    </div>  