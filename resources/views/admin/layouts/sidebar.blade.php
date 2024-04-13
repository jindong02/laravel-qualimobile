@php($currentRoute = Route::currentRouteName())

<section class="left-side-bar main-sidebar shadow" style="position: fixed;">
    <div class="left-side">
        <ul class="sidebar-menu" data-widget="tree">
            <li class="treeview">
                <a class="" href="#">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    <span>LOJA</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="treeview">
                        <a class="Pg ml-4" href="#">
                            <i class="fa fa-truck" aria-hidden="true"></i>
                            <span>Produtos</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="Pg ml-4">
                                <a href="{{ route('admin.lojaprodutos') }}">
                                    Todos os produtos
                                </a>
                            </li>
                            <li class="Pg ml-4">
                                <a href="{{ route('admin.lojaproduto.add') }}">
                                    Novo produto
                                </a>
                            </li>        
                        </ul>
                    </li>

                    <li class="treeview">
                        <a class="Pg ml-4" href="#">
                            <i class="fa fa-th" aria-hidden="true"></i><span>Categorias</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="Pg ml-4">
                                <a href="{{ route('admin.lojacategorias') }}">
                                    Todas as Categorias
                                </a>
                            </li>
                            <li class="Pg ml-4">
                                <a href="{{ route('admin.lojacategoria.add') }}">
                                    Nova Categorias
                                </a>
                            </li>
                        </ul>
                    </li>
        
                    <li class="treeview">
                        <a class="Pg ml-4" href="#">
                            <i class="fa fa-th" aria-hidden="true"></i><span>Subcategorias</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="Pg ml-4">
                                <a href="{{ route('admin.lojasubcategorias') }}">
                                    Todas as Subcategorias
                                </a>
                            </li>
                            <li class="Pg ml-4">
                                <a href="{{ route('admin.lojasubcategoria.add') }}">
                                    Nova Subcategorias
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Menu management -->
                    @php($onMenusManagementTab = starts_with($currentRoute, 'admin.lojamenus') || starts_with($currentRoute, 'admin.lojasubmenus'))
                    <li class="treeview<?= $onMenusManagementTab ? ' menu-open' : '' ?>">
                        <a class="Pg ml-4 <?= $onMenusManagementTab ? 'active' : '' ?>" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-menu-button-fill" viewBox="0 0 16 16">
                                <path d="M1.5 0A1.5 1.5 0 0 0 0 1.5v2A1.5 1.5 0 0 0 1.5 5h8A1.5 1.5 0 0 0 11 3.5v-2A1.5 1.5 0 0 0 9.5 0h-8zm5.927 2.427A.25.25 0 0 1 7.604 2h.792a.25.25 0 0 1 .177.427l-.396.396a.25.25 0 0 1-.354 0l-.396-.396zM0 8a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V8zm1 3v2a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2H1zm14-1V8a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v2h14zM2 8.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0 4a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z"/>
                            </svg><span>Gerenciamento de menus</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu"<?= $onMenusManagementTab ? ' style="display: block;"' : '' ?>>
                            <li class="Pg ml-4">
                                <a href="{{ route('admin.lojamenus.index') }}" class="<?= starts_with($currentRoute, 'admin.lojamenus') ? 'active' : '' ?>">Menus principais</a>
                            </li>
                            <li class="Pg ml-4">
                                <a href="{{ route('admin.lojasubmenus.index') }}" class="<?= starts_with($currentRoute, 'admin.lojasubmenus') ? 'active' : '' ?>">Submenus</a>
                            </li>
                        </ul>
                    </li>
                    <!-- ./ -->

                </ul>
            </li>
            
            <li class="treeview">
                <a class="" href="#">
                    <i class="fa fa-truck" aria-hidden="true"></i>
                    <span>Produtos</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="Pg ml-4">
                        <a href="{{ route('admin.produtos') }}">
                            Todos os produtos
                        </a>
                    </li>
                    <li class="Pg ml-4">
                        <a href="{{ route('admin.produto.add') }}">
                            Novo produto
                        </a>
                    </li>

                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-align-justify"></i><span>Blog</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="Pg ml-4">
                        <a href="{{ route('admin.blogs') }}">
                            Todas as publicações
                        </a>
                    </li>
                    <li class="Pg ml-4">
                        <a href="{{ route('admin.blog.add') }}">
                            Nova publicação
                        </a>
                    </li>

                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-briefcase" aria-hidden="true"></i><span>Cases</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="Pg ml-4">
                        <a href="{{ route('admin.cases') }}">
                            Todos os cases
                        </a>
                    </li>
                    <li class="Pg ml-4">
                        <a href="{{ route('admin.case.add') }}">
                            Novo case
                        </a>
                    </li>

                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-star" aria-hidden="true"></i><span>Opiniões de clientes</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="Pg ml-4">
                        <a href="{{ route('admin.cliente') }}">
                            Todas as opiniões
                        </a>
                    </li>
                    <li class="Pg ml-4">
                        <a href="{{ route('admin.cliente.add') }}">
                            Nova opinião
                        </a>
                    </li>

                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-th" aria-hidden="true"></i><span>Categorias</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="Pg ml-4">
                        <a href="{{ route('admin.categorias') }}">
                            Todas as Categorias
                        </a>
                    </li>
                    <li class="Pg ml-4">
                        <a href="{{ route('admin.categoria.add') }}">
                            Nova Categorias
                        </a>
                    </li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-th" aria-hidden="true"></i><span>Subcategorias</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="Pg ml-4">
                        <a href="{{ route('admin.subcategorias') }}">
                            Todas as Subcategorias
                        </a>
                    </li>
                    <li class="Pg ml-4">
                        <a href="{{ route('admin.subcategoria.add') }}">
                            Nova Subcategorias
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Menu management -->
            @php($onMenusManagementTab = starts_with($currentRoute, 'admin.menus') || starts_with($currentRoute, 'admin.submenus'))
            <li class="treeview<?= $onMenusManagementTab ? ' menu-open' : '' ?>">
                <a class="<?= $onMenusManagementTab ? 'active' : '' ?>" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-menu-button-fill" viewBox="0 0 16 16">
                        <path d="M1.5 0A1.5 1.5 0 0 0 0 1.5v2A1.5 1.5 0 0 0 1.5 5h8A1.5 1.5 0 0 0 11 3.5v-2A1.5 1.5 0 0 0 9.5 0h-8zm5.927 2.427A.25.25 0 0 1 7.604 2h.792a.25.25 0 0 1 .177.427l-.396.396a.25.25 0 0 1-.354 0l-.396-.396zM0 8a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V8zm1 3v2a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2H1zm14-1V8a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v2h14zM2 8.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0 4a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z"/>
                    </svg><span>Gerenciamento de menus</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu"<?= $onMenusManagementTab ? ' style="display: block;"' : '' ?>>
                    <li class="Pg ml-4">
                        <a href="{{ route('admin.menus.index') }}" class="<?= starts_with($currentRoute, 'admin.menus') ? 'active' : '' ?>">Menus principais</a>
                    </li>
                    <li class="Pg ml-4">
                        <a href="{{ route('admin.submenus.index') }}" class="<?= starts_with($currentRoute, 'admin.submenus') ? 'active' : '' ?>">Submenus</a>
                    </li>

                </ul>
            </li>
            <!-- ./ -->

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-tint" aria-hidden="true"></i><span>Cores</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="Pg ml-4">
                        <a href="{{ route('admin.cores') }}">
                            Todas as cores
                        </a>
                    </li>
                    <li class="Pg ml-4">
                        <a href="{{ route('admin.cor.add') }}">
                            Nova cor
                        </a>
                    </li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-tint" aria-hidden="true"></i><span>Revestimentos</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="Pg ml-4">
                        <a href="{{ route('admin.revestimentos') }}">
                            Todas os revestimentos
                        </a>
                    </li>
                    <li class="Pg ml-4">
                        <a href="{{ route('admin.revestimento.add') }}">
                            Novo revestimento
                        </a>
                    </li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-tasks" aria-hidden="true"></i><span>Banners</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="Pg ml-4">
                        <a href="{{ route('admin.banners') }}">
                            Todos os Banners
                        </a>
                    </li>
                    <li class="Pg ml-4">
                        <a href="{{ route('admin.banner.add') }}">
                            Novo Banner
                        </a>
                    </li>

                </ul>
            </li>

            <li>
                <a href="{{ route('admin.newsletter') }}">
                    <i class="fa fa-newspaper-o" aria-hidden="true"></i><span>Newsletter</span>
                </a>
            </li>


            <hr>

            <li>
                <a href="{{ route('admin.politica-devolucao.index') }}">
                    <i class="fa fa-text-height" aria-hidden="true"></i><span>Política de Devolução</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.politica-troca.index') }}">
                    <i class="fa fa-text-height" aria-hidden="true"></i><span>Política de Troca</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.politica-envio.index') }}">
                    <i class="fa fa-text-height" aria-hidden="true"></i><span>Política de Envio</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.politica-privacidade.index') }}">
                    <i class="fa fa-text-height" aria-hidden="true"></i><span>Política de Privacidade</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.configuracoes.acesso') }}">
                    <i class="fa fa-user" aria-hidden="true"></i><span>Acesso</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.configuracoes') }}">
                    <i class="fa fa-cog" aria-hidden="true"></i><span>Configurações</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.logout') }}">
                    <i class="fa fa-sign-out" aria-hidden="true"></i><span>Sair da conta</span>
                </a>
            </li>
        </ul>

    </div>
</section>