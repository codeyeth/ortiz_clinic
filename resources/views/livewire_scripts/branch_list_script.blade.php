<script>
    //APPOINTMENT SUCCESS CLOSE THE ALERT IN 3 SECONDS
    Livewire.on('branchSuccess', e => {
      setTimeout(function(){ 
        $(".alert").alert('close')
      }, 3000);
    })
  </script>