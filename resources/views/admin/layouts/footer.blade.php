<footer id="footer">
    <div class="footer-menu">
        <p>
            {{ date('Y') }} © {{ Config::get('config.nome_site') }}
        </p>
    </div>
</footer>
<div id="stop" class="scrollTop">
    <a href=""><i class="fa fa-long-arrow-up" aria-hidden="true"></i>
    </a>
</div>

<!-- Javascript Start Here -->
<script src="{{ url('assets/admin/js/plugin/jquery/jquery.min.js') }}"></script>
<script src="{{ url('assets/admin/js/plugin/popper.min.js') }}"></script>
<script src="{{ url('assets/admin/js/plugin/bootstrap.min.js') }}"></script>
<script src="{{ url('assets/admin/js/plugin/default.min.js') }}"></script>
<script src="{{ url('assets/admin/js/plugin/chart-circle/circles.min.js') }}"></script>
<script src="{{ url('assets/admin/js/app.js') }}"></script>