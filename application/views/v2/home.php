<?php
    $this->load->view('v2/init/header', array('toolbar' => 'Ford 32 - Horarios'));
?>

<style>
    /**html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: -webkit-box;
        display: flex;
        -ms-flex-align: center;
        -ms-flex-pack: center;
        -webkit-box-align: center;
        align-items: center;
        -webkit-box-pack: center;
        justify-content: center;
        padding: 30px 50px;
    } **/
</style>

<body>
    <header>
        <div data-role="appbar" data-expand-point="md">
            <a href="#" class="brand no-hover">
        <span style="width: 55px;" class="p-2 border bd-dark border-radius">
            m<sup>4</sup>
        </span>
            </a>

            <ul class="app-bar-menu">
                <li><a href="#">Home</a></li>
                <li>
                    <a href="#" class="dropdown-toggle">Products</a>
                    <ul class="d-menu" data-role="dropdown">
                        <li><a href="#">Windows 10</a></li>
                        <li><a href="#">Office 365</a></li>
                        <li class="divider bg-lightGray"></li>
                        <li><a href="#">Skype</a></li>
                    </ul>
                </li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Contacts</a></li>
            </ul>
        </div>
    </header>
</body>


<?php
    $this->load->view('v2/init/footer');
?>


<!--

 <nav class="navbar fixed-top navbar-light bg-light">
    <a class="navbar-brand" href="#">
        <img src="<?php echo img_url('logo.png'); ?>" width="30" height="30" class="d-inline-block align-top" alt="">
        Ford 32 - Horarios
    </a>
</nav>




 -->
