<div>
    <div class="col-lg-2 col-xs-6" >
        <div class="small-box bg-primary" style="border: 1px dashed gray;">
            <div class="inner">
                <h3>{{ $appointmentCount }}</h3>
                
                <p>Total Appointments</p>
                <br>
                <table class="table">
                    <tr>
                        <td align="right">Confirmed Appointments:</td>
                        <td align="right"><b>{{ $appointmentConfirmed }}</b></td>
                    </tr>
                    <tr>
                        <td align="right">Pending Appointments:</td>
                        <td align="right"><b>{{ $appointmentPending }}</b></td>
                    </tr>   
                    <tr>
                        <td align="right">Done Appointments:</td>
                        <td align="right"><b>{{ $appointmentDone }}</b></td>
                    </tr>
                </table>
            </div>
            <div class="icon">
                <i class="ion ion-person"></i>
            </div>
            <a href="{{ asset ('/appointment_list') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    
    <div class="col-lg-2 col-xs-6">
        <div class="small-box bg-green">
            <div class="inner">
                <h3>{{ $branchCount }}</h3>
                
                <p>Branches</p>
                <br>
                <table class="table">
                    <tr>
                        <td align="right">Complete Details</td>
                        <td align="right"><b>{{ $branchComplete }}</b></td>
                    </tr>
                    <tr>
                        <td align="right">Incomplete Details:</td>
                        <td align="right"><b>{{ $branchIncomplete }}</b></td>
                    </tr>
                </table> 
                
            </div>
            <div class="icon">
                <i class="ion ion-home"></i>
            </div>
            <a href="{{ asset ('/branch') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    
    <div class="col-lg-2 col-xs-6">
        <div class="small-box bg-primary">
            <div class="inner">
                <h3>{{ $servicesCount }}</h3>
                
                <p>Services</p>
                <br>
                <table class="table">
                    <tr>
                        <td align="right">Complete Details</td>
                        <td align="right"><b>{{ $servicesComplete }}</b></td>
                    </tr>
                    <tr>
                        <td align="right">Incomplete Details:</td>
                        <td align="right"><b>{{ $servicesIncomplete }}</b></td>
                    </tr>
                </table> 
            </div>
            <div class="icon">
                <i class="ion ion-woman"></i>
            </div>
            <a href="{{ asset ('/services_list') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    
    <div class="col-lg-2 col-xs-6">
        <div class="small-box bg-red">
            <div class="inner">
                <h3>{{ $testimonialCount }}</h3>
                
                <p>Client Testimonials</p>
                <br>
                <table class="table">
                    <tr>
                        <td align="right">Posted/Visible:</td>
                        <td align="right"><b>{{ $testimonialPosted }}</b></td>
                    </tr>
                    <tr>
                        <td align="right">Hidden:</td>
                        <td align="right"><b>{{ $testimonialHidden }}</b></td>
                    </tr>
                </table>
            </div>
            <div class="icon">
                <i class="ion ion-document-text"></i>
            </div>
            <a href="{{ asset ('/client_testimonial') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    
</div>