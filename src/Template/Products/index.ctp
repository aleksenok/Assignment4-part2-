<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product[]|\Cake\Collection\CollectionInterface $products
 */
?>

<div class="row position-relative">
<section class="section bg-secondary">
      <div class="container">
        <div class="row row-grid align-items-center col-md-12">
              <?php if (sizeof($products) > 0) {?>
                <?php foreach ($products as $product): ?>
          <div class="col-md-4 mt-3" style="display: inline-block">
            <div class="card bg-default shadow border-0">
              <img src="<?php echo $product->img_url ?>" class="card-img-top">
              <blockquote class="card-blockquote">
                <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 583 95" class="svg-bg">
                  <polygon points="0,52 583,95 0,95" class="fill-default" />
                  <polygon points="0,42 583,95 683,0 0,95" opacity=".2" class="fill-default" />
                </svg>
                <h6 class="display-4 font-weight-bold text-white"><?= $product->name . " ($product->price)" ?></h6>
                <p class="lead text-italic text-white">
                <?= $this->Form->postLink(__('+ Cart'), ['action' => 'add_to_cart', $product->id])?><br />
                <?= $this->HTML->link(__('+ Review'), ['controller' => 'Reviews', 'action' => 'add', $product->id])?><br /><br />
                <?= $this->HTML->link(__('* View'), ['controller' => 'Products', 'action' => 'view', $product->id])?>
                </p>
              </blockquote>
            </div>
          </div>
          <?php endforeach;} else {?>
                    <p class="text-center col-md-12 ml-9">Oops, nothing to see here. Perhaps you should come back later.</p>
                <?php }?>
      </div>
      <div class="paginator ml-4 mt-3">
              <?php if (sizeof($products) > 0) {?>
                <ul class="pagination">
                <?=$this->Paginator->first('<< ')?>
                    &nbsp;&nbsp;&nbsp;&nbsp;<?=$this->Paginator->prev('< ')?>&nbsp;&nbsp;
                    &nbsp;&nbsp;<?=$this->Paginator->next(' >')?>&nbsp;&nbsp;&nbsp;&nbsp;
                    <?=$this->Paginator->last(' >>')?>
                </ul>
                <p><?=$this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')])?></p>
              <?php }?>
            </div>
      </div>
      </div>
    </section>