<div class="container-fluid bg-dark " >
    <nav class="container navbar navbar-expand-lg navbar-light bg-faded">
        <a class="navbar-brand english text-white" href="#">
            <img src="{{asset('images/dodo.jpg')}}" alt="" width="30" height="30" class="rounded">
            <span class="ml-3">Online Shopping</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-list text-white"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link english text-white" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link english text-white" href="/admin">Admin Panel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link english text-white" href="#">Pricing</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle english text-white" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown link
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>