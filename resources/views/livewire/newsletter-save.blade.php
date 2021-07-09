<div>
    <style>
        input { 
            text-transform: uppercase;
        }
    </style>
    
    @if(session('success'))
    <div class="alert alert-success" role="alert">
        {!! Str::upper(session('success')) !!} 
    </div>
    @endif
    
    @error('email')
    <div class="alert alert-danger" role="alert">
        {!! Str::upper($message) !!} 
    </div>

    @enderror  
    <div class="newsletter_form_container">
        <form class="newsletter_form" id="newsleter_form" wire:submit.prevent="submitEmail" autocomplete="off">
            <input type="email" class="newsletter_input" placeholder="Your E-mail" required="required" style="background-color:white; color: black; font-style: italic;" wire:model.defer="email">
            <button class="newsletter_button" type="submit" >subscribe</button>
        </form>
    </div>
</div>