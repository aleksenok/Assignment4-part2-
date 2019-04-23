<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Purchase[]|\Cake\Collection\CollectionInterface $purchases
 */
?>

<div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0">My Purchases</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
              <?php if (sizeof($purchases) > 0) {?>
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Product</th>
                    <th scope="col">Purchased on</th>
                    <th scope="col">Price</th>
                    <th scope="col">Image</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($purchases as $purchase): ?>
                    <tr>
                        <td><?=h($purchase->product->name)?></td>
                        <td><?=h($purchase->created)?></td>
                        <td><?=h($purchase->product->price)?></td>
                        <td><?= $this->Html->link('Click here...', $purchase->product->img_url, ['target' => '_blank'] ) ?></td>
                    </tr>
                    <?php endforeach;} else {?>
                    <p class="text-center">You have no purchases in the system.</p>
                <?php }?>
                </tbody>
              </table>
              <div class="paginator ml-4 mt-3">
              <?php if (sizeof($purchases) > 0) {?>
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