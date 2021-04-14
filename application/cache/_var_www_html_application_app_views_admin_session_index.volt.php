<div class="row">
    <div class="col-md-6">
        <div class="page-header">
            <h2>Log In</h2>
        </div>

        <form action="/admin/session/login" role="form" method="post">
            <fieldset>
                <input type='hidden' name='<?php echo $this->security->getTokenKey() ?>' value='<?php echo $this->security->getToken() ?>'/>
                <div class="form-group">
                    <label for="email">Email</label>
                    <div class="controls">
                        <?= $this->tag->textField(['email', 'class' => 'form-control']) ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="controls">
                        <?= $this->tag->passwordField(['password', 'class' => 'form-control']) ?>
                    </div>
                </div>
                <div class="form-group">
                    <?= $this->tag->submitButton(['ログイン', 'class' => 'btn btn-primary btn-large']) ?>
                </div>
            </fieldset>
        </form>
    </div>

    <div class="col-md-6">
        <div class="page-header">
            <h2>Don't have an account yet?</h2>
        </div>
        <p>Create an account offers the following advantages:</p>
        <ul>
            <li>Create, track and export your invoices online</li>
            <li>Gain critical insights into how your business is doing</li>
            <li>Stay informed about promotions and special packages</li>
        </ul>
        <div class="clearfix center">
            <?= $this->tag->linkTo(['admin/signup', 'Sign Up', 'class' => 'btn btn-primary btn-large btn-success']) ?>
        </div>
    </div>
</div>