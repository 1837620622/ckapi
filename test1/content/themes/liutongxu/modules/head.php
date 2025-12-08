<base href="<?= $this->themeUrl ?>/" />
<?= $this->header() ?>
<meta name="theme-color" content="#f9f9f9">
<link rel='stylesheet' id='wp-block-library-css' href='assets/css/dist/block-library/style.min-5.6.2.css' type='text/css' media='all'>
<link rel="stylesheet" href="<?= $this->cdn('font-awesome/6.4.0/css/fontawesome.min.css') ?>">
<link rel='stylesheet' id='iconfontd-css' href='assets/fonts/font_1620678_7g0p3h6gbl-3.03029.css' type='text/css' media='all'>
<link rel='stylesheet' id='iconfont-css' href='assets/css/iconfont.css' type='text/css' media='all'>
<link rel='stylesheet' id='iconfontd-css' href='//at.alicdn.com/t/font_2768144_khli9xs79g.css' type='text/css' media='all'>
<link rel="stylesheet" href="<?= $this->options('icon_cdn') ?>">
<link rel='stylesheet' id='iconfontd-css' href='<?= $this->options->icon_cdn ?>' type='text/css' media='all'>
<link rel='stylesheet' id='bootstrap-css' href='<?= $this->cdn('twitter-bootstrap/4.3.1/css/bootstrap.min.css') ?>' type='text/css' media='all'>
<link rel='stylesheet' id='lightbox-css' href='<?= $this->cdn('fancybox/3.5.7/jquery.fancybox.min.css') ?>' type='text/css' media='all'>
<link rel='stylesheet' id='style-css' href='assets/css/style.css' type='text/css' media='all'>
<script type='text/javascript' src='<?= $this->cdn('jquery/3.6.1/jquery.min.js') ?>' id='jquery-js'></script>
<style>
    #footer-tools [data-v-db6ccf64][data-v-41ba7e2c] {
        top: unset !important;
        bottom: 0 !important;
        right: 44px !important
    }

    .io.icon-fw,
    .iconfont.icon-fw {
        width: 1.15em;
    }

    .io.icon-lg,
    .iconfont.icon-lg {
        font-size: 1.5em;
        line-height: .75em;
        vertical-align: -.125em;
    }

    .screenshot-carousel .img_wrapper a {
        display: contents
    }

    .fancybox-slide--iframe .fancybox-content {
        max-width: 1280px;
        margin: 0
    }

    .fancybox-slide--iframe.fancybox-slide {
        padding: 44px 0
    }

    .navbar-nav .menu-item-286 a {
        background: #ff8116;
        border-radius: 50px !important;
        padding: 5px 10px !important;
        margin: 5px 0 !important;
        color: #fff !important;
    }

    .navbar-nav .menu-item-286 a i {
        position: absolute;
        top: 0;
        right: -10px;
        color: #f13522;
    }

    .io-black-mode .navbar-nav .menu-item-286 a {
        background: #ce9412;
    }

    .io-black-mode .navbar-nav .menu-item-286 a i {
        color: #fff;
    }

    body {
        cursor: url(./assets/cur/xiaoshou1.cur), default;
    }

    a:hover {
        cursor: url(./assets/cur/xiaoshou2.cur), pointer;
    }

    li:hover {
        cursor: url(./assets/cur/xiaoshou2.cur), default;
    }

    label:hover {
        cursor: url(./assets/cur/xiaoshou2.cur), pointer;
    }

    span:hover {
        cursor: url(./assets/cur/xiaoshou2.cur), default;
    }

    input:hover {
        cursor: url(./assets/cur/xiaoshou3.cur), text;
    }

    .loader {
        width: 250px;
        height: 50px;
        line-height: 50px;
        text-align: center;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-family: helvetica, arial, sans-serif;
        text-transform: uppercase;
        font-weight: 900;
        color: #f1404b;
        letter-spacing: 0.2em
    }

    .loader::before,
    .loader::after {
        content: "";
        display: block;
        width: 15px;
        height: 15px;
        background: #f1404b;
        position: absolute;
        animation: load .7s infinite alternate ease-in-out
    }

    .loader::before {
        top: 0
    }

    .loader::after {
        bottom: 0
    }

    @keyframes load {
        0% {
            left: 0;
            height: 30px;
            width: 15px
        }

        50% {
            height: 8px;
            width: 40px
        }

        100% {
            left: 235px;
            height: 30px;
            width: 15px
        }
    }
</style>