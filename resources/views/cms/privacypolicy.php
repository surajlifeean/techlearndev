@extends('main')

@section('content')
        
    @php 

        $img=asset('images/banne-inner.jpg');
    @endphp
     <section class="banner-sleek" style="background-image:url({{$img}}); background-size: cover;">
      
        <div class="banner-text text-center">
           <div class="banner-container">
             <h3>About us</h3>
               
              <p>
               The interactive learning destination for aspiring and
experienced developers
              </p> 
               <div class="button-set">
                <a href="#" class="button-common-white button-common">Enroll Now</a>
               </div>
           </div> 
        </div>
       </section>
   
      <section class="about-section clearfix">
            <div class="container">
                    <div id="aboutTab">          
                    <ul class="resp-tabs-list about-tab">
                        <li>About </li>
                        <li>Privacy Policy</li>
                        <li>Terms of Use</li>
                        <li>FAQ</li>
                    </ul>
                        
                    <div class="resp-tabs-container about-tab">                                                        
                        <div>
                            <h3>What We Do</h3>

<p>Code School is an online learning destination for existing and aspiring developers that teaches through entertaining content. Each course is built around a creative theme and storyline so that it feels like you’re playing a game, not sitting in a classroom. We combine gaming mechanics with video instruction and in-browser coding challenges to make learning fun and memorable. With over 60 courses covering HTML/CSS, JavaScript, Ruby, Python, .NET, iOS, Git, databases, and more, Code School pairs experienced instructors with meticulously produced, high-quality content inspired by our community and network of members.</p>

<p>Over 5 million people around the world come to Code School to get started with a new technology and learn by doing.</p>


<h3>The Inspiration</h3>

<p>Coding skills have never been in higher demand, but traditional computer science courses are often costly, time consuming, and lack the flexibility many people demand. Meanwhile, technology is moving quicker than ever and to stay current, many developers must constantly be learning new skills outside of their day jobs. This has left room for new approaches to code education. <br>

In our opinion, the best way to learn is by doing. Code School opens the door to a new way of learning by combining high-quality video, in-browser coding, and gamification to make learning fun!</p>


<h3>Code School, a Pluralsight Company</h3>

<p>Code School is now a Pluralsight company. Pluralsight is the global leader in online learning for professional software developers, IT specialists, and creative technologists.
     <br>
Together, our goal is to democratize professional technology learning, making it more accessible to those around the world. As we grow, we will continue to seek those opportunities that will foster this cause and empower individuals and enterprises to truly embrace a culture of learning.</p>

<p>For press inquiries, please visit <a href="www.myschool.com/press">www.Myschool.com/press</a> or contact <a href="press@myschool.com">press@myschool.com</a>.</p>
                        </div>
       <!--                  <div> <h3>What is Lorem Ipsum</h3>?
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>

 </div> -->
      <!--                   <div> 
                        <h3>Why do we use it?</h3>
<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>

</div> -->
                        <!-- <div> 
                            <h3>Where can I get some?</h3>
<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>
                        </div> -->
                    </div>
                </div>  
            
            </div>
    
      </section>







@endsection