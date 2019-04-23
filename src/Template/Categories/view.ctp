<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>

<div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0">View category</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Name:</th>
                    <th scope="col"><?= h($category->name) ?></th>
                  </tr>
                  <tr>
                    <th scope="col">Created On:</th>
                    <th scope="col"><?= h($category->created) ?></th>
                  </tr>
                  <tr>
                    <th scope="col">Last Changed On:</th>
                    <th scope="col"><?= h($category->modified) ?></th>
                  </tr>
                </thead>
              </table>
            </div>
      </div>