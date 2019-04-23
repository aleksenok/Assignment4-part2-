<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>

<div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0">View product</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Name:</th>
                    <th scope="col"><?= h($product->name) ?></th>
                  </tr>
                  <tr>
                    <th scope="col">Price:</th>
                    <th scope="col"><?= h($product->price) ?></th>
                  </tr>
                  <tr>
                    <th scope="col">Category:</th>
                    <th scope="col"><?= $product->has('category') ? $this->Html->link($product->category->name, ['controller' => 'Categories', 'action' => 'view', $product->category->id]) : '' ?></td>
                  </tr>
                  <tr>
                    <th scope="col">Manufacturer:</th>
                    <th scope="col"><?= $product->has('manufacturer') ? $this->Html->link($product->manufacturer->name, ['controller' => 'Manufacturers', 'action' => 'view', $product->manufacturer->id]) : '' ?></td>
                  </tr>
                  <tr>
                    <th scope="col">Path to image:</th>
                    <th scope="col"><?= $this->Html->link('Click here...', $product->img_url, ['target' => '_blank'] ) ?></th>
                  </tr>
                  <tr>
                    <th scope="col">Added On:</th>
                    <th scope="col"><?= h($product->created) ?></th>
                  </tr>
                </thead>
              </table>
            </div>
      </div>

<?php if (!empty($product->reviews)) { ?>
  <div class="row mt-3">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0">Product Reviews</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Reviewer</th>
                    <th scope="col">Thoughts</th>
                    <th scope="col">Reviewed On</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($product->reviews as $review): ?>
                    <tr>
                        <td><?=h($review->customer->user->name)?></td>
                        <td><?=h(substr($review->body, 0, 30) . '...')?></td>
                        <td><?=h($review->created)?></td>
                        <td class="actions"><?= $this->Html->link('View', ['controller' => 'Reviews', 'action' => 'view', $review->id]) ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
              </table>
            </div>
      </div>
<?php } ?>