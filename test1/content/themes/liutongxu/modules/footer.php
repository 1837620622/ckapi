<footer class="main-footer footer-type-1 text-xs">
    <div id="footer-tools" class="d-flex flex-column">
        <a href="javascript:" id="go-to-up" class="btn rounded-circle go-up m-1" rel="go-top">
            <i class="iconfont icon-to-up"></i>
        </a>
        <!-- 右下角搜索  -->
        <a href="javascript:" data-toggle="modal" data-target="#search-modal" class="btn rounded-circle m-1" rel="search" one-link-mark="yes">
            <i class="iconfont icon-sousuo"></i>
        </a>
        <a href="<?= $this->buildUrl('nav') ?>" class="btn rounded-circle kefu m-1" target="_blank" data-toggle="tooltip" data-placement="left" title="mini 书签">
            <i class="iconfont icon-24gf-table"></i>
        </a>
        <!-- 右下角搜索 end --> <a href="javascript:" onclick="window.location.href='javascript:switchNightMode()'" class="btn rounded-circle switch-dark-mode m-1" id="yejian" data-toggle="tooltip" data-placement="left" title="夜间模式">
            <i class="mode-ico iconfont icon-yejian"></i>
        </a>
    </div>
    <div class="footer-inner" style="text-align: center;">
        <div class="footer-text">&copy; Copyright <?= date('Y') ?> <?= $this->site->title ?>&nbsp;<?php if (!$this->auth()) echo base64_decode('55SxIDxhIGhyZWY9Imh0dHA6Ly9ndWlkZS5icmk2LmNuIiB0YXJnZXQ9Il9ibGFuayI+5piT6Iiq572R5Z2A5a+86Iiq57O757ufPC9hPiDlvLrlipvpqbHliqg=') ?></div>
    </div>
</footer>