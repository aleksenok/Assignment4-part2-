<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Manufacturer $manufacturer
 */
?>

<div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0">View manufacturer</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Name:</th>
                    <th scope="col"><?= h($manufacturer->name) ?></th>
                  </tr>
                  <tr>
                    <th scope="col">Joined On:</th>
                    <th scope="col"><?= h($manufacturer->created) ?></th>
                  </tr>
                </thead>
              </table>
            </div>
      </div>