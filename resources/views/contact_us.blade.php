<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    .form-control{
        margin-bottom: 18px;

    }
    </style>
<x-front_header :category="$category" :hasPermission="$hasPermission"/>
   <div class="vh-100">
       
        <div class="container" style="margin-top:20px;">
           <div class="col-md-12">
           <p class="fw-bold h3">Contact Us</p>
           
           <hr>
           <p class="fw-bold h4">Send Us a Message</p>
            <div class="row" style="margin-top:30px;">
            
            <div class="col-md-6">
            <form method="post">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Name" required>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="mobile" placeholder="Mobile" required>
                </div>

                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                </div>


                <div class="form-group">
                    <textarea name="message" class="form-control" requied placeholder="Message" style="height: 175px;"></textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>


                <div class="col-md-6">
                <p class="fw-bold h3">Contact information</p>
                <p class="fw-bold">{{$contact->address}}</p>
                <br>
                <p class="fw-bold h4"> We're Available 24/ 7. Call Now.</p>
                <p><i class="fa fa-phone" aria-hidden="true"></i> {{$contact->contact_1}}</p>
                <br>
                <p><i class="fa fa-building" aria-hidden="true"></i> {{$contact->contact_2}}</p>
                
                </div>
</div>
            
</div>
        <div class="col-md-12">
            <hr>
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d11880.492291371422!2d12.4922309!3d41.8902102!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x28f1c82e908503c4!2sColosseo!5e0!3m2!1sit!2sit!4v1524815927977" width="100%" height="320" frameborder="0" style="border:0" allowfullscreen></iframe>      
</div>

                  
        
        
</div>
           
<x-front_footer :menucategory="$menucategory"/>