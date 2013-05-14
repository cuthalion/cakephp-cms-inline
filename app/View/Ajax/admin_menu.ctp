<div class="admin-menu dragg">
    <div class="navbar">
        <div class="navbar-inner">
            <span class="brand">
            	Gerenciamento do Site
            </span>
            <ul class="nav">
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        Menu
                        <i class="caret">
                        </i>
                    </a>
                    <ul id="admin-menu" class="dropdown-menu">
                        <li>
                            <a href="#">
                            	Carregando...
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo $cms['base_url']?>/Perfil" data-plugin="Perfil">
                        <i class="icon-user"></i>
                        Perfil
                    </a>
                </li>
                <li>
                    <a href="<?php echo $cms['base_url']?>/Seo" data-plugin="Seo">
                        <i class="icon-globe"></i>
                        SEO
                    </a>
                </li>
                <li>
                    <a href="<?php echo $cms['base_url']?>/Mensagens" data-plugin="Mensagens" class="marcador">
                        <i class="icon-envelope"></i>
                        <b>Mensagens</b>
                        <span class="btn btn-super-mini btn-danger marcador"><?php echo $mensagens; ?></span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo $cms['base_url']?>/logout" data-plugin="Sair">
                        <i class="icon-off"></i>
                        Sair
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>