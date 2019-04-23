<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="message success" id="message" onclick="this.classList.add('hidden')"><?= $message ?></div>
