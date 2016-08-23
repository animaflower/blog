<div class="author">
    <img class="img-responsive img-circle author-img" src="//www.gravatar.com/avatar/{{ md5($user->email) }}?d=identicon&s=150">
    <h4>{{ $user->first_name .  ' ' . $user->last_name}}
        <br>
        <span class="small text-muted author-bio">{{ $user->bio }}</span>
        <br>
        <a href="http://github.com/{{ $user->github }}" target="_blank"><i class="fa fa-fw fa-github author-social"></i></a>
        <a href="http://twitter.com/{{ $user->twitter }}" target="_blank"><i class="fa fa-fw fa-twitter author-social"></i></a>
        <a href="http://facebook.com/{{ $user->facebook }}" target="_blank"><i class="fa fa-fw fa-facebook author-social"></i></a>
    </h4>
</div>