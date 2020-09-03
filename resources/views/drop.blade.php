<ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('home') }}" class="nav-link" >Home</a>
            </li>

                <!-- split buttons box -->
                <div class="card">
                <!-- Split button -->
                  <div class="btn-group">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                        Project <span class="caret"></span>
                    </a>

                      <span class="sr-only">Toggle Dropdown</span>
                      <div class="dropdown-menu" role="menu">
                        @foreach (getProjects() as $record)
                        <a class="dropdown-item" href="{{ route('selectProject', $record->id) }}">{{$record->Project_Title}}</a>
                        @endforeach

                          <div class="dropdown-divider"></div>
                        <a href="{{route('ProjectReport')}}" class="dropdown-item">See All</a>
                      </div>
                    </li>
                  </div>

    </ul>
