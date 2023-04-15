<div id="navBar" class="container d-flex flex-row justify-content-end my-4">

    <div id="side_menu" >
        <div class="logo">
            <a href="#" class="text-dark fw-light text-decoration-none fs-1">
                Travel Journal
            </a>
        </div>
        <ul class="list menu-left">
            <li>
                <a href="{{url('/home')}}">Home</a>
            </li>
            <li>
                <a href="#">My Journal</a>
            </li>
            <li>
                <a href="">Planner</a>
            </li>
            <li>
                <a href="{{url('/blogs')}}">Blogs</a>
            </li>
        </ul>
    </div>

    <div class="menu position-fixed" style="z-index: 1300; ">
        <div class="menu-icon ">
            <div class="icon-line"></div>
            <div class="icon-line"></div>
            <div class="icon-line"></div>
        </div>
    </div>

    <section class="top-btn-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @if(\Illuminate\Support\Facades\Auth::check())
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="main_btn text-decoration-none">
                            Logout
                        </a>
                    @elseif(request()->url() == url('/login'))
                        <a href="{{url('/register')}}" class="main_btn text-decoration-none">
                            Register
                        </a>
                        <a href="{{url('/home')}}" class="main_btn text-decoration-none">
                            Home
                        </a>
                    @elseif(request()->url() == url('/login'))
                        <a href="{{url('/login')}}" class="main_btn text-decoration-none">
                            Login
                        </a>
                        <a href="{{url('/home')}}" class="main_btn text-decoration-none">
                            Home
                        </a>
                    @else
                        <a href="{{url('/login')}}" class="main_btn text-decoration-none">
                            Login/Register
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>
