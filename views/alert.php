<?php if (!empty($this->output)): ?>
    <div class="row">
        <div class="col-sm-12 col-md-6 col-md-offset-3">
            <?php if (is_array($this->output)) : ?>
                <?php foreach ($this->output as $key) : ?>
                    <p class="alert alert-danger dismissible">
                        <?php echo $key; ?>
                    </p>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="alert alert-success dismissible">
                    <?php echo $this->output; ?>
                </p>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>