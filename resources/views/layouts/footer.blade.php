<footer id="footer">
    <div class="inner">
        <div class="content">
            <section>
                <h3>Accumsan montes viverra</h3>
                <p>Nunc lacinia ante nunc ac lobortis. Interdum adipiscing gravida odio porttitor sem non mi integer non
                    faucibus ornare mi ut ante amet placerat aliquet. Volutpat eu sed ante lacinia sapien lorem accumsan
                    varius montes viverra nibh in adipiscing. Lorem ipsum dolor vestibulum ante ipsum primis in faucibus
                    vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing sed feugiat eu faucibus.
                    Integer ac sed amet praesent. Nunc lacinia ante nunc ac gravida.</p>
            </section>
            <section>
                <h4>Acesso Rápido</h4>
                <ul class="alt">
                    <li><a href="#">Home</a></li>
                    @auth
                        @if(Auth::user()->tipo_usuario_id == 1)
                            <li><a href="#">Area Administrativa</a></li>
                        @endif
                        <li><a href="#">Listar Livros</a></li>
                    @endauth
                </ul>
            </section>
            <section>
                <h4>Não Tenho</h4>
                <ul class="plain">
                    <li><a href="#"><i class="icon fa-twitter">&nbsp;</i>Twitter</a></li>
                    <li><a href="#"><i class="icon fa-facebook">&nbsp;</i>Facebook</a></li>
                    <li><a href="#"><i class="icon fa-instagram">&nbsp;</i>Instagram</a></li>
                    <li><a href="#"><i class="icon fa-github">&nbsp;</i>Github</a></li>
                </ul>
            </section>
        </div>
        <div class="copyright">
            &copy; Jéssica Roza.
        </div>
    </div>
</footer>

<!-- Scripts -->
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/browser.min.js')}}"></script>
<script src="{{asset('js/breakpoints.min.js')}}"></script>
<script src="{{asset('js/util.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
<script src="{{asset('js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('js/Chart.js')}}"></script>
<script src="{{asset('js/highcharts.js')}}"></script>
<script src="{{asset('js/exporting.js')}}"></script>
<script src="{{asset('js/offline-exporting.js')}}"></script>
@yield('js')
