<footer class="footer">
    <div class="container">
        <div class="footer-widgets">
            <div class="row">

                @foreach ($footer_widgets as $widget)
                    <div class="col-12 col-sm-6 col-lg-3 widget-item">
                        <div class="widget">
                            <h4 class="widget-title">{{ $widget->title }}</h4>
                            <div class="widget-wrap">
                                {!! $widget->body !!}
                            </div>
                        </div>
                        
                    </div>
                @endforeach
                
            </div>
        </div>
        <p class="footer-copyright">&copy;2021 Copyright Reserved | <a href="{{ url('/') }}">www.tarikul.com</a></p>
    </div>
</footer>