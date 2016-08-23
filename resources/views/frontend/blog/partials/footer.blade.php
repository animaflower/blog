<div class="container">
    @if(Config::get('blog.disqus_name'))
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                @include('frontend.blog.partials.disqus')
            </div>
        </div>
        <br>
    @endif
    <center>
        <hr width="50%">
        <span id="subtitle">{{ config('blog.subtitle') }}</span>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <p class="small">QQ:872930297</p>
            </div>
        </div>
    </center>
    @if(isset($visit_count))
        <center>
            来访:{{$visit_count}}人
        </center>
    @endif
</div>

@if (Config::get('analytics.google'))
    @include('frontend.blog.partials.analytics')
@endif