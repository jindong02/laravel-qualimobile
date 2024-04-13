<footer class="py-lg-8 py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center align-content-center text-center ">
            <div class="col-md-3 col-lg-2 logo-footer justify-content-center text-center text-lg-start mb-lg-0 mb-3">
                <img loading="lazy" src="{{ url('/assets/svg/logo-dark.svg') }}" alt="">
            </div>
            <div class="col-12 col-md-8">
                <ul class="nav justify-content-center text-uppercase fw-lighter nav-footer flex-column flex-lg-row">
                    <li class="nav-item">
                        <a class="nav-link fs--1 p-0 bg-transparent" href="{{ route('politica.devolucao') }}">
                            {{ __('Política de Devolução') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs--1 p-0 bg-transparent" href="{{ route('politica.troca') }}">
                            {{ __('Política de Troca') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs--1 p-0 bg-transparent" href="{{ route('politica.envio') }}">
                            {{ __('Política de Envio') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs--1 p-0 bg-transparent" href="{{ route('politica.privacidade') }}">
                            {{ __('Política de Privacidade') }}
                        </a>
                    </li>

                </ul>

            </div>
            <div class="col-12 col-lg-2 offset-lg-0">
                <ul
                    class="list-unstyled list-inline social-icon-footer mt-lg-0 mt-3 b-6 mx-6 mx-lg-0 mb-md-0 text-end d-flex justify-content-lg-end justify-content-between">
                    <li class="list-inline-item mr-2">
                        <a class="text-decoration-none" target="_blank"
                            href="{{ Config::get('config.whatsapp') }}">
                            <img loading="lazy" alt="Whatsapp" src="{{ url('/assets/svg/whatsapp.svg') }}"
                                width="30" height="100%">
                        </a>
                    </li>
                    <li class="list-inline-item mr-2">
                        <a class="text-decoration-none" target="_blank"
                            href="https://pinterest.com/{{ Config::get('config.pinterest') }}">
                            <img loading="lazy" alt="Pinterest" src="{{ url('/assets/svg/pinterest.svg') }}"
                                width="30" height="100%">
                        </a>
                    </li>
                    <li class="list-inline-item mr-2">
                        <a class="text-decoration-none" target="_blank"
                            href="https://www.youtube.com/{{ Config::get('config.youtube') }}">
                            <img loading="lazy" alt="Youtube" src="{{ url('/assets/svg/youtube.svg') }}" width="30"
                                height="100%">
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a class="text-decoration-none" target="_blank"
                            href="https://www.instagram.com/{{ Config::get('config.instagram') }}">
                            <img loading="lazy" alt="Instagram" src="{{ url('/assets/svg/instagram.svg') }}"
                                width="30" height="100%">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<section class="py-0 bg-light">
    <div class="container">
        <hr class="m-0" style=" color: #E4E4E4; ">

        <div class="row py-3">
            <div class="col-6 text-star">
                <p class="m-0 text-dark fw-normal fs-lg--1 fs--2">
                    {{ Config::get('config.telefone') }} | {{ Config::get('config.endereco') }}
                </p>
            </div>
            <div class="col-6 text-end">
                <a target="_blank" href="https://goyan.com.br/">
                    <img loading="lazy" alt="Goyan Developers" src="{{ url('/assets/svg/goyan.svg') }}">
                </a>
            </div>
        </div>
    </div>

</section>
