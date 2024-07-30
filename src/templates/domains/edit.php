<h1><?= $context->getName() ?></h1>
<form action="/domains/<?= $context->getUUID() ?>">
  <label for="vcpus">vCPUs</label>
  <input id="vcpus" name="vcpus" value="<?= $context->getVCPUs() ?>">
  <br>
  <label for="memory">Memory</label>
  <input id="memory" name="memory" value="<?= $context->getMemory() ?>">
  <br>
  <label for="maxMemory">Max Memory</label>
  <input id="maxMemory" name="maxMemory" value="<?= $context->getMaxMemory() ?>">
  <br>
  <input type="submit" value="Ok">
  <button onclick="(() => {history.back(); return false})()">Cancel</button>
</form>
