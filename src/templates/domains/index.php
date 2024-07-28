<h1>Domains</h1>
<ul>
  <?php foreach ($context as $uuid => $name): ?>
    <li>
      <a href="/domains/<?= $uuid ?>"><?= $name ?></a>
    </li>
  <?php endforeach ?>
</ul>
