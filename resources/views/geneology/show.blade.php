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

                <!-- Key component -->
                <div class="hv-item">

                    <div class="hv-item-parent">
                        <div class="person">
                            <img src="https://pbs.twimg.com/profile_images/762654833455366144/QqQhkuK5.jpg" alt="">
                            <p class="name">
                                Ziko Sichi <b>/ CEO</b>
                            </p>
                        </div>
                    </div>

                    <div class="hv-item-children">

                        <div class="hv-item-child">
                            <!-- Key component -->

                            @php
                                    $values=App\Helpers::getChildren(1003)
                            @endphp

                            @if(count(App\Helpers::getChildren($values[0]->id))==0)
                            <div class="person">
                                            <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="">
                                            <p class="name">
                                                {{$values[0]->username}}<b>/ {{$values[0]->id}}</b>
                                            </p>
                            </div>

                            @else 

                            <div class="hv-item">

                                <div class="hv-item-parent">
                                    <div class="person">
                                        <img src="https://randomuser.me/api/portraits/women/50.jpg" alt="">
                                        <p class="name">
                                            {{$values[0]->username}}<b>/ {{$values[0]->id}}</b>
                                        </p>
                                    </div>
                                </div>

                                <div class="hv-item-children">


                            @if(count(App\Helpers::getChildren($values[0]->id))==0)
                            <div class="person">
                                            <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="">
                                            <p class="name">
                                                {{$values[0]->username}}<b>/ {{$values[0]->id}}</b>
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
                                                
                                                {{$values2[0]->username}} <b>/ {{$values2[0]->id}}</b>
                                                
                                            </p>
                                        </div>
                                        @endif


                                    </div>
                                    <div class="hv-item-child">
                                        
                                        <div class="person">
                                            <img src="https://randomuser.me/api/portraits/women/18.jpg" alt="">
                                            <p class="name">
                                            @if(count($values2)==2)
                                            
                                                {{$values2[1]->username}} <b>/ {{$values2[1]->id}}</b>
                                            @else
                                                {{$values2[0]->username}} <b>/ {{$values2[0]->id}}</b>
                                            @endif
                                                
                                            </p>
                                        </div>
                                        
                                    </div>
                                    @endif
                                </div>

                            </div>
                            @endif
                        </div>  <!-- have item child -->


                        <div class="hv-item-child">


                            @if(count(App\Helpers::getChildren($values[1]->id))==0)

                                <div class="hv-item-parent">
                                    <div class="person">
                                        <img src="https://randomuser.me/api/portraits/men/3.jpg" alt="">
                                        <p class="name">
                                            {{$values[1]->username}} <b>/ {{$values[1]->id}}</b>
                                        </p>
                                    </div>
                                </div>
                                @else
                                
                                @php
                                    $values2=App\Helpers::getChildren($values[1]->id) 
                                @endphp

                                <div class="hv-item">
                                <div class="hv-item-parent">
                                    
                                    <div class="person">
                                        <img src="https://randomuser.me/api/portraits/women/50.jpg" alt="">
                                        <p class="name">
                                            {{$values[1]->username}}<b>/ {{$values[1]->id}}</b>
                                        </p>
                                    </div>

                                </div>

                                <div class="hv-item-children">
                                    <div class="hv-item-child">
                                        @if($values2[0]->side=='left')
                            
                                        <div class="person">
                                            <img src="https://randomuser.me/api/portraits/men/41.jpg" alt="">
                                            <p class="name">
                                            {{$values2[0]->username}} <b>/ {{$values2[0]->id}}</b>
                                                
                                            </p>
                                        </div>

                                        @endif

                                    </div>


                                    <div class="hv-item-child">
                                        <div class="person">
                                            <img src="https://randomuser.me/api/portraits/men/90.jpg" alt="">
                                            <p class="name">
                                            @if(count($values2)==2)

                                                {{$values2[1]->username}} <b>/ {{$values2[1]->id}}</b>
                                            @else
                                                {{$values2[0]->username}} <b>/ {{$values2[0]->id}}</b>
                                                
                                            @endif 
                                            </p>
                                        </div>
                                    </div>

                                </div>
                                @endif

                            </div>
                        </div> <!-- have item child 2 -->

                    </div> <!-- have item children -->


                </div> <!-- hav item ends -->

            </div>
      
        </div>

    </section>

</body>

</html>