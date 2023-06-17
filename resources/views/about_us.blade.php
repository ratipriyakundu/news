<x-front_header :category="$category" :hasPermission="$hasPermission"/>
   <div class="vh-100">
       
        <div class="container" style="margin-top:12px;">
            <?php
            foreach($about as $abt){?>
            <p class="fw-bold h5"><?php echo $abt->title;?></p>
            <?php if($abt->image!=''){?>
                <p>
                <img src="uploads/about/{{$abt->image}}" style="width:100%;">
            </p>
                <?php }?>
               
                <p class="card-text" style="line-height: 28px; text-align: justify;">
                    
                {{ strip_tags($abt->content) }} 
                    </p>

                    <hr>
        <?php }?>
        </div>
           
<x-front_footer :menucategory="$menucategory"/>