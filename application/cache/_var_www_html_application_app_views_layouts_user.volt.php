<?php $topMenu = ['index' => ['title' => 'Home', 'uri' => '/index', 'with_auth' => false], 'invoices' => ['title' => 'Invoices', 'uri' => '/invoices/index', 'with_auth' => true], 'about' => ['title' => 'About', 'uri' => '/about/index', 'with_auth' => false], 'contact' => ['title' => 'Contact', 'uri' => '/contact/index', 'with_auth' => false]]; ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
    <a class="navbar-brand" href="/">INVO</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <?php foreach ($topMenu as $controller => $menu) { ?>
                <?php if (($this->session->has('auth') && $menu['with_auth'] === true) || $menu['with_auth'] === false) { ?>
                <li class="nav-item <?php if ($controller == Phalcon\Text::lower($this->dispatcher->getControllerName())) { ?>active<?php } ?>">
                    <a class="nav-link" href="<?= $menu['uri'] ?>"><?= $menu['title'] ?></a>
                </li>
                <?php } ?>
            <?php } ?>
        </ul>

        <div class="my-2 my-lg-0">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <?php if ($this->session->has('auth')) { ?>
                    <a class="nav-link" href="/session/end">Log Out</a>
                    <?php } else { ?>
                    <a class="nav-link" href="/session/index">Log In/Sign Up</a>
                    <?php } ?>
                </li>
            </ul>
        </div>
    </div>
</nav>


<div class="container">
    <?= $this->flash->output() ?>
    <?= $this->getContent() ?>
    <hr>
    <footer>
        <p>&copy; Company <?= date('Y') ?></p>
    </footer>
</div>