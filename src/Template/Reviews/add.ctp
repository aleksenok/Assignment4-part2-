<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Review $review
 */
?>

<div class="col-lx-12">
      <div class="card">
        <div class="card-header card-header-success">
          <h4 class="card-title ">Add review</h4>
        </div>
        <div class="card-body">
            <?= $this->Form->create($review) ?>
            <div class="row">
                <div class="col-md-12">
                    <?php echo $this->Form->hidden('product_id', ['class' => 'form-control', 'value' => $productId, 'label' => false, 'required']); ?>
                    <div class="form-group">
                        <label class="bmd-label-floating">Enter your thoughts below...</label>
                        <?php echo $this->Form->control('body', ['class' => 'form-control', 'label' => false, 'required']); ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="bmd-label-floating">On a scale of one to five?</label>
                        <?php echo $this->Form->control('rating', ['class' => 'form-control', 'min' => 0, 'max' => 5, 'label' => false, 'required']); ?>
                    </div>
                </div>
            </div>
            <?= $this->Form->button(__('Add'), ['class' => 'btn btn-success']) ?>
            <?= $this->Form->end() ?>
        </div>
      </div>
    </div>
