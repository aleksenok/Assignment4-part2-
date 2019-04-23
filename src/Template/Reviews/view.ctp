<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Review $review
 */
?>

<div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0">View review</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Reviewer:</th>
                    <th scope="col"><?= h($review->customer->user->name) ?></th>
                  </tr>
                  <tr>
                    <th scope="col">Product:</th>
                    <th scope="col"><?= $review->has('product') ? $this->Html->link($review->product->name, ['controller' => 'Products', 'action' => 'view', $review->product->id]) : '' ?></td>
                  </tr>
                  <tr>
                    <th scope="col">Thoughts:</th>
                    <th scope="col"><?= h($review->body) ?></th>
                  </tr>
                  <tr>
                    <th scope="col">Rating:</th>
                    <th scope="col"><?= h($review->rating) ?></th>
                  </tr>
                  <tr>
                    <th scope="col">Reviewed On:</th>
                    <th scope="col"><?= h($review->created) ?></th>
                  </tr>
                </thead>
              </table>
            </div>
      </div>