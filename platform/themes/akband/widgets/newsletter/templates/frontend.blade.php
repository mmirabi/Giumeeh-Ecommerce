@if (is_plugin_active('newsletter'))
    <section class="newsletter mb-15 wow animate__animated animate__fadeIn">
        <div class="container">
            <div class="row newsletter-akband">
                <div class="col-lg-4">
                    <div class="position-relative newsletter-inner" @if ($config['background_image']) style="background-image: url({{ RvMedia::getImageUrl($config['background_image']) }}) !important;" @endif>
                        <div class="newsletter-content">
                            @if($config['title'])
                                <h2>
                                    {!! BaseHelper::clean($config['title']) !!}
                                </h2>
                            @endif
                            @if($config['subtitle'])
                                <p>{!! BaseHelper::clean($config['subtitle']) !!}</p>
                            @endif

                        </div>
                        @if ($config['image'])
                            <img src="{{ RvMedia::getImageUrl($config['image']) }}" alt="newsletter" />
                        @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    {!! Theme::partial('newsletter-form') !!}
                </div>
            </div>
        </div>
    </section>
@endif
