<h1><?= $context->getName() ?></h1>
<table>
  <tr>
    <td><b>Virtual CPUs</b></td>
    <td><?= $context->getVCPUs() ?></td>
  </tr>
  <tr>
    <td><b>Memory</b></td>
    <td><?= $context->getMemory() ?></td>
  </tr>
  <tr>
    <td><b>Max Memory</b></td>
    <td><?= $context->getMaxMemory() ?></td>
  </tr>
</table>
<a href="/domains/<?= $context->getUUID() ?>/edit">Edit</a>
