<div class="section-header">

    <?php if($url1=="dashboard"){ ?>
    <h1><?php echo ucfirst($url1); ?></h1>
    <?php } else { ?>
      <h1><?php echo ucfirst($url1 ." ". $url2." ".$url3); ?></h1>
    <?php } ?>

    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active">
          <a href="<?php echo site_url('dashboard'); ?>">Dashboard</a>
        </div>

        <?php if($url1==true && $url2==true){ ?>
        <div class="breadcrumb-item">
          <?php if($url2!="list"){ ?>
            <a href="<?php echo site_url('manage/list/'.$url3); ?>"><?php echo ucfirst($url1);?></a>
          <?php } else { ?>
            <?php echo ucfirst($url1);?>
          <?php } ?>
        </div>
        <?php } ?>

        <?php if($url1==true && $url2==true && $url3==true){ ?>
        <div class="breadcrumb-item">
          <?php echo ucfirst($url2." ".$url3);?>
        </div>
        <?php } ?>

        <!--<?php echo $url1.".".$url2.".".$url3.".".$url4."."; ?>-->


        <!--
        <div class="breadcrumb-item"><a href="#">Layout</a></div>
        <div class="breadcrumb-item">Default Layout</div> active
      -->
    </div>
</div>
