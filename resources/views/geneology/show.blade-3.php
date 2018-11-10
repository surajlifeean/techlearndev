<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{Auth::user()->fname}}'s Geneology</title>

    <link rel="stylesheet" href="{{asset('css/hierarchy-view.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
</head>

<body>

    <!--Basic style-->    

    <!--Management Hierarchy-->
    <section class="management-hierarchy">
        <!-- 
        <h1> 1. Management Hierarchy</h1> -->
        <div class="hv-container">
            <div class="hv-wrapper">
<!-- {{dump($teamsize)}}
{{dump($leftsize)}}
{{dump($rightsize)}} -->

                <!-- Key component -->
                <div class="hv-item">

                    <div class="hv-item-parent">
                        <div class="person">
                            <img src="https://pbs.twimg.com/profile_images/762654833455366144/QqQhkuK5.jpg" alt="">
                            <p class="name">

                                {{$user[0]->username}} <b>/{{$user[0]->id}}</b>
                            </p>
                        </div>
                    </div>

                    <div class="hv-item-children">


                        @php
                                $values=App\Helpers::getChildren($user[0]->id)
                        @endphp

                        @if(count(App\Helpers::getChildren($user[0]->id))!=0)
                        <div class="hv-item-child">
                            <!-- Key component -->

                        @if($values[0]->side=='left')
                            @if(count(App\Helpers::getChildren($values[0]->id))==0)
                            <div class="person">
                                            <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="">
                                            <p class="name">
                                                <a href="{{route('my-geneology.show',$values[0]->id)}}">
                                                {{$values[0]->username}}<b>/ {{$values[0]->id}}</b>
                                            </a>
                                            </p>
                            </div>

                            @else 

                            <div class="hv-item">

                                <div class="hv-item-parent">
                                    <div class="person">
                                        <img src="https://randomuser.me/api/portraits/women/50.jpg" alt="">
                                        <p class="name">
                                            <a href="{{route('my-geneology.show',$values[0]->id)}}">
                                            {{$values[0]->username}}<b>/ {{$values[0]->id}}</b>
                                        </a>
                                        </p>
                                    </div>
                                </div>

                                <div class="hv-item-children">


                            @if(count(App\Helpers::getChildren($values[0]->id))==0)
                            <div class="person">
                                            <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="">
                                            <p class="name">
                                                <a href="{{route('my-geneology.show',$values[0]->id)}}">
                                                {{$values[0]->username}}<b>/ {{$values[0]->id}}</b>
                                            </a>
                                            </p>
                            </div>

                            @else
                                @php
                                    $values2=App\Helpers::getChildren($values[0]->id) 
                                @endphp

                                    <div class="hv-item-child">
                                        @if($values2[0]->side=='left')

                                        <div class="person">
                                            <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="">
                                            <p class="name">
                                                <a href="{{route('my-geneology.show',$values2[0]->id)}}">
                                                {{$values2[0]->username}} <b>/{{$values2[0]->id}}</b>
                                                </a>
                                            </p>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="hv-item-child">
                                        


                                            @if(count($values2)==2)
                                            <div class="person">
                                            <img src="https://randomuser.me/api/portraits/women/18.jpg" alt="">
                                            <p class="name">
                                                <a href="{{route('my-geneology.show',$values2[1]->id)}}">
                                                {{$values2[1]->username}} <b>/ {{$values2[1]->id}}</b>
                                               </a>

                                            </p>
                                            </div>
                                            @endif
                                            @if(count($values2)==1 && $values2[0]->side=='right')
                                            <div class="person">
                                            <img src="https://randomuser.me/api/portraits/women/18.jpg" alt="">
                                            <p class="name">
                                                <a href="{{route('my-geneology.show',$values2[1]->id)}}">
                                                {{$values2[1]->username}} <b>/ {{$values2[1]->id}}</b>
                                               </a>

                                            </p>
                                            </div>
                                            @endif


                                        
                                    </div>
                                    @endif
                                </div>

                            </div>
                            @endif
                        @else

                         <div class="person">
                            <img src="{{asset('images/addmore.png')}}" alt="">
                                        <p class="name">
                                            <a href="{{route('my-geneology.show',$values[0]->id)}}">
                                                <b> Add Member</b>
                                            </a>
                                        </p>
                         </div>

                        @endif
                        </div>  <!-- have item child -->




                        <div class="hv-item-child">

                            @if(count($values)==1)
                                @php $values[1]=$values[0]; @endphp


                            @endif

                            @if(count(App\Helpers::getChildren($values[1]->id))==0)
                                  @if($values[1]->side=='right')
                                    <div class="person">
                                        <img src="https://randomuser.me/api/portraits/men/3.jpg" alt="">
                                        <p class="name">
                                            <a href="{{route('my-geneology.show',$values[1]->id)}}">
                                            {{$values[1]->username}} <b>/{{$values[1]->id}}</b>
                                        </a>
                                        </p>
                                    </div>

                                @else

                               <div class="person">
                                  <img src="{{asset('images/addmore.png')}}" alt="">
                                        <p class="name">
                                            <a href="{{route('my-geneology.show',$values[0]->id)}}">
                                                <b> Add Member</b>
                                            </a>
                                        </p>
                                 </div>

                                    @endif
                                @else
                                
                                @php
                                    $values2=App\Helpers::getChildren($values[1]->id) 
                                @endphp

                                <div class="hv-item">
                                <div class="hv-item-parent">
                                    
                                    <div class="person">
                                        <img src="https://randomuser.me/api/portraits/women/50.jpg" alt="">
                                        <p class="name">
                                            <a href="{{route('my-geneology.show',$values[1]->id)}}">
                                            {{$values[1]->username}}<b>/ {{$values[1]->id}}</b>
                                        </a>
                                        </p>
                                    </div>

                                </div>

                                <div class="hv-item-children">
                                    <div class="hv-item-child">
                                        @if($values2[0]->side=='left')
                            
                                        <div class="person">
                                            <img src="https://randomuser.me/api/portraits/men/41.jpg" alt="">
                                            <p class="name">
                                                <a href="{{route('my-geneology.show',$values2[0]->id)}}">
                                                 {{$values2[0]->username}} <b>/ {{$values2[0]->id}}</b>
                                                </a>
                                            </p>
                                        </div>

                                        @endif

                                    </div>


                                    <div class="hv-item-child">
                                        <div class="person">

                                            <img src="https://randomuser.me/api/portraits/men/90.jpg" alt="">
                                                <p class="name">

                                            @if(count($values2)==2)
                                            <a href="{{route('my-geneology.show',$values2[1]->id)}}">
                                                {{$values2[1]->username}} <b>/ {{$values2[1]->id}}</b>
                                            </a>
                                            @else
                                            <a href="{{route('my-geneology.show',$values2[0]->id)}}">
                                                {{$values2[0]->username}} <b>/ {{$values2[0]->id}}</b>
                                            </a> 
                                            @endif
                                            
                                            </p>
                                            
                                        </div>
                                    </div>

                                </div>



                                @endif

                            </div>
                        </div> <!-- have item child 2 -->

                    </div> <!-- have item children -->



@endif


                </div> <!-- hav item ends -->

            </div>
      
        </div>

    </section>

</body>

</html>