<!-- main-sidebar -->
		<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
		<aside class="app-sidebar sidebar-scroll">
			<div class="main-sidebar-header active text-center">
                <span style="font-weight: 600;text-align: center;font-style: italic">

                </span>
			</div>
			<div class="main-sidemenu">
                <div class="app-sidebar__user clearfix">
                    <div class="dropdown user-pro-body">
                        <div class="">
                            <img alt="user-img" class="avatar avatar-xl brround"
                                 src="{{URL::asset('assets/img/faces/main.webp')}}">
                        </div>
                        <div class="user-info">
                            <h4 class="font-weight-semibold mt-3 mb-0">{{ucfirst(\Illuminate\Support\Facades\Auth::user()->name)}}</h4>
                        </div>
                    </div>
                </div>
			<br>
				<ul class="side-menu">

                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="{{route('albums.index')}}">
                            <i class="fas fa-images side-menu__icon icon-side"></i>
                            <span class="side-menu__label">Albums</span>
                            <i class="angle fe fe-chevron-down"></i>
                        </a>
                        <ul class="slide-menu">
                            <li><a class="slide-item" href="{{route('albums.index')}}">All Albums</a>
                                <span class="badge badge-success side-badge">{{\App\Models\Album::count()}}</span>
                            </li>
                            <li>
                                <a class="slide-item" href="{{route('albums.create')}}"> Add a new album</a>
                            </li>
                        </ul>
                    </li>

                    <hr>



                </ul>
			</div>
		</aside>
<!-- main-sidebar -->
