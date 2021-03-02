<div class="sidebar" data-color="green" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="{{route("home")}}" class="simple-text logo-normal">
      {{ __('Debit Air') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
      <li class="nav-item {{ $activePage == 'pegawai'  ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#pegawai" aria-expanded="false">
          <i><img style="width:25px" src="{{ asset('material') }}/img/pegawai.jpg"></i>
          <p>{{ __('Data Pegawai') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="pegawai">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'pegawai' ? ' active' : '' }}">
            <a class="nav-link" href="{{route('pegawai')}}">
                <i class="material-icons"> person </i>
                <span class="sidebar-normal">{{ __('Pegawai') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item {{ ($activePage == 'debit-input' || $activePage == 'debit-location') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#debit" aria-expanded="false">
          <i><img style="width:25px" src="{{ asset('material') }}/img/water-drop.png"></i>
          <p>{{ __('Debit') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="debit">
          <ul class="nav">
           <li class="nav-item{{ $activePage == 'debit-location' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('debitloc') }}">
                    <i class="material-icons"> room </i>
                    <span class="sidebar-normal"> {{ __('Debit Location') }} </span>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'debit-input' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('debit') }}">
                <i class="material-icons"> waves </i>
                <span class="sidebar-normal">{{ __('Debit') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item {{ ($activePage == 'tanamin' || $activePage == 'tanam') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#tanam" aria-expanded="false">
          <i><img style="width:25px" src="{{ asset('material') }}/img/tanam.png"></i>
          <p>{{ __('Tanam') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="tanam">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'tanamin' ? ' active' : '' }}">
            <a class="nav-link" href="{{route('tanamin')}}">
                <i class="material-icons"> eco </i>
                <span class="sidebar-normal">{{ __('Tanam Input') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'tanam' ? ' active' : '' }}">
              <a class="nav-link" href="{{route('tanam')}}">
                <i class="material-icons"> spa </i>
                <span class="sidebar-normal"> {{ __('Tanam') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item {{ ($activePage == 'laporan' || $activePage == 'laporan8') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laporan" aria-expanded="false">
          <i><img style="width:25px" src="{{ asset('material') }}/img/newspaper.png"></i>
          <p>{{ __('Laporan') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="laporan">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'laporan' ? ' active' : '' }}">
            <a class="nav-link" href="{{route('laporan')}}">
                <i class="material-icons"> picture_as_pdf </i>
                <span class="sidebar-normal">{{ __('Laporan Blanko5') }} </span>
              </a>
            </li>
              <li class="nav-item{{ $activePage == 'laporan8' ? ' active' : '' }}">
                  <a class="nav-link" href="{{route('laporan8')}}">
                      <i class="material-icons"> picture_as_pdf </i>
                      <span class="sidebar-normal">{{ __('Laporan Blanko 8') }} </span>
                  </a>
              </li>
          </ul>
        </div>
      </li>

    </ul>
  </div>
</div>
