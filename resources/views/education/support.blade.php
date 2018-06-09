@extends('main')

@section('stylesheets')

<style>
input[type="checkbox"], input[type="radio"]{
    position: absolute;
    right: 9000px;
}

/*Check box*/
input[type="checkbox"] + .label-text:before{
    content: "\f096";
    font-family: "FontAwesome";
    speak: none;
    font-style: normal;
    font-weight: normal;
    font-variant: normal;
    text-transform: none;
    line-height: 1;
    -webkit-font-smoothing:antialiased;
    width: 1em;
    display: inline-block;
    margin-right: 5px;
}

input[type="checkbox"]:checked + .label-text:before{
    content: "\f14a";
    color: #1040a3;
    animation: effect 250ms ease-in;
}

input[type="checkbox"]:disabled + .label-text{
    color: #aaa;
}

input[type="checkbox"]:disabled + .label-text:before{
    content: "\f0c8";
    color: #ccc;
}

/*Radio box*/

input[type="radio"] + .label-text:before{
    content: "\f10c";
    font-family: "FontAwesome";
    speak: none;
    font-style: normal;
    font-weight: normal;
    font-variant: normal;
    text-transform: none;
    line-height: 1;
    -webkit-font-smoothing:antialiased;
    width: 1em;
    display: inline-block;
    margin-right: 5px;
}

input[type="radio"]:checked + .label-text:before{
    content: "\f192";
    color: #1040a3;
    animation: effect 250ms ease-in;
}

input[type="radio"]:disabled + .label-text{
    color: #aaa;
}

input[type="radio"]:disabled + .label-text:before{
    content: "\f111";
    color: #ccc;
}

/*Radio Toggle*/

.toggle input[type="radio"] + .label-text:before{
    content: "\f204";
    font-family: "FontAwesome";
    speak: none;
    font-style: normal;
    font-weight: normal;
    font-variant: normal;
    text-transform: none;
    line-height: 1;
    -webkit-font-smoothing:antialiased;
    width: 1em;
    display: inline-block;
    margin-right: 10px;
}

.toggle input[type="radio"]:checked + .label-text:before{
    content: "\f205";
    color: #16a085;
    animation: effect 250ms ease-in;
}

.toggle input[type="radio"]:disabled + .label-text{
    color: #aaa;
}

.toggle input[type="radio"]:disabled + .label-text:before{
    content: "\f204";
    color: #ccc;
}


@keyframes effect{
    0%{transform: scale(0);}
    25%{transform: scale(1.3);}
    75%{transform: scale(1.4);}
    100%{transform: scale(1);}
}


</style>


@endsection

@section('content')




    <div class="register-wrapper text-center">
        <div class="container">
            <h1>Techlearn Support</h1>
            
            
            
            
                <div class="form-wrapper text-left">
                <div class="screen-reader text-center">
                    <h5>Write to us for any query. We feel happy to help</h5>
                </div>
                
                
                <div class="row justify-content-center">
                    <div class="col-md-8 col-sm-6">
                    <form action="{{route('support.store')}}" method="post" data-parsley-validate>
                    {{ csrf_field() }}

                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Subject</label>
                                      {{Form::select('subject',$support,null,['class'=>'form-control'])}}
                                </div>
                            </div>
  
                        </div>
                        <div class="form-row">
                            
                            <div class="col-md-12">
                              <div class="form-group">
                                    <label for="">Details</label>
                                      {{Form::textarea('details',null,['class'=>'form-control','size' => '50x5'])}}
                              </div>    
                            </div>  
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Name</label>
                                            <input type="text" name="name" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="tel" name="contact_no"  class="form-control" required>
                              </div>    
                            </div>  
                        </div>
                   
                        <div class="buttonset text-center">
                         <button type="submit" class="button-common">Submit</button>
                        
                        </div>
                        
                        </form> 
                    </div>  
                    
                </div>
            
            </div>
        
        </div>
    
    </div>
@endsection
@section('scripts')

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCgQChjhrquG2nKA5pY0BdsevcKRjUDiEE&libraries=places"></script>

<script type="text/javascript">
 function initAutocomplete() {
          // Create the autocomplete object, restricting the search to geographical
          // location types.
          autocomplete = new google.maps.places.Autocomplete(
              /** @type {!HTMLInputElement} */(document.getElementById('address')),
              {types: ['geocode']});
    
          // When the user selects an address from the dropdown, populate the address
          // fields in the form.
          //autocomplete.addListener('place_changed', fillInAddress);
          autocomplete.addListener("place_changed", function(){
              //fillInAddress(id);                
          })
    }
</script>

@endsection