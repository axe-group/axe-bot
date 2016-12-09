
<nav id="tf-menu" class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">iHelp</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                @if (!$signedIn)
                    <li><a href="{{ url('/') }}" class="page-scroll">Нүүр</a></li>
                    <li><a href="{{ route('travelflyers.index') }}" class="page-scroll">Ажил</a></li>
                    <li><a href="{{ url('/login') }}" class="page-scroll"> <i class="inverted blue world icon big"></i></a></li>
                    <li><a href="{{ route('leaderboards.index') }}" class="page-scroll"><i class="fa fa-diamond"></i></a></li>
                    <li><a href="{{ url('/login') }}" class="page-scroll">Нэвтрэх</a></li>
                    <li><a href="{{ url('/register') }}" class="page-scroll">Бүртгүүлэх</a></li>
                @else
                    <li><a href="{{ url('/') }}" class="page-scroll">Нүүр</a></li>
                    <li><a href="{{ route('travelflyers.index') }}" class="page-scroll">Ажил</a></li>
                    <li><a href="{{ route('travelflyers.create') }}" class="page-scroll"> <i class="inverted blue world icon big"></i></a></li>
                    <li><a href="{{ route('profile.index', $user->username) }}" class="page-scroll">{{ $user->username }}</a></li>
                    <li><a href="{{ route('leaderboards.index') }}" class="page-scroll"><i class="fa fa-diamond"></i> {{ $user->points->points }}</a></li>
                    <li><a href="{{ url('/logout') }}" class="page-scroll"><i class="fa fa-btn fa-sign-out"></i>Гарах</a></li>
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<!-- Home Page
    ==========================================-->
<div id="tf-home" class="text-center">
    <div class="overlay">
        <div class="content">
            <h1>Тавтай морилно уу <strong><span class="color">iHelp</span></strong></h1>
            <p class="lead"><strong>Цагийн</strong> болон <strong>ажлын</strong> байрны олон нийтийн сэрвэс <strong></strong></p>
            @if (!$signedIn)
                <a href="{{ route('travelflyers.index') }}" class="massive ui inverted green button">Харах</a>
                <a href="{{ route('travelflyers.create') }}" class="massive ui inverted orange button">Ажлын байр үүсгэх</a>
            @else
                <a href="{{ route('travelflyers.index') }}" class="massive ui inverted green button">Харах</a>
                <a href="{{ route('travelflyers.create') }}" class="massive ui inverted orange button">Ажлын байр үүсгэх</a>
            @endif
        </div>
    </div>
</div>


