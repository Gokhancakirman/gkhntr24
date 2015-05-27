<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{URL::route('anasayfa')}}">Cukumix</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="about.html">Hakkımızda</a>
                    </li>
                
                    <li>
                        <a href="contact.html">İletişim</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Kategoriler <b class="caret"></b></a>
                        <ul class="dropdown-menu multi-level">
						@foreach($anakategori as $ana)
                            <li class="dropdown-submenu" >
                                <a tabindex="-1" href="portfolio-1-col.html">{{$ana->kat_adi}}</a>
								
								<ul class="dropdown-menu">
								@foreach($kategoriler as $kategori)
								@if($kategori->ana_id==$ana->id)
								<li><a tabindex="-1" href="{{URL::route('kategori',array('id'=>$kategori->id))}}">{{$kategori->kat_adi}}</a></li>
								@endif
								@endforeach
								</ul>
								
                            </li>
						@endforeach	
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Ara <b class="caret"></b></a>
                        <ul class="dropdown-menu multi-level">
                            <li class="dropdown-submenu">
                                <a tabindex="-1" href="blog-home-1.html">Blog Home 1</a>
								
                            </li>
                            <li>
                                <a href="blog-home-2.html">Blog Home 2</a>
                            </li>
                            <li>
                                <a href="blog-post.html">Blog Post</a>
                            </li>
                        </ul>
                    </li>
         
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>