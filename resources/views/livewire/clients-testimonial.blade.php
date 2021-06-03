<div>
    <div class="col-md-6">
        <div class="box box-default">
            
            <div class="box-body">
                
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
                
                @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {!! Str::upper(session('success')) !!} 
                    {{-- This is a primary alert—check it out! --}}
                </div>
                @endif
                
                <form class="intro_form" id="intro_form" wire:submit.prevent="submitTestimonial" autocomplete="off">
                    @csrf
                    
                    <div class="form-group">
                        <label for="">Client</label>
                        <input class="form-control" type="text" placeholder="Juan Dela Cruz" name="client" id="client" required wire:model="clientName" />
                    </div>
                    
                    <div class="form-group">
                        <label for="">Testimonial {{ $testimonialScriptCount }}/200 </label>
                        <textarea class="form-control" id="description" name="description" wire:model="testimonialScript"></textarea>
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
                    
                    <button class="btn btn-primary" type="submit" name="submit_blog" id="submit_blog">Save Testimonial</button>
                    
                </form>
                
            </div>
        </div>
    </div>
</div>