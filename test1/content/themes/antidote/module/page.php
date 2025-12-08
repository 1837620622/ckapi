<div class="container">
  <div class="card board">
    <span class="icon"><i class="fa fa-map-signs fa-fw"></i></span>
      <?php echoBoard($page['title']); ?>
  </div>
  <div class="card">
    <div class="card-head"><i class="fa fa-book fa-fw"></i><?= $page['title']; ?></div>
    <div class="card-body content">
        <?= $page['content']; ?>
    </div>
  </div>
</div>

<?php
    $this->include('module/footer.php');
?>