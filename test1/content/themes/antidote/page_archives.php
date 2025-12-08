<div class="container">
    <div class="card">
      <div class="card-head"><i class="hydhfl"></i><span style="margin-left: 15px;">全部文章</span></div>
      <div class="card-body">
        <div class="side-latest oz-timeline">
            <?php echoPosts($DATA->getLatestPosts(9999), true); ?>
        </div>
         </div>
    </div>
    </div>
    <?php
    $this->include('module/footer.php');
?>