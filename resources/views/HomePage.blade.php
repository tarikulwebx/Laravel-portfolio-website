@extends('layouts.home-master')

@section('title', 'Tarikul24 | Home')

@section('content')


    <!-- Home Page Intro: START -->
    <div class="home-page-intro" style="background-image: url('{{ asset('images/hero-bg.jpg') }}'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
        <div class="mask rgba-gradient align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 mb-5 mb-md-0 text-left align-self-center white-text">
                        <h3 class="greeting h3-responsive " >Hi, I'm {{ $about->name }}</h3>
                        <h5 class="profession h6-responsive font-weight-normal  text-capitalize"  >{{ $about->profession }}</h5>
                        <hr class="hr-bold hr-light">
                        <p class=" font-weight-light">{{ $about->short_description }}</p>
                        <div class="">
                            <a href="tel:{{ $about->phone }}" class="contact-btn btn btn-amber"><i class="fas fa-phone mr-2"></i>Contact</a>
                            <a href="{{ $about->cv_link }}" class="btn btn-outline-white"><i class="fas fa-download mr-2"></i><span class="d-none d-lg-inline-block">Download</span> CV</a>
                        </div>
                    </div>
                    <div class="col-md-6 mb-5 mb-md-0 align-self-center">
                        <div id="intro-coverflow">
                            <ul class="flip-items">

                                @if (count($slides))
                                    @foreach ($slides as $slide)
                                        <li data-flip-title="{{ $slide->caption }}">
                                            <img src="{{ $slide->photo }}" alt="">
                                        </li>
                                    @endforeach
                                @endif

                                
                            
                            </ul>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Home Page Intro: END -->


    <!-- About Section: START -->
    <section class="section about-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 gx-5 mb-4">
                    <img class="img-fluid img-rendering "  src="{{ $about->cover_photo }}"
                        alt="">
                </div>

                <div class="col-md-6 gx-5 mb-4" >
                    <h3>About Me</h3>
                    <div>
                        {!! $about->more_description !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section: END -->


    <!-- About Section: START -->
    <section class="section skills section-bg">
        <div class="container">
            <div class="section-head text-center">
                <h1 class="section-title">My Skills</h1>
                <p class="section-subtitle">Checkout development tech skills</p>
                <hr class="wow zoomIn">
            </div>
            <div class="row">
                @if (count($skills) > 0)
                    @foreach ($skills as $skill)
                    <div class="col-md-6">
                        <h5>{{ $skill->name }}</h5>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {{ $skill->progress }}%;" aria-valuenow="{{ $skill->progress }}" aria-valuemin="0" aria-valuemax="100">{{ $skill->progress }}%</div>
                        </div>
                    </div>
                    @endforeach
                @endif
                
            </div>
        </div>
    </section>
    <!-- About Section: END -->



    <!-- Services Section: START -->
    <section id="services" class="section services">
        <div class="container">
            <div class="section-head text-center">
                <h1 class="section-title">Services</h1>
                <p class="section-subtitle">Services I offer to my clients</p>
                <hr class="wow zoomIn" data-wow-delay=".4s">
            </div>

            <div class="row">

                @if (count($services) > 0)
                    @foreach ($services as $service)
                        <!-- Service Item: START -->
                        <div class="col-sm-12 col-md-6 col-xl-3 service-item">
                            <div class="card text-center align-items-center hoverable h-100" >
                                <img class="service-image img-rendering" src="{{ $service->thumbnail }}" alt="Card image cap">
                                <h4 class="service-name">{{ $service->name }}</h4>
                                <p class="service-description text-muted">{{ $service->description }}</p>
                            </div>
                        </div>
                        <!-- Service Item: END -->
                    @endforeach
                @endif

            </div>
        </div>
    </section>
    <!-- Services Section: END -->




    <!-- Courses Section: START -->
    <section id="courses" class="section courses d-none">
        <div class="container">
            <div class="section-head text-center">
                <h1 class="section-title">Courses</h1>
                <p class="section-subtitle">Courses I offer for learners</p>
                <hr class="wow zoomIn" data-wow-delay=".4s">
            </div>

            <div class="row">

                <!-- Course Item: START -->
                <div class="col-sm-12 col-md-6 col-lg-4 course-item">
                    <div class="card hoverable h-100 " >
                        <img class="card-img-top" src="https://picsum.photos/400/200" alt="Card image cap">
                        <div class="card-body d-flex flex-column">
                            <h4 class="card-title">Laravel Full Stack</h4>
                            <h5 class="course-fee">Course fee: 3200 &#2547;</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                                the card's content.</p>
                            <div class="course-info mt-auto">
                                <span><i class="fas fa-video    "></i> 245 lectures</span>
                                <span><i class="fas fa-users    "></i> 1234 learners</span>
                            </div>
                            <a href="#" class="btn btn-light-green btn-block btn-md">Enroll</a>
                        </div>
                    </div>
                </div>
                <!-- Course Item: END -->

                <!-- Course Item: START -->
                <div class="col-sm-12 col-md-6 col-lg-4 course-item">
                    <div class="card hoverable h-100 " >
                        <img class="card-img-top" src="https://picsum.photos/400/200" alt="Card image cap">
                        <div class="card-body d-flex flex-column">
                            <h4 class="card-title">Laravel Full Stack</h4>
                            <h5 class="course-fee">Course fee: 3200 &#2547;</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                                the card's content.</p>
                            <div class="course-info mt-auto">
                                <span><i class="fas fa-video    "></i> 245 lectures</span>
                                <span><i class="fas fa-users    "></i> 1234 learners</span>
                            </div>
                            <a href="#" class="btn btn-light-green btn-block btn-md">Enroll</a>
                        </div>
                    </div>
                </div>
                <!-- Course Item: END -->

                <!-- Course Item: START -->
                <div class="col-sm-12 col-md-6 col-lg-4 course-item">
                    <div class="card hoverable h-100 " >
                        <img class="card-img-top" src="https://picsum.photos/400/200" alt="Card image cap">
                        <div class="card-body d-flex flex-column">
                            <h4 class="card-title">Laravel Full Stack</h4>
                            <h5 class="course-fee">Course fee: 3200 &#2547;</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                                the card's content.</p>
                            <div class="course-info mt-auto">
                                <span><i class="fas fa-video    "></i> 245 lectures</span>
                                <span><i class="fas fa-users    "></i> 1234 learners</span>
                            </div>
                            <a href="#" class="btn btn-light-green btn-block btn-md">Enroll</a>
                        </div>
                    </div>
                </div>
                <!-- Course Item: END -->

                <!-- Course Item: START -->
                <div class="col-sm-12 col-md-6 col-lg-4 course-item">
                    <div class="card hoverable h-100 " >
                        <img class="card-img-top" src="https://picsum.photos/400/200" alt="Card image cap">
                        <div class="card-body d-flex flex-column">
                            <h4 class="card-title">Laravel Full Stack</h4>
                            <h5 class="course-fee">Course fee: 3200 &#2547;</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                                the card's content.</p>
                            <div class="course-info mt-auto">
                                <span><i class="fas fa-video    "></i> 245 lectures</span>
                                <span><i class="fas fa-users    "></i> 1234 learners</span>
                            </div>
                            <a href="#" class="btn btn-light-green btn-block btn-md">Enroll</a>
                        </div>
                    </div>
                </div>
                <!-- Course Item: END -->

                <!-- Course Item: START -->
                <div class="col-sm-12 col-md-6 col-lg-4 course-item">
                    <div class="card hoverable h-100 " >
                        <img class="card-img-top" src="https://picsum.photos/400/200" alt="Card image cap">
                        <div class="card-body d-flex flex-column">
                            <h4 class="card-title">Laravel Full Stack</h4>
                            <h5 class="course-fee">Course fee: 3200 &#2547;</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                                the card's content.</p>
                            <div class="course-info mt-auto">
                                <span><i class="fas fa-video    "></i> 245 lectures</span>
                                <span><i class="fas fa-users    "></i> 1234 learners</span>
                            </div>
                            <a href="#" class="btn btn-light-green btn-block btn-md">Enroll</a>
                        </div>
                    </div>
                </div>
                <!-- Course Item: END -->

                <!-- Course Item: START -->
                <div class="col-sm-12 col-md-6 col-lg-4 course-item">
                    <div class="card hoverable h-100 " >
                        <img class="card-img-top" src="https://picsum.photos/400/200" alt="Card image cap">
                        <div class="card-body d-flex flex-column">
                            <h4 class="card-title">Laravel Full Stack</h4>
                            <h5 class="course-fee">Course fee: 3200 &#2547;</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                                the card's content.</p>
                            <div class="course-info mt-auto">
                                <span><i class="fas fa-video    "></i> 245 lectures</span>
                                <span><i class="fas fa-users    "></i> 1234 learners</span>
                            </div>
                            <a href="#" class="btn btn-light-green btn-block btn-md">Enroll</a>
                        </div>
                    </div>
                </div>
                <!-- Course Item: END -->





            </div>

        </div>
    </section>
    <!-- Courses Section: END -->



    <!-- Projects: START -->
    <section id="projects" class="section projects section-bg">
        <div class="container">
            <div class="section-head text-center">
                <h1 class="section-title">Projects</h1>
                <p class="section-subtitle">Showcasing some of my works</p>
                <hr class="wow zoomIn">
            </div>

            <div class="row">

                @if ($projects)
                    @foreach ($projects as $project)
                        <!-- Project Item: START -->
                        <div class="col-sm-12 col-md-6 col-lg-4 project-item">
                            <div class="card card-flip h-100" >
                                <div class="card-front text-white bg-dark">
                                    <img class="w-100" src="{{ $project->thumbnail }}" alt="">
                                </div>
                                <div class="card-back bg-white">
                                    <div class="card-body text-center text-white">
                                        <h3 class="card-title mb-1">{{ $project->title }}</h3>
                                        <h5 class="project-type mb-3">{{ $project->category }}</h5>
                                        <p class="card-text">{{ $project->description }}</p>
                                        <a href="{{ $project->link }}" target="_blank" class="btn btn-outline-white btn-md">Visit Project</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Project Item: END -->
                    @endforeach
                    
                @endif

                



            </div>

        </div>
    </section>
    <!-- Projects: END -->



    <!-- Blog Post Section: START -->
    <section id="articles" class="blog-posts section">
        <div class="container">
            <div class="section-head text-center">
                <h1 class="section-title">My Blog</h1>
                <p class="section-subtitle">Checkout my recent blog posts</p>
                <hr class="wow zoomIn">
            </div>

            <div class="row"> 

                @if (!empty($posts))
                    @foreach ($posts as $post)
                        <!-- Blog-post Item: START -->
                        <div class="col-md-4 blog-post-item">
                            <div class="card h-100" >
                                <div class="view overlay">
                                    <img class="card-img-top" src="{{ $post->thumbnail ? $post->thumbnail : 'https://via.placeholder.com/300x150?text=No+Image' }}" alt="Thumbnail">
                                    <a href="#!">
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                </div>

                                <div class="card-body d-flex flex-column">
                                    <div class="categories">
                                        <a href="/category/{{ $post->category->slug }}">{{ $post->category->name }}</a>
                                    </div>
                                    {{-- <h4 class="card-title"><a href="{{ route('single-post', $post->id)}}">{{ $post->title }}</a></h4> --}}
                                    <h4 class="card-title"><a href="/posts/{{ $post->slug }}">{{ $post->title }}</a></h4>
                                    <div class="card-text mb-0">
                                        {!! Str::limit($post->body, 100, '...') !!}
                                    </div>
                                    <div class="mt-auto">
                                        <span class="post-time"><i class="fas fa-edit mr-1"></i> Posted {{ $post->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Blog-post Item: END -->
                    @endforeach
                @endif


            </div>
        </div>
    </section>
    <!-- Blog Post Section: END -->




    <!-- Contact Section: START -->
    <div id="contact" class="contact section section-bg">
        <div class="container">
            <div class="section-head text-center">
                <h1 class="section-title">Contact</h1>
                <h3 class="section-subtitle">Do you have any questions? Please ask me.</h3>
                <hr class="wow zoomIn" >
            </div>

            <div class="row contact-contents">

                <div class="col-sm-9 col-xl-10">

                    <div class="form contact-form" >
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input id="contactNameId" class="form-control" name="name" type="text" placeholder="Name">
                                    <small class="contactNameErrorMsg text-danger"></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input id="contactEmailId" class="form-control" type="email" placeholder="Email">
                                    <small class="contactEmailErrorMsg text-danger"></small>
                                </div>

                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input id="contactSubjectId" class="form-control" type="text" placeholder="Subject">
                                    <small class="contactSubjectErrorMsg text-danger"></small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea id="contactMessageId" class="form-control" placeholder="Message" rows="7"></textarea>
                                    <small class="contactMessageErrorMsg text-danger"></small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button id="contactSubmitBtn" class="btn btn-orange" type="submit"><i class="fas fa-paper-plane  mr-2  "></i>Send</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3 col-xl-2">
                    <ul class="list-unstyled text-center wow fadeInRight" >
                        <li>
                            <i class="fas fa-map-marker-alt fa-2x    "></i>
                            <p>{{ $about->address }}</p>
                        </li>
                        <li>
                            <i class="fas fa-phone fa-2x   "></i>
                            <p>{{ $about->phone }}</p>
                        </li>
                        <li>
                            <i class="fas fa-envelope-open-text  fa-2x  "></i>
                            <p>{{ $about->email }}</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
    <!-- Contact Section: END -->



@endsection



@section('scripts')
    <script>

        $(document).ready(function(){


            function isEmail(email) {
                var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                if(!regex.test(email)) {
                    return false;
                }else{
                    return true;
                }
            }

            $('#contactSubmitBtn').click(function () { 

                $('.contactNameErrorMsg').hide();
                $('.contactEmailErrorMsg').hide();
                $('.contactSubjectErrorMsg').hide();
                $('.contactMessageErrorMsg').hide();

                $('#contactNameId').removeClass('is-invalid');
                $('#contactEmailId').removeClass('is-invalid');
                $('#contactSubjectId').removeClass('is-invalid');
                $('#contactMessageId').removeClass('is-invalid');

                var name = $('#contactNameId').val();
                var email = $('#contactEmailId').val();
                var subject = $('#contactSubjectId').val();
                var message = $('#contactMessageId').val();
                var hasError = false;

                if($.trim(name).length == 0) {
                    $('#contactNameId').addClass('is-invalid');
                    $('.contactNameErrorMsg').html('Name field is empty.').show();
                    hasError = true;
                }
                if($.trim(email).length == 0) {
                    $('#contactEmailId').addClass('is-invalid');
                    $('.contactEmailErrorMsg').html('Email field is empty.').show();
                    hasError = true;
                }else {
                    if(! isEmail(email)) {
                        $('#contactEmailId').addClass('is-invalid');
                        $('.contactEmailErrorMsg').html('Given email is not valid.').show();
                        hasError = true;
                    }
                }
                if($.trim(subject).length == 0) {
                    $('#contactSubjectId').addClass('is-invalid');
                    $('.contactSubjectErrorMsg').html('Subject field is empty.').show();
                    hasError = true;
                } 
                if($.trim(message).length == 0) {
                    $('#contactMessageId').addClass('is-invalid');
                    $('.contactMessageErrorMsg').html('Message field is empty.').show();
                    hasError = true;
                }



                if (hasError == false) {

                    var url = '/contact-submit'
                    axios.post(url, {
                        name: name,
                        email: email,
                        subject: subject,
                        message: message,
                    })
                    .then(res => {
                        if(res.status == 200) {
                            if(res.data == 1) {
                                $('#contactSubmitBtn').html('Message Sent! <i class="fas fa-rocket"></i>').addClass('disabled');
                                toastr.success('Message sent successfully');
                            }else {
                                toastr.error('Message sent failed');
                            }
                        }else {
                            toastr.error('Message sent failed');
                        }
                    })
                    .catch(err => {
                        toastr.error('Error occured!');
                    })

                }
                
            });
        });

        
    </script>    
@endsection