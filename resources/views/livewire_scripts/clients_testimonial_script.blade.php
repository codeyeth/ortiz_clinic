<script>
    //APPOINTMENT SUCCESS CLOSE THE ALERT IN 3 SECONDS
    Livewire.on('testimonialSuccess', e => {
        setTimeout(function(){ 
            $(".alert").alert('close')
        }, 3000);
    })
</script>